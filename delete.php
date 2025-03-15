<?php 
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'dbconn.php'; 

$response = ["success" => false, "error" => "Unknown error"];

if (!isset($_GET['file']) || !isset($_GET['company']) || !isset($_GET['title'])) {
    $response["error"] = "Missing file, company, or title parameter";
    echo json_encode($response);
    exit;
}

$fileName = trim(urldecode($_GET['file']));
$companyName = $_GET['company'];
$projectTitle = $_GET['title'];

// Fetch the actual file path from the database
$stmt = $conn->prepare("SELECT reqfile FROM reqtable WHERE reqfile = ? AND companyName = ? AND projectTitle = ?");
$stmt->bind_param("sss", $fileName, $companyName, $projectTitle);
$stmt->execute();
$stmt->bind_result($storedFilePath);
$stmt->fetch();
$stmt->close();

if (!$storedFilePath) {
    $response["error"] = "File not found in database";
    echo json_encode($response);
    exit;
}

// Ensure the file exists in the directory
if (!file_exists($storedFilePath)) {
    error_log("File does not exist: " . realpath($storedFilePath));
    $response["error"] = "File does not exist at: " . $storedFilePath;
    echo json_encode($response);
    exit;
}

// Delete the file from the directory
if (unlink($storedFilePath)) {
    // Delete file record from database
    $stmt = $conn->prepare("DELETE FROM reqtable WHERE reqfile = ? AND companyName = ? AND projectTitle = ?");
    $stmt->bind_param("sss", $fileName, $companyName, $projectTitle);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $response["success"] = true;
    } else {
        $response["error"] = "Database deletion failed";
    }
    $stmt->close();
} else {
    $response["error"] = "File deletion failed";
}

echo json_encode($response);
?>

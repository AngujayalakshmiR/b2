<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

header("Content-Type: application/json");
include 'dbconn.php'; // Ensure database connection

if (!isset($_FILES['file'])) {
    echo json_encode(["success" => false, "error" => "No file uploaded"]);
    exit;
}

$file = $_FILES['file'];
$fileName = $file['name'];
$fileTmpName = $file['tmp_name'];
$fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

$companyName = isset($_POST['companyName']) ? $_POST['companyName'] : '';
$projectTitle = isset($_POST['projectTitle']) ? $_POST['projectTitle'] : '';

// Allowed file types
$allowed = ['pdf', 'jpg', 'jpeg', 'png', 'doc', 'docx', 'ppt', 'pptx', 'xlsx', 'xls'];

if (!in_array($fileType, $allowed)) {
    echo json_encode(["success" => false, "error" => "Invalid file type: " . $fileType]);
    exit;
}

$uploadDir = "reqfiles/";
$destination = $uploadDir . basename($fileName);

if (!move_uploaded_file($fileTmpName, $destination)) {
    echo json_encode(["success" => false, "error" => "Upload failed"]);
    exit;
}

// Verify that file exists after upload
if (!file_exists($destination)) {
    echo json_encode(["success" => false, "error" => "File upload failed, file not found"]);
    exit;
}

$stmt = $conn->prepare("INSERT INTO reqtable (companyName, projectTitle, reqfile) VALUES (?, ?, ?)");
if (!$stmt) {
    echo json_encode(["success" => false, "error" => "Statement preparation failed: " . $conn->error]);
    exit;
}
$stmt->bind_param("sss", $companyName, $projectTitle, $destination);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "filename" => $fileName]);
} else {
    echo json_encode(["success" => false, "error" => "Database error: " . $stmt->error]);
}

?>

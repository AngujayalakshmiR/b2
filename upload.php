<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

header("Content-Type: application/json");
include 'dbconn.php';

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

$allowed = ['pdf', 'jpg', 'jpeg', 'png', 'doc', 'docx', 'ppt', 'pptx', 'xlsx', 'xls'];

if (!in_array($fileType, $allowed)) {
    echo json_encode(["success" => false, "error" => "Invalid file type: " . $fileType]);
    exit;
}

$uploadDir = "reqfiles/";
$destination = $uploadDir . basename($fileName);

// ✅ Duplicate check
$checkQuery = "SELECT ID FROM reqtable WHERE companyName = ? AND projectTitle = ? AND reqfile = ?";
$checkStmt = $conn->prepare($checkQuery);
$relativePath = $uploadDir . $fileName;
$checkStmt->bind_param("sss", $companyName, $projectTitle, $relativePath);
$checkStmt->execute();
$checkStmt->store_result();

if ($checkStmt->num_rows > 0) {
    echo json_encode(["success" => false, "error" => "This file already exists for this company and project."]);
    exit;
}
$checkStmt->close();

// Proceed to upload
if (!move_uploaded_file($fileTmpName, $destination)) {
    echo json_encode(["success" => false, "error" => "Upload failed"]);
    exit;
}

if (!file_exists($destination)) {
    echo json_encode(["success" => false, "error" => "File upload failed, file not found"]);
    exit;
}

$insertQuery = "INSERT INTO reqtable (companyName, projectTitle, reqfile) VALUES (?, ?, ?)";
$stmt = $conn->prepare($insertQuery);
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

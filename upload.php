<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_FILES['file']) {
    $uploadDir = __DIR__ . "/b2/"; // Correct path using __DIR__
    
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); // Create folder if not exists
    }

    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $uploadDir . $fileName;

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
        echo json_encode(["success" => true, "filename" => $fileName]);
    } else {
        echo json_encode(["success" => false, "error" => "File move failed!"]);
    }
    exit();
} else {
    echo json_encode(["success" => false, "error" => "No file uploaded!"]);
    exit();
}
?>

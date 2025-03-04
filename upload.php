<?php
if ($_FILES['file']) {
    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // Allowed file types
    $allowed = ['pdf', 'jpg', 'jpeg', 'png', 'doc', 'docx', 'ppt', 'pptx'];

    if (in_array($fileType, $allowed)) {
        $uploadDir = "b2/";  // Ensure this directory exists
        $destination = $uploadDir . basename($fileName);

        if (move_uploaded_file($fileTmpName, $destination)) {
            echo json_encode(["success" => true, "filename" => $fileName]);
        } else {
            echo json_encode(["success" => false, "error" => "Upload failed."]);
        }
    } else {
        echo json_encode(["success" => false, "error" => "Invalid file type."]);
    }
} else {
    echo json_encode(["success" => false, "error" => "No file uploaded."]);
}
?>

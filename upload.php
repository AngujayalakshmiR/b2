<?php
session_start();
include 'dbconn.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $file = $_FILES["file"];
    $fileName = basename($file["name"]);
    $fileTmpName = $file["tmp_name"];
    $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowed = ["pdf", "jpg", "jpeg", "png", "doc", "docx", "ppt", "pptx", "xlsx", "xls"];

    if (!in_array($fileType, $allowed)) {
        echo json_encode(["success" => false, "error" => "Invalid file type: $fileType"]);
        exit();
    }

    $companyName = isset($_POST["companyName"]) ? $_POST["companyName"] : "";
    $projectTitle = isset($_POST["projectTitle"]) ? $_POST["projectTitle"] : "";

    if (empty($companyName) || empty($projectTitle)) {
        echo json_encode(["success" => false, "error" => "Missing companyName or projectTitle"]);
        exit();
    }

    $uploadDir = "reqfiles/";
    $destination = $uploadDir . $fileName;

    if (move_uploaded_file($fileTmpName, $destination)) {
        $stmt = $conn->prepare("INSERT INTO requirementtable (companyName, projectTitle, reqfile) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $companyName, $projectTitle, $destination);

        if ($stmt->execute()) {
            echo json_encode(["success" => true, "filename" => $fileName]);
        } else {
            echo json_encode(["success" => false, "error" => "Database error: " . $stmt->error]);
        }
        $stmt->close();
    } else {
        echo json_encode(["success" => false, "error" => "File upload failed."]);
    }
} else {
    echo json_encode(["success" => false, "error" => "No file uploaded."]);
}
?>

<?php
include 'dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $companyName = $_POST['companyName'];
    $projectType = $_POST['projectType'];
    $totalDays = $_POST['totalDays'];
    $projectTitle = $_POST['projectTitle'];
    $description = $_POST['description'];
    $employees = $_POST['employees'];
    
    // Get current date dynamically (YYYY-MM-DD format)
    $currentDate = date("Y-m-d");

    // File Handling
    $uploadDir = "reqfiles/";
    $reqfile = null;
    $fileName = null;

    if ($id) {
        $query = "SELECT reqfile FROM projectcreation WHERE ID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($existingFile);
        $stmt->fetch();
        $stmt->close();

        if (!empty($existingFile)) {
            $fileName = basename($existingFile);
            $reqfile = "reqfiles/" . $fileName;
        }
    }

    if (!empty($_FILES['reqfile']['name'])) {
        $fileName = basename($_FILES["reqfile"]["name"]);
        $targetFilePath = $uploadDir . $fileName;

        if ($id && !empty($existingFile) && file_exists($existingFile)) {
            unlink($existingFile);
        }

        if (move_uploaded_file($_FILES["reqfile"]["tmp_name"], $targetFilePath)) {
            $reqfile = $targetFilePath;
        } else {
            die(json_encode(["error" => "File upload failed"]));
        }
    }

    // Insert or Update
    if ($id) {
        $query = "UPDATE projectcreation SET companyName=?, projectType=?, totalDays=?, projectTitle=?, description=?, employees=?, reqfile=? WHERE ID=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssissssi", $companyName, $projectType, $totalDays, $projectTitle, $description, $employees, $reqfile, $id);
    } else {
        $query = "INSERT INTO projectcreation (date, companyName, projectType, totalDays, projectTitle, description, employees, reqfile) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssssss", $currentDate, $companyName, $projectType, $totalDays, $projectTitle, $description, $employees, $reqfile);
    }

    if ($stmt->execute()) {
        echo json_encode([
            "success" => $id ? "Project Updated!" : "Project Created!",
            "fileName" => $fileName
        ]);
    } else {
        echo json_encode(["error" => "Database error: " . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
}
?>
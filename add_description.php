<?php
session_start();
include("dbconn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $companyName = isset($_POST['companyName']) ? $_POST['companyName'] : '';
    $projectTitle = isset($_POST['projectTitle']) ? $_POST['projectTitle'] : '';
    $date = isset($_POST['date']) ? $_POST['date'] : '';
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';

    if (!empty($companyName) && !empty($projectTitle) && !empty($date) && !empty($title) && !empty($description)) {
        $sql = "INSERT INTO descriptiontable (date, companyName, projectTitle, desctitle, description) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        
        if ($stmt === false) {
            echo json_encode(["success" => false, "message" => "SQL Prepare failed: " . $conn->error]);
            exit;
        }

        $stmt->bind_param("sssss", $date, $companyName, $projectTitle, $title, $description);

        if ($stmt->execute()) {
            echo json_encode(["success" => true, "message" => "Description added successfully!"]);
        } else {
            echo json_encode(["success" => false, "message" => "Execution failed: " . $stmt->error]);
        }
        $stmt->close();
    } else {
        echo json_encode(["success" => false, "message" => "All fields are required."]);
    }
}
$conn->close();
?>
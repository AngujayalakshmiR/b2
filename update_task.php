<?php
include 'dbconn.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $taskId = $_POST['taskId'];
    $taskDetails = $_POST['taskDetails'];
    $actualHrs = $_POST['actualHrs'];

    if (empty($taskId) || empty($taskDetails) || empty($actualHrs)) {
        echo "Invalid input.";
        exit();
    }

    $sql = "UPDATE dailyupdates SET taskDetails = ?, actualHrs = ? WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $taskDetails, $actualHrs, $taskId);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

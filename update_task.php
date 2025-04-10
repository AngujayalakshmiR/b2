<?php
include 'dbconn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $taskId = $_POST['taskId'];
    $taskDetails = $_POST['taskDetails'];
    $newActualHrs = floatval($_POST['actualHrs']);

    if ($newActualHrs <= 0) {
        echo "Error: Actual hours must be greater than zero.";
        exit;
    }

    // Update task directly without checking 8hr limit
    $query = "UPDATE dailyupdates SET taskDetails = ?, actualHrs = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sdi", $taskDetails, $newActualHrs, $taskId);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "Error: Could not update task.";
    }
}
?>

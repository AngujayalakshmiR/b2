<?php
include('dbconn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include('dbconn.php');

    $followupId = $_POST['id'];

    if (!empty($followupId)) {
        $sql = "DELETE FROM followups WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $followupId);

        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Delete failed']);
        }

        $stmt->close();
        $conn->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid ID']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}


?>
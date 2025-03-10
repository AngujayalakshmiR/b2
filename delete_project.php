<?php
include("dbconn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['projectID'])) {
    $projectID = intval($_POST['projectID']);

    // Start a transaction
    $conn->begin_transaction();

    try {
        // Delete from projectcreation table
        $deleteProjectQuery = "DELETE FROM projectcreation WHERE ID = ?";
        $stmt = $conn->prepare($deleteProjectQuery);
        $stmt->bind_param("i", $projectID);
        $stmt->execute();

        // Commit transaction
        $conn->commit();
        echo "success";
    } catch (Exception $e) {
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }

    $stmt->close();
} else {
    echo "Invalid request!";
}

$conn->close();
?>

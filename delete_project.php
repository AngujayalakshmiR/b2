<?php
include("dbconn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['projectID'])) {
    $projectID = intval($_POST['projectID']);

    // Start a transaction
    $conn->begin_transaction();

    try {
        // Delete from projectcreation
        $deleteProjectQuery = "DELETE FROM projectcreation WHERE ID = ?";
        $stmt = $conn->prepare($deleteProjectQuery);
        $stmt->bind_param("i", $projectID);
        $stmt->execute();

        // Check if data was actually deleted
        if ($stmt->affected_rows === 0) {
            throw new Exception("No records deleted from projectcreation.");
        }

        // Commit transaction
        $conn->commit();
        echo json_encode(["success" => "Project deleted successfully"]);
    } catch (Exception $e) {
        $conn->rollback();
        echo json_encode(["error" => "Database error: " . $e->getMessage()]);
    }

    // Close statement
    $stmt->close();
} else {
    echo json_encode(["error" => "Invalid request"]);
}

$conn->close();
?>

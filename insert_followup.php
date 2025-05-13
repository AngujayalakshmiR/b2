<?php
include('dbconn.php');

$title = $_POST['title'];
$updates = $_POST['updates'];
$status = $_POST['status'];
$date = date('Y-m-d');

// Step 1: Check for duplicate (same title & status)
$checkQuery = "SELECT id FROM followups WHERE title = ? AND status = ?";
$checkStmt = $conn->prepare($checkQuery);
$checkStmt->bind_param("ss", $title, $status);
$checkStmt->execute();
$checkStmt->store_result();

if ($checkStmt->num_rows > 0) {
    // Duplicate exists
    echo json_encode(['success' => false, 'error' => 'duplicate']);
    $checkStmt->close();
    $conn->close();
    exit;
}

$checkStmt->close();
// Step 2: Insert new followup if no duplicate found
$sql = "INSERT INTO followups (date, title, updates, status) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $date, $title, $updates, $status);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'followupId' => $stmt->insert_id]);
} else {
    echo json_encode(['success' => false, 'error' => $stmt->error]);
}

$stmt->close();
$conn->close();
?>

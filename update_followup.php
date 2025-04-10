<?php 
include('dbconn.php');

$id = $_POST['followupId'];
$title = $_POST['title'];
$status = $_POST['status'];
$newUpdates = $_POST['newUpdate'];

if (!is_array($newUpdates)) {
    $newUpdates = [$newUpdates];
}

// Check if the combination of title and status already exists (excluding current record)
$checkSql = "SELECT id FROM followups WHERE title = ? AND status = ? AND id != ?";
$checkStmt = $conn->prepare($checkSql);
$checkStmt->bind_param("ssi", $title, $status, $id);
$checkStmt->execute();
$checkStmt->store_result();

if ($checkStmt->num_rows > 0) {
    echo "Duplicate title and status combination already exists.";
    $checkStmt->close();
    $conn->close();
    exit;
}
$checkStmt->close();

// Fetch existing updates and dates
$sql = "SELECT updates, date FROM followups WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($oldUpdates, $oldDates);
$stmt->fetch();
$stmt->close();

$updateArr = array_filter(explode(",", $oldUpdates));
$dateArr = array_filter(explode(",", $oldDates));

// Update last update (edit existing)
if (isset($newUpdates[0]) && $newUpdates[0] !== "") {
    $updateArr[count($updateArr) - 1] = trim($newUpdates[0]); // replace last update
    // dateArr remains unchanged for edit
}

// Add new update (append)
if (isset($newUpdates[1]) && $newUpdates[1] !== "") {
    $updateArr[] = trim($newUpdates[1]); // add new update
    $dateArr[] = date('Y-m-d'); // add today's date
}

// Prepare final comma-separated strings
$finalUpdates = implode(",", $updateArr);
$finalDates = implode(",", $dateArr);

// Update the database
$sql = "UPDATE followups SET title = ?, updates = ?, date = ?, status = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $title, $finalUpdates, $finalDates, $status, $id);

if ($stmt->execute()) {
    echo "Update successful";
} else {
    echo "Update failed: " . $stmt->error;
}

$conn->close();

?>

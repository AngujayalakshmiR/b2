<?php
include('dbconn.php');

$sql = "SELECT * FROM followups ORDER BY id DESC";
$result = $conn->query($sql);

$followups = [];

while ($row = $result->fetch_assoc()) {
    $updatesArray = explode(',', $row['updates']);
    $lastUpdate = end($updatesArray); // get the last update only

    $followups[] = [
        'followupId' => $row['id'],
        'title' => $row['title'],
        'last_update' => $lastUpdate,
        'status' => $row['status']
    ];
}

header('Content-Type: application/json');
echo json_encode($followups);
?>

<?php
include "dbconn.php"; // Ensure you have a DB connection file

header('Content-Type: application/json');

$sql = "SELECT id, name, module, GROUP_CONCAT(rights SEPARATOR ', ') AS rights FROM userrights GROUP BY id, name, module";
$result = $conn->query($sql);

$rightsArray = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rightsArray[] = $row;
    }
}

echo json_encode($rightsArray);
?>

<?php
include ("dbconn.php");
$sql = "SELECT Name FROM employeedetails";
$result = $conn->query($sql);

$employees = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $employees[] = $row['Name'];
    }
}

$conn->close();
echo json_encode($employees);
?>

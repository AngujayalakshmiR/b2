<?php
include("dbconn.php");

$sql = "SELECT * FROM employeedetails";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['ID']}</td>
                <td>{$row['Name']}</td>
                <td>{$row['Designation']}</td>
                <td>{$row['empPhNo']}</td>
                <td>{$row['empAdd']}</td>
                <td>
                    <button class='btn-edit' data-id='{$row['ID']}'>Edit</button>
                    <button class='delete-btn' data-id='{$row['ID']}'>Delete</button>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='6'>No employees found</td></tr>";
}

$conn->close();
?>

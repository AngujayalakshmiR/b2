<?php
include("dbconn.php");

// Fetch designations
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $sql = "SELECT * FROM designation ORDER BY ID DESC";
    $result = $conn->query($sql);

    $output = "";
    $sno = 1;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $output .= "<tr>
                            <td>{$sno}</td>
                            <td>{$row['Des_name']}</td>
                            <td class='action-buttons'>
                                <button class='btn-action btn-edit' data-id='{$row['ID']}'><i class='fas fa-edit'></i></button>
                                <button class='btn-action btn-delete' data-id='{$row['ID']}'><i class='fas fa-trash-alt' style='color: rgb(238, 153, 129);'></i></button>
                            </td>
                        </tr>";
            $sno++;
        }
    } else {
        $output .= "<tr><td colspan='3'>No designations found</td></tr>";
    }

    echo $output;
    exit;
}


// Add New Designation
if (isset($_POST['designationtype']) && !isset($_POST['edit_id'])) {
    $designation = $_POST['designationtype'];

    $stmt = $conn->prepare("INSERT INTO designation (Des_name) VALUES (?)");
    $stmt->bind_param("s", $designation);
    
    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Designation added successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error adding designation"]);
    }

    $stmt->close();
    exit;
}

// Delete Designation
if (isset($_POST['delete_id'])) { // Changed key to 'delete_id' to avoid conflicts
    $id = $_POST['delete_id'];

    $stmt = $conn->prepare("DELETE FROM designation WHERE ID = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Designation deleted successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error deleting designation"]);
    }

    $stmt->close();
    exit;
}

// Update Existing Designation
if (isset($_POST['edit_id']) && isset($_POST['designationtype'])) {
    $id = intval($_POST['edit_id']);  // Ensure it's an integer
    $designation = $_POST['designationtype'];

    $stmt = $conn->prepare("UPDATE designation SET Des_name = ? WHERE ID = ?");
    $stmt->bind_param("si", $designation, $id);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Designation updated successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error updating designation"]);
    }

    $stmt->close();
    exit;
}
$conn->close();
?>

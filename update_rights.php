<?php
include 'dbconn.php';
header('Content-Type: application/json'); // Ensure JSON response

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employeeName = $_POST['employee'];

    // Check if employee already exists in the userrights table
    $checkEmployeeQuery = "SELECT COUNT(*) as count FROM userrights WHERE name = ?";
    $stmt = $conn->prepare($checkEmployeeQuery);
    $stmt->bind_param("s", $employeeName);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $isExistingEmployee = ($row['count'] > 0); // TRUE if employee exists in DB

    // Get all existing modules for the employee
    $existingModules = [];
    $fetchQuery = "SELECT module FROM userrights WHERE name = ?";
    $stmt = $conn->prepare($fetchQuery);
    $stmt->bind_param("s", $employeeName);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $existingModules[] = $row['module'];
    }

    // Get modules submitted in the form
    $postedModules = isset($_POST['rights']) ? array_keys($_POST['rights']) : [];

    // If it's a new employee and no rights are selected, return error
    if (!$isExistingEmployee && empty($postedModules)) {
        echo json_encode(["status" => "error", "message" => "Please select at least one right for a new employee."]);
        exit();
    }

    // Process rights updates
    foreach ($postedModules as $module) {
        $selectedRights = $_POST['rights'][$module];

        if (!empty($selectedRights)) {
            $rightsStr = implode(",", $selectedRights);

            // Check if this module already exists for the employee
            $checkQuery = "SELECT * FROM userrights WHERE name = ? AND module = ?";
            $stmt = $conn->prepare($checkQuery);
            $stmt->bind_param("ss", $employeeName, $module);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Update existing rights
                $updateQuery = "UPDATE userrights SET rights = ? WHERE name = ? AND module = ?";
                $stmt = $conn->prepare($updateQuery);
                $stmt->bind_param("sss", $rightsStr, $employeeName, $module);
                $stmt->execute();
            } else {
                // Insert new module rights
                $insertQuery = "INSERT INTO userrights (name, module, rights) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($insertQuery);
                $stmt->bind_param("sss", $employeeName, $module, $rightsStr);
                $stmt->execute();
            }
        }
    }

    // Delete any modules that are missing from the form submission
    foreach ($existingModules as $module) {
        if (!in_array($module, $postedModules)) {
            $deleteQuery = "DELETE FROM userrights WHERE name = ? AND module = ?";
            $stmt = $conn->prepare($deleteQuery);
            $stmt->bind_param("ss", $employeeName, $module);
            $stmt->execute();
        }
    }

    echo json_encode(["status" => "success", "message" => "User rights updated successfully!"]);
}
?>

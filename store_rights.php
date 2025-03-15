<?php
include 'dbconn.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employeeName = $_POST['employee'];

    if (!empty($_POST['rights']) && !empty($employeeName)) {
        foreach ($_POST['rights'] as $module => $selectedRights) {
            $rightsStr = implode(",", $selectedRights); // Convert array to comma-separated string

            // Insert into database
            $stmt = $conn->prepare("INSERT INTO userrights (name, module, rights) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $employeeName, $module, $rightsStr);
            $stmt->execute();
        }
        echo "success"; // Return success response for AJAX
    } else {
        echo "error"; // Return error response for AJAX
    }
}
?>
<?php
include 'dbconn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employeeName = $_POST['employee'];
    $response = ["success" => false, "data" => []];

    $sql = "SELECT module, rights FROM userrights WHERE name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $employeeName);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $response["data"][$row['module']] = explode(",", $row['rights']); // Convert string back to array
    }

    if (!empty($response["data"])) {
        $response["success"] = true;
    }

    echo json_encode($response);
}
?>

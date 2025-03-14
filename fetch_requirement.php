<?php
session_start();
include 'dbconn.php'; // Ensure this file has the database connection

$companyName = isset($_GET['company']) ? htmlspecialchars($_GET['company']) : '';
$projectTitle = isset($_GET['title']) ? htmlspecialchars($_GET['title']) : '';

if (!empty($companyName) && !empty($projectTitle)) {
    $query = "SELECT reqfile FROM requirementtable WHERE companyName = ? AND projectTitle = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $companyName, $projectTitle);
    $stmt->execute();
    $result = $stmt->get_result();

    $files = [];
    while ($row = $result->fetch_assoc()) {
        $files[] = $row['reqfile'];
    }
    
    $stmt->close();
    
    echo json_encode(['files' => $files]);
} else {
    echo json_encode(['files' => []]);
}
?>

<?php
session_start();
include 'dbconn.php'; // Ensure this file has the database connection

$companyName = isset($_GET['company']) ? htmlspecialchars($_GET['company']) : '';
$projectTitle = isset($_GET['title']) ? htmlspecialchars($_GET['title']) : '';

$files = [];

if (!empty($companyName) && !empty($projectTitle)) {
    // Fetch the first file from projectcreation table
    $queryFirst = "SELECT reqfile FROM projectcreation WHERE companyName = ? AND projectTitle = ? LIMIT 1";
    $stmtFirst = $conn->prepare($queryFirst);
    $stmtFirst->bind_param("ss", $companyName, $projectTitle);
    $stmtFirst->execute();
    $resultFirst = $stmtFirst->get_result();

    if ($rowFirst = $resultFirst->fetch_assoc()) {
        $files[] = $rowFirst['reqfile']; // First file from projectcreation table
    }
    $stmtFirst->close();

    // Fetch remaining files from reqtable
    $query = "SELECT reqfile FROM reqtable WHERE companyName = ? AND projectTitle = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $companyName, $projectTitle);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $files[] = $row['reqfile']; // Remaining files from reqtable
    }
    
    $stmt->close();
}

echo json_encode(['files' => $files]);
?>

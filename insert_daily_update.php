<?php
session_start();
include 'dbconn.php'; // Database connection

if (!isset($_SESSION['empUserName'])) {
    echo "Session expired. Please log in again.";
    exit();
}

$Name = $_SESSION['Name'];
$companyName = $_POST['companyName'] ?? '';
$projectTitle = $_POST['projectTitle'] ?? '';
$projectType = $_POST['projectType'] ?? '';
$totalDays = $_POST['totalDays'] ?? '';
$taskDetails = $_POST['taskDetails'] ?? '';
$totalHrs = $_POST['totalHrs'] ?? '';

if (empty($companyName) || empty($projectTitle) || empty($taskDetails) || empty($totalHrs)) {
    echo "All fields are required.";
    exit();
}

// Insert into dailyupdates table
$insertSql = "INSERT INTO dailyupdates (date, name, companyName, projectTitle, projectType, totalDays, taskDetails, totalHrs, actualHrs) 
              VALUES (CURDATE(), ?, ?, ?, ?, ?, ?, ?, '-')";

$insertStmt = $conn->prepare($insertSql);
$insertStmt->bind_param("sssssss", $Name, $companyName, $projectTitle, $projectType, $totalDays, $taskDetails, $totalHrs);

if ($insertStmt->execute()) {
    echo "success"; // Triggers SweetAlert in JavaScript
} else {
    echo "Error: " . $insertStmt->error;
}

$insertStmt->close();
$conn->close();
?>
<?php 
session_start();

if (!isset($_SESSION['empUserName'])) {
    header("Location: login.php");
    exit();
}

include ("dbconn.php");

// Fetch query parameters
$companyName = isset($_GET['company']) ? htmlspecialchars($_GET['company']) : '';
$projectTitle = isset($_GET['title']) ? htmlspecialchars($_GET['title']) : '';

// Fetch description from descriptiontable
$description = "";
if ($companyName && $projectTitle) {
    $stmt = $conn->prepare("SELECT description FROM descriptiontable WHERE companyName = ? AND projectTitle = ?");
    $stmt->bind_param("ss", $companyName, $projectTitle);
    $stmt->execute();
    $stmt->bind_result($description);
    $stmt->fetch();
    $stmt->close();
}

$conn->close();
?>
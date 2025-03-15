<?php
include 'dbconn.php'; // Include database connection

$companyName = isset($_GET['company']) ? $_GET['company'] : '';
$projectTitle = isset($_GET['title']) ? $_GET['title'] : '';
$projectType = isset($_GET['type']) ? $_GET['type'] : '';

$workingDays = 0;

if ($companyName && $projectTitle && $projectType) {
    $query = "SELECT SUM(actualHrs) AS totalActualHrs FROM dailyupdates 
              WHERE companyName = ? AND projectTitle = ? AND projectType = ?";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $companyName, $projectTitle, $projectType);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    
    if ($data && $data['totalActualHrs']) {
        $workingDays = $data['totalActualHrs'] / 8; // Keep decimal values
    }
}

echo json_encode(['workingDays' => round($workingDays, 2)]); // Round to 2 decimal places
?>

<?php
include 'dbconn.php'; // Database connection

$companyName = isset($_GET['company']) ? $_GET['company'] : '';
$projectTitle = isset($_GET['title']) ? $_GET['title'] : '';
$projectType = isset($_GET['type']) ? $_GET['type'] : '';

$response = ['teammates' => '', 'actualHrs' => 0, 'workingDays' => 0];

if ($companyName && $projectTitle && $projectType) {
    // Fetch actual hours from dailyupdates table
    $query1 = "SELECT SUM(actualHrs) AS totalActualHrs FROM dailyupdates WHERE companyName = ? AND projectTitle = ? AND projectType = ?";
    $stmt1 = $conn->prepare($query1);
    $stmt1->bind_param("sss", $companyName, $projectTitle, $projectType);
    $stmt1->execute();
    $result1 = $stmt1->get_result();
    $data1 = $result1->fetch_assoc();
    $totalActualHrs = $data1['totalActualHrs'] ?: 0;
    
    // Fetch teammates from projectcreation table
    $query2 = "SELECT employees FROM projectcreation WHERE companyName = ? AND projectTitle = ? AND projectType = ?";
    $stmt2 = $conn->prepare($query2);
    $stmt2->bind_param("sss", $companyName, $projectTitle, $projectType);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    $data2 = $result2->fetch_assoc();
    $teammates = $data2['employees'] ?: 'N/A';
    
    // Calculate working days
    $workingDays = round($totalActualHrs / 8, 2);
    
    $response['teammates'] = $teammates;
    $response['actualHrs'] = round($totalActualHrs, 2);
    $response['workingDays'] = $workingDays;
}

echo json_encode($response);
?>
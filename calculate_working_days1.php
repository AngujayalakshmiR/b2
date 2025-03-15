<?php
include 'dbconn.php'; // Database connection

$companyName = isset($_GET['company']) ? $_GET['company'] : '';
$projectTitle = isset($_GET['title']) ? $_GET['title'] : '';
$projectType = isset($_GET['type']) ? $_GET['type'] : '';

$response = ['teammates' => '', 'actualHrs' => 0, 'workingDays' => 0];

if ($companyName && $projectTitle && $projectType) {
    $query = "SELECT GROUP_CONCAT(DISTINCT name SEPARATOR ', ') AS teammates, 
                     SUM(actualHrs) AS totalActualHrs 
              FROM dailyupdates 
              WHERE companyName = ? AND projectTitle = ? AND projectType = ?";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $companyName, $projectTitle, $projectType);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if ($data) {
        $totalActualHrs = $data['totalActualHrs'] ?: 0; // Ensure it's not null
        $workingDays = round($totalActualHrs / 8, 2); // Calculate working days

        $response['teammates'] = $data['teammates'] ?: 'N/A';
        $response['actualHrs'] = round($totalActualHrs, 2);
        $response['workingDays'] = $workingDays; // Add working days to response
    }
}

echo json_encode($response);
?>

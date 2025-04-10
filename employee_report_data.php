<?php
session_start();
include "dbconn.php";

if (!isset($_SESSION['empUserName'])) {
    echo json_encode(["error" => "Unauthorized"]);
    exit();
}

$Name = $_SESSION['Name'];
$companyName = isset($_GET['company']) ? $_GET['company'] : '';
$projectTitle = isset($_GET['title']) ? $_GET['title'] : '';

$response = ['projectType' => '', 'workingDays' => 0, 'teammates' => ''];

if ($companyName && $projectTitle) {
    // Get projectType from dailyupdates
    $query1 = "SELECT projectType FROM dailyupdates WHERE companyName = ? AND projectTitle = ? AND name = ?";
    $stmt1 = $conn->prepare($query1);
    $stmt1->bind_param("sss", $companyName, $projectTitle, $Name);
    $stmt1->execute();
    $result1 = $stmt1->get_result();
    $data1 = $result1->fetch_assoc();
    $projectType = $data1['projectType'];

    // Get total actual hours for the logged-in user
    $query2 = "SELECT SUM(actualHrs) AS totalActualHrs FROM dailyupdates WHERE companyName = ? AND projectTitle = ? AND name = ?";
    $stmt2 = $conn->prepare($query2);
    $stmt2->bind_param("sss", $companyName, $projectTitle, $Name);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    $data2 = $result2->fetch_assoc();
    $totalActualHrs = $data2['totalActualHrs'] ?: 0;

    // Calculate working days
    $workingDays = round($totalActualHrs / 8, 2);

    // Get teammates from projectcreation table
    $query3 = "SELECT employees FROM projectcreation WHERE companyName = ? AND projectTitle = ?";
    $stmt3 = $conn->prepare($query3);
    $stmt3->bind_param("ss", $companyName, $projectTitle);
    $stmt3->execute();
    $result3 = $stmt3->get_result();
    $data3 = $result3->fetch_assoc();
    $teammates = $data3['employees'];

    $response['projectType'] = $projectType;
    $response['workingDays'] = $workingDays;
    $response['teammates'] = $teammates;
}

echo json_encode($response);
?>

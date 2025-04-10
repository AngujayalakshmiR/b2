<?php
include("dbconn.php");

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set JSON response header
header('Content-Type: application/json');

// Check database connection
if (!$conn) {
    die(json_encode(["error" => "Database connection failed: " . mysqli_connect_error()]));
}

// Handle GET request (Fetching Employee Details)
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!isset($_GET['id'])) {
        echo json_encode(["error" => "No ID provided"]);
        exit();
    }

    $id = intval($_GET['id']);
    $sql = "SELECT * FROM employeedetails WHERE ID = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo json_encode(["error" => "Statement preparation failed: " . $conn->error]);
        exit();
    }

    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo json_encode(["error" => "No employee found"]);
        exit();
    }

    $employee = $result->fetch_assoc();
    $employee['empPic'] = basename($employee['empPic']);
    $employee['empAadhar'] = basename($employee['empAadhar']);
    $employee['empPan'] = basename($employee['empPan']);

    echo json_encode($employee);
    exit();
}

// Handle POST request (Adding/Updating Employee Details)
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Sanitize inputs and handle missing values
//     $employee_id = isset($_POST['employee_id']) ? trim($_POST['employee_id']) : null;
//     $employeename = isset($_POST['employeename']) ? trim($_POST['employeename']) : "";
//     $designation = isset($_POST['designation']) ? trim($_POST['designation']) : "";
//     $employeephnno = isset($_POST['employeephnno']) ? trim($_POST['employeephnno']) : "";
//     $customeraddress = isset($_POST['customeraddress']) ? trim($_POST['customeraddress']) : "";
//     $district = isset($_POST['district']) ? trim($_POST['district']) : "";
//     $state = isset($_POST['state']) ? trim($_POST['state']) : "";
//     $pincode = isset($_POST['pincode']) ? trim($_POST['pincode']) : "";
//     $country = isset($_POST['country']) ? trim($_POST['country']) : "";
//     $username = isset($_POST['username']) ? trim($_POST['username']) : "";
//     $password = isset($_POST['password']) ? trim($_POST['password']) : "";

//     // Check for duplicate username or password
//     if ($employee_id) {
//         $checkQuery = "SELECT * FROM employeedetails WHERE (empUserName = ? OR empPassword = ?) AND ID != ?";
//         $stmt = $conn->prepare($checkQuery);
//         $stmt->bind_param("ssi", $username, $password, $employee_id);
//     } else {
//         $checkQuery = "SELECT * FROM employeedetails WHERE empUserName = ? OR empPassword = ?";
//         $stmt = $conn->prepare($checkQuery);
//         $stmt->bind_param("ss", $username, $password);
//     }

//     if (!$stmt) {
//         echo json_encode(["status" => "error", "message" => "Query preparation failed: " . $conn->error]);
//         exit();
//     }

//     $stmt->execute();
//     $result = $stmt->get_result();

//     if ($result->num_rows > 0) {
//         echo json_encode(["status" => "error", "message" => "Username or Password already exists!"]);
//         exit();
//     }

//     // File upload handling
//     $targetDir = "uploads/";
//     if (!file_exists($targetDir)) {
//         mkdir($targetDir, 0777, true);
//     }

//     function uploadFile($fileInput, $oldFile)
//     {
//         global $targetDir;
//         if (!empty($_FILES[$fileInput]["name"])) {
//             $filePath = $targetDir . basename($_FILES[$fileInput]["name"]);

//             if (!move_uploaded_file($_FILES[$fileInput]["tmp_name"], $filePath)) {
//                 die(json_encode(["error" => "File upload failed: " . $_FILES[$fileInput]["error"]]));
//             }

//             return $filePath;
//         }
//         return !empty($oldFile) ? $oldFile : "";
//     }

//     // Upload new files or keep old files if not updated
//     $photo = uploadFile("employeePhoto", $_POST["old_employeePhoto"]);
//     $aadhar = uploadFile("aadharCard", $_POST["old_aadharCard"]);
//     $pan = uploadFile("panCard", $_POST["old_panCard"]);

//     if (!empty($employee_id)) {
//         // Update Employee Details
//         $updateQuery = "UPDATE employeedetails 
//                         SET Name=?, Designation=?, empPhNo=?, empAdd=?, empDistrict=?, empState=?, empPincode=?, empCountry=?, 
//                             empPic=?, empAadhar=?, empPan=?, empUserName=?, empPassword=? 
//                         WHERE ID=?";
//         $stmt = $conn->prepare($updateQuery);

//         if (!$stmt) {
//             echo json_encode(["status" => "error", "message" => "Update preparation failed: " . $conn->error]);
//             exit();
//         }

//         $stmt->bind_param("sssssssssssssi", $employeename, $designation, $employeephnno, $customeraddress, $district, $state, $pincode, 
//                                             $country, $photo, $aadhar, $pan, $username, $password, $employee_id);
//     } else {
//         // Insert New Employee
//         $insertQuery = "INSERT INTO employeedetails 
//                         (Name, Designation, empPhNo, empAdd, empDistrict, empState, empPincode, empCountry, empPic, empAadhar, empPan, empUserName, empPassword) 
//                         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
//         $stmt = $conn->prepare($insertQuery);

//         if (!$stmt) {
//             echo json_encode(["status" => "error", "message" => "Insert preparation failed: " . $conn->error]);
//             exit();
//         }

//         $stmt->bind_param("sssssssssssss", $employeename, $designation, $employeephnno, $customeraddress, $district, $state, $pincode, 
//                                             $country, $photo, $aadhar, $pan, $username, $password);
//     }

//     // Execute the query
//     if ($stmt->execute()) {
//         echo json_encode(["status" => "success", "message" => $employee_id ? "Employee updated successfully!" : "Employee added successfully!"]);
//     } else {
//         echo json_encode(["status" => "error", "message" => "Database error: " . $stmt->error]);
//     }

//     // Close statement and connection
//     $stmt->close();
//     $conn->close();
// }
?>

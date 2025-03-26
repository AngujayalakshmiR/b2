<?php  
include("dbconn.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employeename = trim($_POST['employeename']);
    $designation = trim($_POST['designation']);
    $employeephnno = trim($_POST['employeephnno']);
    $customeraddress = trim($_POST['customeraddress']);
    $district = trim($_POST['district']);
    $state = trim($_POST['state']);
    $pincode = trim($_POST['pincode']);
    $country = trim($_POST['country']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Check for duplicate username or password
    $checkQuery = "SELECT * FROM employeedetails WHERE empUserName = ? OR empPassword = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(["status" => "error", "message" => "Username or Password already exists!"]);
        exit();
    }

    // File upload function
    function uploadFile($fileInput) {
        $targetDir = "uploads/";
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        if (!empty($_FILES[$fileInput]["name"])) {
            $filePath = $targetDir . basename($_FILES[$fileInput]["name"]);
            if (move_uploaded_file($_FILES[$fileInput]["tmp_name"], $filePath)) {
                return $filePath;
            } else {
                return "";
            }
        }
        return "";
    }

    $photo = uploadFile("employeePhoto");
    $aadhar = uploadFile("aadharCard");
    $pan = uploadFile("panCard");

    // Insert into database
    $insertQuery = "INSERT INTO employeedetails 
                    (Name, Designation, empPhNo, empAdd, empDistrict, empState, empPincode, empCountry, empPic, empAadhar, empPan, empUserName, empPassword) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("sssssssssssss", $employeename, $designation, $employeephnno, $customeraddress, $district, $state, $pincode, 
                                        $country, $photo, $aadhar, $pan, $username, $password);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Employee added successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Database error: " . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
}
?>

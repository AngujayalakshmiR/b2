<?php
include("dbconn.php");

header('Content-Type: application/json');


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!isset($_GET['id'])) {
        echo json_encode(["error" => "No ID provided"]);
        exit();
    }

    $id = intval($_GET['id']);
    $sql = "SELECT * FROM employeedetails WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo json_encode(["error" => "No employee found"]);
        exit();
    }

    $employee = $result->fetch_assoc();

    // Extract only file names from the path
    $employee['empPic'] = basename($employee['empPic']);
    $employee['empAadhar'] = basename($employee['empAadhar']);
    $employee['empPan'] = basename($employee['empPan']);

    echo json_encode($employee);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['employee_id'])) { // Editing an existing employee
        $id = $_POST["employee_id"];
        $employeename = $_POST["employeename"];
        $designation = $_POST["designation"];
        $employeephnno = $_POST["employeephnno"];
        $customeraddress = $_POST["customeraddress"];
        $district = $_POST["district"];
        $state = $_POST["state"];
        $pincode = $_POST["pincode"];
        $country = $_POST["country"];
        $username = $_POST["username"];
        $password = $_POST["password"];

        // File upload handling
        $targetDir = "uploads/";
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $photo = isset($_POST["old_employeePhoto"]) && empty($_FILES["employeePhoto"]["name"]) ? $_POST["old_employeePhoto"] : $targetDir . basename($_FILES["employeePhoto"]["name"]);
        if (!empty($_FILES["employeePhoto"]["name"])) {
            move_uploaded_file($_FILES["employeePhoto"]["tmp_name"], $photo);
        }

        $aadhar = isset($_POST["old_aadharCard"]) && empty($_FILES["aadharCard"]["name"]) ? $_POST["old_aadharCard"] : $targetDir . basename($_FILES["aadharCard"]["name"]);
        if (!empty($_FILES["aadharCard"]["name"])) {
            move_uploaded_file($_FILES["aadharCard"]["tmp_name"], $aadhar);
        }

        $pan = isset($_POST["old_panCard"]) && empty($_FILES["panCard"]["name"]) ? $_POST["old_panCard"] : $targetDir . basename($_FILES["panCard"]["name"]);
        if (!empty($_FILES["panCard"]["name"])) {
            move_uploaded_file($_FILES["panCard"]["tmp_name"], $pan);
        }

        // Update query
        $sql = "UPDATE employeedetails 
                SET Name=?, Designation=?, empPhNo=?, empAdd=?, empDistrict=?, empState=?, empPincode=?, empCountry=?, empPic=?, empAadhar=?, empPan=?, empUserName=?, empPassword=? 
                WHERE ID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssssssssi", $employeename, $designation, $employeephnno, $customeraddress, $district, $state, $pincode, $country, $photo, $aadhar, $pan, $username, $password, $id);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Employee updated successfully!"]);
        } else {
            echo json_encode(["error" => "Error updating employee: " . $stmt->error]);
        }
    } else { // New employee insertion
        $employeename = $_POST['employeename'];
        $designation = $_POST['designation'];
        $employeephnno = $_POST['employeephnno'];
        $customeraddress = $_POST['customeraddress'];
        $country = $_POST['country'];
        $state = $_POST['state'];
        $district = $_POST['district'];
        $pincode = $_POST['pincode'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        // File upload handling
        $targetDir = "uploads/";
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $empPic = $targetDir . basename($_FILES['employeePhoto']['name']);
        move_uploaded_file($_FILES['employeePhoto']['tmp_name'], $empPic);

        $empAadhar = $targetDir . basename($_FILES['aadharCard']['name']);
        move_uploaded_file($_FILES['aadharCard']['tmp_name'], $empAadhar);

        $empPan = $targetDir . basename($_FILES['panCard']['name']);
        move_uploaded_file($_FILES['panCard']['tmp_name'], $empPan);

        $sql = "INSERT INTO employeedetails (Name, Designation, empPhNo, empAdd, empCountry, empState, empDistrict, empPincode, empPic, empAadhar, empPan, empUserName, empPassword) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssssssss", $employeename, $designation, $employeephnno, $customeraddress, $country, $state, $district, $pincode, $empPic, $empAadhar, $empPan, $username, $password);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Data inserted successfully!"]);
        } else {
            echo json_encode(["error" => "Error: " . $conn->error]);
        }
    }
    exit;
}

$conn->close();
?>

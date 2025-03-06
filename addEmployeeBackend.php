<?php
include ("dbconn.php");

$sql = "SELECT Name, Designation, empPhNo, empAdd, empPic, empAadhar, empPan, empUserName FROM employeedetails";
$result = $conn->query($sql);

$employees = array();
while ($row = $result->fetch_assoc()) {
    $employees[] = $row;
}

echo json_encode(["data" => $employees]);

// Retrieve form data
$employeename = $_POST['employeename'];
$designation = $_POST['designation'];
$employeephnno = $_POST['employeephnno'];
$customeraddress = $_POST['customeraddress'];
$country = $_POST['country'];
$district = $_POST['district'];
$state = $_POST['state'];
$pincode = $_POST['pincode'];
$username = $_POST['username'];
$password = $_POST['password'];

// Concatenate the full address
$fullAddress = $customeraddress . ", " . $district . ", " . $state . ", " . $country . " - " . $pincode;

// File Upload Handling
$targetDir = "uploads/"; // Folder where files will be saved

// Ensure the uploads folder exists
if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true);
}

// Process employee photo
$empPic = $targetDir . basename($_FILES['employeePhoto']['name']);
move_uploaded_file($_FILES['employeePhoto']['tmp_name'], $empPic);

// Process Aadhar Card
$empAadhar = $targetDir . basename($_FILES['aadharCard']['name']);
move_uploaded_file($_FILES['aadharCard']['tmp_name'], $empAadhar);

// Process PAN Card
$empPan = $targetDir . basename($_FILES['panCard']['name']);
move_uploaded_file($_FILES['panCard']['tmp_name'], $empPan);

// Insert into database with full path
$sql = "INSERT INTO employeedetails (Name, Designation, empPhNo, empAdd, empPic, empAadhar, empPan, empUserName, empPassword) 
        VALUES ('$employeename', '$designation', '$employeephnno', '$fullAddress', '$empPic', '$empAadhar', '$empPan', '$username', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully!";
} else {
    echo "Error: " . $conn->error;
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Check if ID exists before deleting
    $checkQuery = "SELECT * FROM employeedetails WHERE ID = ?";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bind_param("i", $id);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if ($result->num_rows > 0) {
        $deleteQuery = "DELETE FROM employeedetails WHERE ID = ?";
        $deleteStmt = $conn->prepare($deleteQuery);
        $deleteStmt->bind_param("i", $id);

        if ($deleteStmt->execute()) {
            echo "success";
        } else {
            echo "Error deleting employee: " . $deleteStmt->error;
        }

        $deleteStmt->close();
    } else {
        echo "Employee ID not found.";
    }

    $checkStmt->close();
} else {
    echo "ID not received";
}


$conn->close();
?>

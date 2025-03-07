<?php
include("dbconn.php");

header('Content-Type: application/json'); // Ensure JSON response

// Handle employee insertion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['employeename'])) {
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

    $fullAddress = "$customeraddress, $district, $state, $country - $pincode";

    $targetDir = "uploads/";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // Handle file uploads safely
    $empPic = $targetDir . basename($_FILES['employeePhoto']['name']);
    move_uploaded_file($_FILES['employeePhoto']['tmp_name'], $empPic);

    $empAadhar = $targetDir . basename($_FILES['aadharCard']['name']);
    move_uploaded_file($_FILES['aadharCard']['tmp_name'], $empAadhar);

    $empPan = $targetDir . basename($_FILES['panCard']['name']);
    move_uploaded_file($_FILES['panCard']['tmp_name'], $empPan);

    $sql = "INSERT INTO employeedetails (Name, Designation, empPhNo, empAdd, empPic, empAadhar, empPan, empUserName, empPassword) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $employeename, $designation, $employeephnno, $fullAddress, $empPic, $empAadhar, $empPan, $username, $password);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Data inserted successfully!"]);
    } else {
        echo json_encode(["error" => "Error: " . $conn->error]);
    }
    exit;
}

// Handle fetching employee details for editing
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['edit'])) {
    $id = intval($_POST['id']);

    $stmt = $conn->prepare("SELECT * FROM employeedetails WHERE ID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $employee = $result->fetch_assoc();
        echo json_encode($employee);
    } else {
        echo json_encode(["error" => "Employee not found"]);
    }
    exit;
}

// Handle updating employee details
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
    $employeeName = $_POST['employeename'];
    $designation = $_POST['designation'];
    $phoneno = $_POST['employeeno'];
    $address = $_POST['employeeaddress'];
    $district = $_POST['district'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $pincode = $_POST['pincode'];
    $fullAddress = "$address, $district, $state, $country - $pincode";

    $stmt = $conn->prepare("UPDATE employeedetails SET Name=?, Designation=?, empPhNo=?, empAdd=? WHERE ID=?");
    $stmt->bind_param("ssssi", $employeeName, $designation, $phoneno, $fullAddress, $id);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Employee updated successfully"]);
    } else {
        echo json_encode(["error" => "Error updating employee"]);
    }
    exit;
}

// Default case: Fetch all employees (if no specific POST request was made)
$sql = "SELECT Name, Designation, empPhNo, empAdd, empPic, empAadhar, empPan, empUserName FROM employeedetails";
$result = $conn->query($sql);

$employees = array();
while ($row = $result->fetch_assoc()) {
    $employees[] = $row;
}

echo json_encode(["data" => $employees]); // ✅ This response should be the last one

$conn->close();
?>

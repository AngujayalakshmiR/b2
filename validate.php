<?php
session_start();
include 'dbconn.php'; // Ensure this file has a valid DB connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($username) && !empty($password)) {
        $sql = "SELECT * FROM employeedetails WHERE empUserName = ? AND empPassword = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            $_SESSION['empUserName'] = $user['empUserName'];
            $_SESSION['Name'] = $user['Name'];
            $_SESSION['empId'] = $user['empId']; // Store user ID if needed
            
            header("Location: employeedash.php");
            exit();
        } else {
            $_SESSION['login_error'] = "Invalid Username or Password!";
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['login_error'] = "Both fields are required!";
        header("Location: login.php");
        exit();
    }
}

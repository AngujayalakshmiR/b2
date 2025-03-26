<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
include 'dbconn.php'; // Ensure this file has a valid DB connection ?>
<?php

$message = ""; // Variable to store alert messages

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employeeName = $_POST['employee'];
    
    if (!empty($_POST['rights']) && !empty($employeeName)) {
        foreach ($_POST['rights'] as $module => $selectedRights) {
            $rightsStr = implode(",", $selectedRights); // Convert array to comma-separated string

            // Insert into database
            $stmt = $conn->prepare("INSERT INTO userrights (name, module, rights) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $employeeName, $module, $rightsStr);
            $stmt->execute();
        }
        
        // Success message
        $message = "User rights successfully stored!";
        $alertType = "success";
    } else {
        // Error message
        $message = "Please select at least one right and an employee.";
        $alertType = "error";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="img/ktglogo.jpg">
    <title>Task Manager</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        <!-- jQuery (Must be before DataTables) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables CSS -->
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
<style>
    thead{
        color:black;
    }
    #dataTable1 th:nth-child(1), #dataTable1 td:nth-child(1) { width: 12%; }  /* S.no */
        #dataTable1 th:nth-child(2), #dataTable1 td:nth-child(2) { width: 40%; }  /* S.no */
        #dataTable1 th:nth-child(3), #dataTable1 td:nth-child(3) { width: 12%; }
#dataTable1 th:nth-child(3), #dataTable1 td:nth-child(3) { width: 12%; } /* Name */
#dataTable1 th:nth-child(4), #dataTable1 td:nth-child(4) { width: 12%; } /* Date */
#dataTable1 th:nth-child(5), #dataTable1 td:nth-child(5) { width: 12%; } 

 /* Reduce table font size */
 #dataTable1 {
        font-size: 14px; /* Adjust size as needed */
    }
      thead  {
            color: black;
        }
    .stats-box {
  color: #ffffff;
  text-align: center;
  padding: 20px;
  width: 160px;
  /* Ensure width and height are equal */
  height: 160px;
  border-radius: 50%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  margin: auto;
  /* Center the box within its container */
}

.stats-box:hover {
  transform: scale(1.00);
  box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
}

.stats-box i {
  margin-bottom: 10px;
  font-size: 24px;
}

.stats-box h5 {
  margin-bottom: 0;
  margin-top: 5px;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.cir {
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}

.bo {
  position: relative;
  width: 200px;
  height: 200px;
  border-radius: 50%;
  overflow: hidden;
}

.bo::before {
  content: "";
  position: absolute;
  inset: -5px 70px;
  background: linear-gradient(315deg, #00ccff, #d400d4);
  transition: 0.5s;
  animation: border-animation 8s linear infinite;
}

.bo:hover::before {
  inset: -20px 0px;
}

@keyframes border-animation {
  0% {
    transform: rotate(0deg);
  }

  100% {
    transform: rotate(360deg);
  }
}

.bo::after {
  content: "";
  position: absolute;
  inset: 3px;
  background-color: white;
  border-radius: 50%;
  z-index: 1;
}

.content1 {
  position: absolute;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  inset: 15px;
  border: 2px solid #070a1c;
  border-radius: 50%;
  overflow: hidden;
  z-index: 3;
}

.content1 img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: 0.75s;
  pointer-events: none;
  z-index: 3;
}

.bo:hover .content1 img {
  opacity: 0;
}

.content1 h2 {
  position: relative;
  color: #fff;
  font-size: 1.5rem;
  text-align: center;
  font-weight: 600;
  letter-spacing: 0.05rem;
  text-transform: uppercase;
}

.content1 h2 span {
  font-size: 0.75rem;
  font-weight: 300;
}

.content1 a {
  position: relative;
  margin-top: 5px;
  padding: 5px 10px;
  background: #fff;
  color: #070a1c;
  border-radius: 25px;
  font-size: 1.25rem;
  font-weight: 500;
  text-transform: uppercase;
  letter-spacing: 0.05rem;
  text-decoration: none;
  transition: 0.5s;
}

.content1 a:hover {
  letter-spacing: 0.2rem;
}
.card-container {
  max-width: 600px; /* Reduce card width */
  justify-content: center;
}

.profile-icon-container {
  position: absolute;
  top: -40px;
  left: 50%;
  transform: translateX(-50%);
  width: 120px;
  height: 120px;
  background-color: white;
  border: 4px solid   rgb(220, 20, 70);;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  animation: border-pulse 2s infinite; /* Animation */
  transition: transform 0.3s ease-in-out; /* Transition effect */
}

.profile-icon-container:hover {
  transform: translateX(-50%) scale(1.1); /* Enlarge on hover */
}

@keyframes border-pulse {
  0% {
    box-shadow: 0 0 0 0   rgb(220, 20, 70);;
  }
  50% {
    box-shadow: 0 0 0 20px rgba(0, 123, 255, 0);
  }
  100% {
    box-shadow: 0 0 0 0 rgba(0, 123, 255, 0);
  }
}
.stats-box {

  color: #ffffff;
  text-align: center;
  padding: 20px;
  width: 160px;
  /* Ensure width and height are equal */
  height: 160px;
  border-radius: 50%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  margin: auto;
  /* Center the box within its container */
}

.stats-box:hover {
  transform: scale(1.1);
  box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);

}

.stats-box i {
  margin-bottom: 10px;
  font-size: 24px;
}

.stats-box h5 {
  margin-bottom: 0;
  margin-top: 5px;
}






* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.cir {

  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;

}

.bo {
  position: relative;
  width: 200px;
  height: 200px;
  border-radius: 50%;
  overflow: hidden;
}

.bo::before {
  content: "";
  position: absolute;
  inset: -5px 70px;
  background: linear-gradient(315deg, #00ccff, #d400d4);
  transition: 0.5s;
  animation: border-animation 8s linear infinite;
}

.bo:hover::before {
  inset: -20px 0px;
}

@keyframes border-animation {
  0% {
      transform: rotate(0deg);
  }

  100% {
      transform: rotate(360deg);
  }
}

.bo::after {
  content: "";
  position: absolute;
  inset: 3px;
  background-color: white;
  border-radius: 50%;
  z-index: 1;
}

.content1 {
  position: absolute;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  inset: 15px;
  border: 2px solid #070a1c;
  border-radius: 50%;
  overflow: hidden;
  z-index: 3;
}

.content1 img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: 0.75s;
  pointer-events: none;
  z-index: 3;
}

.bo:hover .content1 img {
  opacity: 0;
}

.content1 h2 {
  position: relative;
  color: #fff;
  font-size: 1.5rem;
  text-align: center;
  font-weight: 600;
  letter-spacing: 0.05rem;
  text-transform: uppercase;
}

.content1 h2 span {
  font-size: 0.75rem;
  font-weight: 300;
}

.content1 a {
  position: relative;
  margin-top: 5px;
  padding: 5px 10px;
  background: #fff;
  color: #070a1c;
  border-radius: 25px;
  font-size: 1.25rem;
  font-weight: 500;
  text-transform: uppercase;
  letter-spacing: 0.05rem;
  text-decoration: none;
  transition: 0.5s;
}

.content1 a:hover {
  letter-spacing: 0.2rem;
}

/* Counter styling similar to .bpKSTa .header-counter */
.header-counter {
    margin-left: 2px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: rgb(0, 148, 255);
    padding: 2px 5px;
    font-size: 13px;
    min-width: 20px;
    min-height: 20px;
    font-weight: 500;
    color: white;
    border-radius: 100px;
}

/* Styling for the card header */
.card-header {
    display: flex;
    align-items: center;
    justify-content: space-between; /* Adjust spacing */
    padding: 12px 16px;
    background-color: #f8f9fc;
}




.outer-container {
    background-color: white;  /* White background */
    border-radius: 25px;       /* Rounded corners */
    padding: 15px;             /* Inner spacing */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Optional shadow */
    margin: 20px 0;            /* Space above and below */
}

.scrollable-container {
    display: flex;
    overflow-x: auto; /* Enable horizontal scrolling */
    white-space: nowrap;
    padding: 10px;
    border-radius: 5px;
    gap: 10px;
    scroll-behavior: smooth;
}
.scrollable-container::-webkit-scrollbar {
    height: 6px; /* Small height for horizontal scrollbar */
}

.scrollable-container::-webkit-scrollbar-track {
    background: #f1f1f1; /* Light background */
    border-radius: 10px;
}

.scrollable-container::-webkit-scrollbar-thumb {
    background: rgb(70, 176, 251); /* Scrollbar color */
    border-radius: 10px; /* Rounded scrollbar */
}

.scrollable-container::-webkit-scrollbar-thumb:hover {
    background:rgb(70, 176, 251); /* Darker on hover */
}

        .acard {
            flex: 0 0 auto; /* Prevents shrinking */
            min-width: 250px; /* Set width for each card */
            background-color: rgb(70, 176, 251);
            color: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .acard h3, .acard p {
            margin: 5px 0;
        }
</style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

   
<?php include("sidebar.php"); ?>
<style>
   

    .custom-card {
        background: linear-gradient(45deg, rgba(255, 99, 71, 0.8), rgba(255, 165, 0, 0.8));
        transition: background 0.5s ease-in-out, transform 0.2s;
        color: white;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        border: none;
    }

    .custom-card:hover {
        transform: translateY(-5px);
    }

    .total-card {
        background: linear-gradient(45deg, #00c6ff, #0072ff);
    }

    .pending-card {
        background: linear-gradient(45deg, #ff758c, #ff7eb3);
    }

    .ongoing-card {
        background: linear-gradient(45deg, #f7971e, #ffd200);
    }

    .completed-card {
        background: linear-gradient(45deg, #56ab2f, #a8e063);
    }

    .sidebar-brand-icon, .sidebar-brand-text {
        font-size: large;
        background: white;
        -webkit-background-clip: text; /* Clip background to text */
        -webkit-text-fill-color: transparent; /* Make text color transparent to show gradient */
        font-weight: bold; /* Optional: Makes text more prominent */
    }
    /* Sidebar background */
    .sidebar {
        background-color: rgb(15,29,64) !important;
        width: 250px; /* Adjust according to sidebar width */
    }

    /* Sidebar link styles */
    .l a.k{
        color: white !important; /* Dark text */
        border-radius: 8px; /* Rounded corners */
        transition: all 0.3s ease-in-out;
        padding: 12px 15px;
        font-size: 16px; /* Increased font size */
        display: flex;
        align-items: center;
        gap: 10px; /* Space between icon and text */
        width: 85%; /* Ensure links don’t take full width */
        margin: 0 auto; /* Center align */
    }

    /* Ensure icons are black */
    .l a.k i {
        color: white !important;
        font-size: 18px; /* Slightly larger icons */
        transition: color 0.3s ease-in-out;
    }


    /* Hover effect (only for non-active items) */
    .l:not(.active)  a.k:hover {
        background-color: rgb(45, 64, 113) !important; /* Light grey */
        color: white !important; /* Dark text */
        border-radius: 8px;
        width: 90%; /* Keep it smaller than the sidebar */
        margin: 0 auto; /* Center align */
    }

    /* Keep icons black on hover for non-active items */
    .l:not(.active) a.k:hover i {
        color: white !important;
    }

    /* Active item style */
    .l.active {
        background-color: rgb(45, 64, 113) !important; /* Light grey */
        color: white !important; /* Dark text */
        border-radius: 8px;
        width: 90%; /* Keep it smaller than the sidebar */
        margin: 0 auto; /* Center align */
        padding:1px;
    }
    .collapse-item.active{
        width: 90%;
        background:white;
        color:white;
        border-radius: 8px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        transform: scale(1.02); /* Slight lift effect */
        margin: 0 auto; /* Center align */
    }
    /* Active item text & icon color */
    .l.active a.k{
        color: white !important;
    }

    /* Ensure icons turn white inside active links */
    .l.active a.k i {
        color:white !important;
    }
    footer {
    background: white;
    color: rgb(15,29,64);
    padding: 15px;
    box-shadow: 0px -4px 6px rgba(0, 0, 0, 0.1); /* Negative Y value for top shadow */
}

    .master.active{
        width: 90%;
        background: white;
        color:white;
        border-radius: 8px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        transform: scale(1.02); /* Slight lift effect */
        margin: 0 auto; /* Center align */
    }
    .master.active.collapse{
        background:white;
        border-radius: 8px;

    }
    .collapse{
        background:#F8F8F8;
        border-radius: 10px;
        color:white;
    }
    .collapse-item.active{
        width: 90%;
        background: rgb(45, 64, 113);
        color:white;
        border-radius: 8px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        transform: scale(1.02); /* Slight lift effect */
        margin: 0 auto; /* Center align */
    }
    .action-buttons button {
      margin: 0 5px;
    }
    /* Optional: Change cursor for clickable rows */
    #dataTable1 tbody tr {
      cursor: pointer;
    }
    .sidebar-dark .nav-item .nav-link[data-toggle="collapse"]:hover::after {
    color: white;
}
 /* Styling for the modal */
 .bo::before {
    background: rgb(45, 64, 113);
 }
 .square-box {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between; /* Distributes space evenly */
    gap: 10px;
    padding: 15px;
    background-color: #f8f9fc;
    border-radius: 25px;
    border: 1px solid #f8f9fc;
}

.square-box .stats-box {
    width: calc(25% - 20px); /* 4 boxes in one row on large screens */
    padding: 10px;
    height: 100px;
    text-align: center;
    background-color: rgb(45, 64, 113);
    color: white;
    border-radius: 15px;
}

/* Responsive for screens below 460px (2 boxes per row) */
@media (max-width: 460px) {
    .square-box .stats-box {
        width: calc(50% - 10px); /* 2 boxes per row */
    }
}
#dataTable1 tbody td i {
    color: rgb(0, 148, 255);
}
.page-item.active .page-link {
    background: rgb(0, 148, 255);
}


        input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: rgb(0, 148, 255);
        }

    .submit-btn {
        background-color: rgb(0, 148, 255);
        color: white;
        font-size: 14px;
        font-weight: bold;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
    }
    .submit-btn:hover {
        background-color: rgb(0, 120, 220); /* Slightly darker blue */
    }
    .button-container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        padding: 10px 0;
    }



    </style>
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" style=" background:white;">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                <div class="mr-auto d-flex align-items-center pl-3 py-2">

    <h4 class="text-dark font-weight-bold mr-4" style="color: rgb(15,29,64); font-size: medium; margin-top: 5px;">
        User Rights
    </h4></div>
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle"
                                    src="img/p.png" style="width: 2rem;height: 2rem;">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                
                                
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                <!-- <div class="outer-container">
    <div class="scrollable-container" id="rightsContainer">
    </div>
</div> -->

        <br>
                <div class="card shadow mb-4">
                <form id="rightsForm">
    <div class="card-header py-2">
        <p class="m-0" style="font-size: 16px; color:rgb(23, 25, 28); font-weight: 500;">
            <b>User Rights</b>   <!-- Counter will be updated dynamically -->
            <span class="header-counter">10</span> 
        </p>
        <div class="d-flex justify-content-between mt-1">
        <div></div> <!-- Empty div to push the select to the right -->
        <div class="text-end">
            <select id="employeeSelect" class="form-control d-inline" style="width: 180px;" name="employee">
                <option value="">Select Employee</option>
                <?php
                $sql = "SELECT Name FROM employeedetails";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . htmlspecialchars($row['Name']) . "'>" . htmlspecialchars($row['Name']) . "</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        
  

    <table class="table text-center" id="dataTable1">
        <thead>
            <tr>
                <th>All</th>
                <th>Module</th>
                <th>Add</th>
                <th>Update</th>
                <th>Delete</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $modules = [
                "Dashboard" => ["View"], 
                "FollowUps" => ["Add", "Update", "Delete"], 
                "Customer" => ["Add", "Update", "Delete"], 
                "Employee" => ["Add", "Update", "Delete"], 
                "Designation" => ["Add", "Update", "Delete"], 
                "Project Type" => ["Add", "Update", "Delete"], 
                "FollowUp Type" => ["Add", "Update", "Delete"], 
                "Project Creation" => ["Add", "Update", "Delete"], 
                "Daily Update" => ["View"], 
                "Work Reports" => ["View"]
            ];

            foreach ($modules as $module => $permissions) {
                echo "<tr>
                    <td><input type='checkbox' class='check-all'></td>
                    <td>$module</td>";

                $actions = ["Add", "Update", "Delete", "View"];
                foreach ($actions as $action) {
                    if (in_array($action, $permissions)) {
                        echo "<td><input type='checkbox' class='check-perm' name='rights[$module][]' value='$action'></td>";
                    } else {
                        echo "<td>-</td>";
                    }
                }

                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <div class="text-center mt-3">
        <button type="submit" class="btn submit-btn" style="color: white;">Submit</button>
    </div>
</form>

<script>
$(document).ready(function () {
    // Function to fetch existing rights when an employee is selected
    $("#employeeSelect").on("change", function () {
        let employeeName = $(this).val();

        if (employeeName !== "") {
            $.ajax({
                type: "POST",
                url: "fetch_rights.php", // Fetch rights from DB
                data: { employee: employeeName },
                dataType: "json",
                success: function (response) {
                    $("input[type='checkbox']").prop("checked", false); // Reset all checkboxes

                    if (response.success) {
                        $.each(response.data, function (module, rights) {
                            $.each(rights, function (index, right) {
                                $("input[name='rights[" + module + "][]'][value='" + right + "']").prop("checked", true);
                            });
                        });
                    }
                },
                error: function () {
                    Swal.fire({
                        icon: "error",
                        title: "Error!",
                        text: "Failed to fetch rights. Please try again.",
                    });
                }
            });
        }
    });

    // Handle form submission with AJAX
    $("#rightsForm").on("submit", function (e) {
        e.preventDefault();

        let employeeName = $("#employeeSelect").val();
        let selectedRights = $("input[name^='rights']:checked").length;

        if (employeeName === "") {
            Swal.fire({ icon: "warning", title: "Oops...", text: "Please select an employee!" });
            return;
        }

        $.ajax({
            type: "POST",
            url: "update_rights.php", // Update rights file
            data: $(this).serialize(),
            dataType: "json", // Expect JSON response
            success: function (response) {
                if (response.status === "success") {
                    Swal.fire({
                        icon: "success",
                        title: "Success!",
                        text: response.message
                    });
                } else if (response.status === "error") {
                    Swal.fire({
                        icon: "error",
                        title: "Error!",
                        text: response.message
                    });
                }
            },
            error: function () {
                Swal.fire({
                    icon: "error",
                    title: "Error!",
                    text: "Something went wrong. Try again!"
                });
            }
        });
    });
});

</script>
        </div>
    </div>
</div>
            </div>

        </div>
        <!-- End of Content Wrapper -->
<!-- Footer -->
<footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                       <h6> <b>Copyright &copy; Knock the Globe Technologies 2025</b></h6>
                    </div>
                </div>
            </footer>
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            // Function to fetch rights
            function fetchRights() {
                $.ajax({
                    url: "fetch_rights_display.php", // Backend PHP file to fetch data
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        let container = $("#rightsContainer");
                        container.html(""); // Clear previous data

                        if (data.length > 0) {
                            data.forEach(item => {
                                let card = `
                                    <div class="acard">
                                        <p style="font-size:17px;">${item.name}</p>
                                        <p style="font-size:15px;"><strong>Module:</strong> ${item.module}</p>
                                        <p style="font-size:15px;"><strong>Rights:</strong> ${item.rights}</p>
                                    </div>
                                `;
                                container.append(card);
                            });
                        } else {
                            container.html("<p>No rights found.</p>");
                        }
                    },
                });
            }

            fetchRights(); // Fetch rights on page load
        });
    </script>
    <script>
    document.querySelectorAll(".check-all").forEach((checkbox) => {
        checkbox.addEventListener("change", function() {
            let row = this.closest("tr");
            let permissions = row.querySelectorAll(".check-perm");
            
            permissions.forEach((perm) => {
                perm.checked = this.checked;
            });
        });
    });
</script>
<!-- jQuery (Required for DataTables) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- DataTables JavaScript -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Initialize DataTable -->
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    

</body>

</html>
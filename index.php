<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
include 'dbconn.php'; // Ensure this file has a valid DB connection ?>
<!DOCTYPE html>
<html lang="en">

<head>

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
        #dataTable th:nth-child(1), #dataTable td:nth-child(1) { width: 2%; }  /* S.no */
#dataTable th:nth-child(2), #dataTable td:nth-child(2) { width: 8%; } /* Name */
#dataTable th:nth-child(3), #dataTable td:nth-child(3) { width: 13%; } /* Date */
#dataTable th:nth-child(4), #dataTable td:nth-child(4) { width: 14%; } /* Company */
#dataTable th:nth-child(5), #dataTable td:nth-child(5) { width: 12%; } /* Project Title */
#dataTable th:nth-child(6), #dataTable td:nth-child(6) { width: 12%; } /* Total Days */
#dataTable th:nth-child(7), #dataTable td:nth-child(7) { width: 15%; } /* Description */
#dataTable th:nth-child(8), #dataTable td:nth-child(8) { width: 12%; } /* Total Time */
#dataTable th:nth-child(9), #dataTable td:nth-child(9) { width: 13%; }
#dataTable th:nth-child(10), #dataTable td:nth-child(10) { width: 10%; }

 /* Reduce table font size */
 #dataTable {
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

</style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

   

    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: white;">
<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon" style='font-size:19px'>KTG</div>
    <div class="sidebar-brand-text mx-2" style='font-size:19px'>DASHBOARD</div>
</a>
<hr class="sidebar-divider my-0">

<!-- Divider -->
<div class="sidebar-divider" style="margin-bottom: 3px;"></div>
<!-- Nav Item - Dashboard -->
<li class="nav-item l active">
    <a class="nav-link k" href="index.php" style="color: white;">
        <i class="fas fa-fw fa-tachometer-alt" style="font-size:16px"></i>
        <span>Dashboard</span>
    </a>
</li>
<div class="sidebar-divider" style="margin-bottom: 3px;"></div>
<li class="nav-item l" style="padding:0px;">
    <a class="nav-link k" href="followups.php" style="color: white;">
        <i class="fas fa-fw fa-comment-dots" style="font-size:16px"></i>
        <span>FollowUps</span>
    </a>
</li>
<!-- Divider -->
<div class="sidebar-divider" style="margin-bottom: 3px;"></div>
<!-- Nav Item - Master -->
<li class="nav-item l master">
    <a class="nav-link k collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo" style="color: white;">
        <i class="fas fa-fw fa-clipboard-list" style="font-size:16px"></i>
        <span>Master</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="z-index: 1000;">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item " href="customer.php" style="color: black;">Customer</a>
            <a class="collapse-item " href="employee.php" style="color: black;">Employee</a>
            <a class="collapse-item" href="designation.php" style="color: black;">Designation</a>
            <a class="collapse-item" href="projecttype.php" style="color: black;">Project Type</a>
            <a class="collapse-item" href="followuptype.php" style="color: black;">FollowUp Type</a>
        </div>
    </div>
</li> 
<!-- Divider -->
<div class="sidebar-divider" style="margin-bottom: 3px;"></div>
<!-- Nav Item - Project Creation -->
<li class="nav-item l">
    <a class="nav-link k" href="projectcreation.php" style="color: black;">
        <i class="fas fa-fw fa-folder" style="font-size:16px"></i>
        <span>Project Creation</span>
    </a>
</li>
<div class="sidebar-divider" style="margin-bottom: 3px;"></div>
<!-- Nav Item - Daily Updates -->
<li class="nav-item l">
    <a class="nav-link k" href="dailyupdates.php" style="color: black;">
        <i class="fas fa-fw fa-table" style="font-size:16px"></i>
        <span>Daily Update</span>
    </a>
</li>
<div class="sidebar-divider" style="margin-bottom: 3px;"></div>
<!-- Nav Item - Work Reports -->
<li class="nav-item l">
    <a class="nav-link k" href="reports.php" style="color: black;">
        <i class="fas fa-fw fa-chart-area" style="font-size:16px"></i>
        <span>Work Reports</span>
    </a>
</li><br>
<!-- Divider -->
<div class="sidebar-divider d-none d-md-block"></div>
<!-- Sidebar Toggler -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle side border-0" id="sidebarToggle"></button>
</div>
</ul>


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
    #dataTable tbody tr {
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


/* Style for the table header (thead) */
/* #dataTable thead {
    color: rgb(140, 147, 159);
    font-weight: 1; 
    font-style: normal;
    text-overflow: ellipsis;
    white-space: nowrap;
} */

/* Style for table data (td) */
/* #dataTable tbody td {
    font-style: normal;
    overflow: hidden;
    line-height: 1rem;
    text-overflow: ellipsis;
    color: rgb(23, 25, 28);
    font-size: 14px;
    font-weight: 400;
    padding: 10px; 
} */

/* Style for icons in the status column */
#dataTable tbody td i {
    color: rgb(0, 148, 255);
}
.page-item.active .page-link {
    background: rgb(0, 148, 255);
}
</style>
<style>
    #dataTable th:nth-child(3), 
    #dataTable td:nth-child(3) {
    display: none;
}
</style>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
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
        Dashboard
    </h4></div>
                    <!-- Sidebar Toggle (Topbar) -->
                   

                   

                    <!-- Topbar Navbar -->
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

                <?php
include 'dbconn.php'; // Include your DB connection file

// Count total projects
$totalProjectsQuery = "SELECT COUNT(*) AS total FROM projectcreation";
$totalProjectsResult = $conn->query($totalProjectsQuery);
$totalProjects = $totalProjectsResult->fetch_assoc()['total'];

// Count ongoing projects (check if any company-projectTitle exists in dailyupdates)
$ongoingProjectsQuery = "SELECT COUNT(DISTINCT CONCAT(companyName, '-', projectTitle)) AS ongoing FROM dailyupdates WHERE CONCAT(companyName, '-', projectTitle) IN (SELECT CONCAT(companyName, '-', projectTitle) FROM projectcreation)";
$ongoingProjectsResult = $conn->query($ongoingProjectsQuery);
$ongoingProjects = $ongoingProjectsResult->fetch_assoc()['ongoing'];

// Calculate pending projects
$pendingProjects = $totalProjects - $ongoingProjects;

// Count total employees
$totalEmployeesQuery = "SELECT COUNT(*) AS total FROM employeedetails";
$totalEmployeesResult = $conn->query($totalEmployeesQuery);
$totalEmployees = $totalEmployeesResult->fetch_assoc()['total'];
?>

<div class="square-box"> 
    <div class="stats-box">
        <i class="fas fa-file" style="font-size: 20px;"></i>
        <h1 style="font-size: 20px;"><?php echo $totalProjects; ?></h1>
        <small>Total Projects</small>
    </div>
    <div class="stats-box">
        <i class="fas fa-exclamation" style="font-size: 20px;"></i>
        <h1 style="font-size: 20px;"><?php echo $pendingProjects; ?></h1>
        <small>Pending Projects</small>
    </div>
    <div class="stats-box">
        <i class="fas fa-check" style="font-size: 20px;"></i>
        <h1 style="font-size: 20px;"><?php echo $ongoingProjects; ?></h1>
        <small>Ongoing Projects</small>
    </div>
    <div class="stats-box">
        <i class="fas fa-bell" style="font-size: 20px;"></i>
        <h1 style="font-size: 20px;"><?php echo $totalEmployees; ?></h1>
        <small>Employee Count</small>
    </div>
</div>


<br>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <p class="m-0" style="font-size: 16px; color:rgb(23, 25, 28); font-weight: 500;">
            <b>Daily Updates</b> 
            <span class="header-counter">0</span>  <!-- Counter will be updated dynamically -->
        </p>
        <div> 
            <input type="date" id="dateFilter" class="form-control d-inline" style="width: auto;">
        </div>
    </div>
    <div class="card-body">
    <div class="d-flex justify-content-end mb-2">
    <input type="text" id="tableSearch" class="form-control" placeholder="Search..." style="width: 250px;">
</div>

        <div class="table-responsive">
            <table class="table text-center" id="dataTable" width="100%">
                <thead>
                    <tr>
                        <th>S.no</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Company-Title</th>
                        <th>Type</th>
                        <th>Total Days</th>
                        <th>Description</th>
                        <th>Total Hrs</th>
                        <th>Actual Hrs</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                <?php
$c = 1;
$sql = "SELECT * FROM dailyupdates ORDER BY date DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $actualHrs = trim($row['actualHrs']);
        $status = ($actualHrs === '-' || empty($actualHrs)) 
            ? '<td><i class="fas fa-hourglass-half status-icon in-progress" style="font-size:12px;color:rgb(0, 148, 255);"></i>&nbsp;&nbsp;Inprogress</td>' 
            : '<td><i class="fas fa-check-circle status-icon completed" style="font-size:12px;color:rgb(0, 148, 255);"></i>&nbsp;&nbsp;Completed</td>';

        // Convert date format to match input field
        $formattedDate = date("d-m-Y", strtotime($row['date']));

        echo "<tr data-date='$formattedDate'>
            <td class='sno'>{$c}</td> 
            <td class='name'>{$row['name']}</td>
            <td class='date'>$formattedDate</td>
            <td>{$row['companyName']} - {$row['projectTitle']}</td>
            <td>{$row['projectType']}</td>
            <td>{$row['totalDays']}</td>
            <td>{$row['taskDetails']}</td>
            <td>{$row['totalHrs']}</td>
            <td>{$row['actualHrs']}</td>
            $status
        </tr>";

        $c++;
    }
} else {
    echo "<tr><td colspan='10'>No records found</td></tr>";
}
?>
                </tbody>
            </table>
        </div>
    </div>
</div>
            </div>
            <!-- End of Main Content -->

            
            <!-- End of Footer -->

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
document.getElementById("tableSearch").addEventListener("keyup", function() {
    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll("#table-body tr");

    rows.forEach(row => {
        let text = row.textContent.toLowerCase();
        row.style.display = text.includes(filter) ? "" : "none";
    });
});
</script>
    <script>
document.addEventListener("DOMContentLoaded", function () {
    const dateFilter = document.getElementById("dateFilter");
    const tableBody = document.getElementById("table-body");
    const headerCounter = document.querySelector(".header-counter");
    function filterTableByDate(selectedDate) {
        let rows = tableBody.querySelectorAll("tr:not(#no-records)");
        let count = 0;
        let noRecordRow = document.getElementById("no-records");
        if (noRecordRow) {
            noRecordRow.remove();
        }
        rows.forEach((row) => {
            let rowDate = row.querySelector(".date").textContent.trim();
            let formattedRowDate = formatDate(rowDate); // Convert to YYYY-MM-DD

            if (formattedRowDate === selectedDate) {
                row.style.display = "";
                count++;
                row.querySelector(".sno").textContent = count; // Update serial number
            } else {
                row.style.display = "none";
            }
        });
        headerCounter.textContent = count;
        if (count === 0) {
            let noRecordHTML = `<tr id="no-records"><td colspan="10" style="text-align:center;">No records found</td></tr>`;
            tableBody.insertAdjacentHTML("beforeend", noRecordHTML);
        }
    }
    function getTodayDate() {
        let today = new Date();
        let day = String(today.getDate()).padStart(2, "0");
        let month = String(today.getMonth() + 1).padStart(2, "0");
        let year = today.getFullYear();
        return `${year}-${month}-${day}`;
    }
    function formatDate(dateString) {
        let parts = dateString.split("-");
        return `${parts[2]}-${parts[1]}-${parts[0]}`; // Convert DD-MM-YYYY to YYYY-MM-DD
    }
    let todayDate = getTodayDate();
    dateFilter.value = todayDate;
    filterTableByDate(todayDate);

    // Update table when a new date is selected
    dateFilter.addEventListener("change", function () {
        filterTableByDate(this.value);
    });
});
        document.addEventListener('DOMContentLoaded', function () {
    var table = $('#dataTable').DataTable();
    document.querySelector('#dataTable tbody').addEventListener('click', function (event) {
        const clickedCell = event.target.closest('td'); // Get clicked <td>
        if (!clickedCell) return;
        const nameColumn = clickedCell.closest('.name-column');
        const companyColumn = clickedCell.closest('.company-column');
        const titleColumn = clickedCell.cellIndex === 4; // Title column index (zero-based)
        const searchBox = document.querySelector('input[type="search"]'); // Search box in DataTable
        if (nameColumn) {
            const name = nameColumn.textContent.trim();
            window.location.href = `reports.php?name=${encodeURIComponent(name)}`;
        } else if (companyColumn) {
            const company = companyColumn.textContent.trim();
            window.location.href = `reports.php?company=${encodeURIComponent(company)}`;
        } else if (titleColumn) {
            const title = clickedCell.textContent.trim();
            searchBox.value = title; // Set search box value
            table.search(title).draw(); // Filter table with title
            window.location.href = `reports.php?title=${encodeURIComponent(title)}`;
        } else {
            window.location.href = "requirement.php";        }
    });
});
    </script>
    <script>
$(document).ready(function () {
    let table = $('#dataTable').DataTable({
        "pageLength": 10, // Show 10 entries per page
        "ordering": false, // Disable sorting for better filtering
        "destroy": true // Allows re-initialization without issues
    });
    function filterByDate() {
        let selectedDate = $('#dateFilter').val();
        if (!selectedDate) return;

        let formattedSelectedDate = selectedDate.split("-").reverse().join("-"); 
        table.column(2).search(formattedSelectedDate).draw();
        let visibleRows = table.rows({ filter: 'applied' }).count();
        $('.header-counter').text(visibleRows);
        if (visibleRows === 0) {
            if (!$("#no-records").length) {
                $("#dataTable tbody").append(`<tr id="no-records"><td colspan="10" class="text-center">No records found</td></tr>`);
            }
        } else {
            $("#no-records").remove();
        }
    }
    let today = new Date().toISOString().split('T')[0];
    $('#dateFilter').val(today);
    filterByDate();
    $('#dateFilter').on('change', function () {
        filterByDate();
    });
});
$(document).ready(function () {

    $("#dateFilter").on("change", function () {
        let selectedDate = $(this).val();
        if (!selectedDate) return;

        let formattedSelectedDate = selectedDate.split("-").reverse().join("-");
        dataTable.destroy();

        // Show/hide rows based on selected date
        $("#dataTable tbody tr").each(function () {
            let rowDate = $(this).find("td:eq(2)").text().trim();
            $(this).toggle(rowDate === formattedSelectedDate);
        });

        // Reinitialize DataTable after filtering
        dataTable = $("#dataTable").DataTable({
            pageLength: 10 // Ensures proper pagination
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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    

</body>

</html>
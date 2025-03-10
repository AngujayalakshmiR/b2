<?php
session_start();
if (!isset($_SESSION['empUserName'])) {
    header("Location: login.php");
    exit();
}

include 'dbconn.php'; // Ensure database connection

$empUserName = $_SESSION['empUserName'];
$Name = $_SESSION['Name'];

// Fetch project details (Table 1)
$sql1 = "SELECT ID, date, companyName, projectType, totalDays, projectTitle, employees 
         FROM projectcreation 
         WHERE employees LIKE ? ORDER BY date DESC"; 

$stmt1 = $conn->prepare($sql1);
$searchTerm = "%" . $Name . "%";
$stmt1->bind_param("s", $searchTerm);
$stmt1->execute();
$result1 = $stmt1->get_result();
$totalEntries1 = $result1->num_rows;

?>

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
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
<style>
    thead{
        color:black;
    }
    #dataTable1 th:nth-child(1), #dataTable td:nth-child(1) { width: 3%; }  /* S.no */
    #dataTable1 th:nth-child(2), #dataTable td:nth-child(2) { width: 10%; } /* Date */
    #dataTable1 th:nth-child(3), #dataTable td:nth-child(3) { width: 10%; } /* Company */
    #dataTable1 th:nth-child(4), #dataTable td:nth-child(4) { width: 18%; } /* Project Title */
    #dataTable1 th:nth-child(5), #dataTable td:nth-child(5) { width: 10%; }  /* Project Type */
    #dataTable1 th:nth-child(6), #dataTable td:nth-child(6) { width: 10%; } /* Description */
    #dataTable1 th:nth-child(7), #dataTable td:nth-child(7) { width: 11%; } /* Total days */
    #dataTable1 th:nth-child(7), #dataTable td:nth-child(7) { width: 11%; } /* Working days */
    #dataTable1 th:nth-child(8), #dataTable td:nth-child(8) { width: 15%; } /* Teammates */


    #dataTable2 th:nth-child(1), #dataTable td:nth-child(1) { width: 2%; }  /* S.no */
#dataTable2 th:nth-child(2), #dataTable td:nth-child(2) { width: 12%; } /* Name */
#dataTable2 th:nth-child(3), #dataTable td:nth-child(3) { width: 12%; } /* Date */
#dataTable2 th:nth-child(4), #dataTable td:nth-child(4) { width: 15%; } /* Company */
#dataTable2 th:nth-child(5), #dataTable td:nth-child(5) { width: 10%; } /* Project Title */
#dataTable2 th:nth-child(6), #dataTable td:nth-child(6) { width: 16%; } /* Total Days */
#dataTable2 th:nth-child(7), #dataTable td:nth-child(7) { width: 12%; } /* Description */
#dataTable2 th:nth-child(8), #dataTable td:nth-child(8) { width: 12%; } /* Total Time */
#dataTable2 th:nth-child(9), #dataTable td:nth-child(9) { width: 14%; } /* Actual Time */
#dataTable1 {
        font-size: 14px; /* Adjust size as needed */
    }
    #dataTable2 {
        font-size: 14px; /* Adjust size as needed */
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


.container-fluid{
    padding-left: .8rem;
    padding-right: .8rem;
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
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="employeedash.php">
    <div class="sidebar-brand-icon" style='font-size:19px'>KTG</div>
    <div class="sidebar-brand-text mx-2" style='font-size:19px'>DASHBOARD</div>
</a>
<hr class="sidebar-divider my-0">

<!-- Divider -->
<div class="sidebar-divider" style="margin-bottom: 3px;"></div>
<!-- Nav Item - Dashboard -->
<li class="nav-item l active">
    <a class="nav-link k" href="employeedash.php" style="color: white;">
        <i class="fas fa-fw fa-tachometer-alt" style="font-size:16px"></i>
        <span>Dashboard</span>
    </a>
</li>
<div class="sidebar-divider" style="margin-bottom: 3px;"></div>


<!-- Divider -->
<!-- Nav Item - Project Creation -->
<li class="nav-item l">
    <a class="nav-link k" href="employeeProjectAllocated.php" style="color: black;">
        <i class="fas fa-fw fa-folder" style="font-size:16px"></i>
        <span>Project Allocation</span>
    </a>
</li>

<div class="sidebar-divider" style="margin-bottom: 3px;"></div>
<!-- Nav Item - Work Reports -->
<li class="nav-item l">
    <a class="nav-link k" href="employeeWorkReports.php" style="color: black;">
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
tbody{
    border-color: #f8f9fa;
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
    padding: 10px; } */

/* Style for icons in the status column */
#dataTable tbody td i {
    color: rgb(0, 148, 255);
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
.card {
    margin-bottom: 20px; /* Adjust as needed */
}
#dataTable {
    margin-top: 20px; /* Adds space above the table */
}
.page-item.active .page-link {
    background: rgb(0, 148, 255);
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

                        <h4 class="text-dark font-weight-bold mr-1 d-flex align-items-center pl-3 py-2 " style="color: rgb(15,29,64); font-size: medium; margin-top: 5px;">
                        <?php echo htmlspecialchars($_SESSION['Name']); ?>
    </h4>
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
                                
                                
                                <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal" >
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

<!-- Square box (visible below 460px) -->
<div class="square-box">
    <div class="stats-box">
        <i class="fas fa-file" style="font-size: 20px;"></i>
        <h1 style="font-size: 20px;">20</h1>
        <small>Total Projects</small>
    </div>
    <div class="stats-box">
        <i class="fas fa-exclamation" style="font-size: 20px;"></i>
        <h1 style="font-size: 20px;">10</h1>
        <small>Pending Projects</small>
    </div>
    <div class="stats-box">
        <i class="fas fa-check" style="font-size: 20px;"></i>
        <h1 style="font-size: 20px;">10</h1>
        <small>Ongoing Projects</small>
    </div>
    <div class="stats-box">
        <i class="fas fa-bell" style="font-size: 20px;"></i>
        <h1 style="font-size: 20px;">2</h1>
        <small>Today Updates</small>
    </div>
</div>
<br>
<div class="container-fluid">
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <p class="m-0 font-weight-bold text-dark">Project Details <span class="header-counter"><?php echo $totalEntries1; ?></span></p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-center" id="dataTable1" width="100%">
                                    <thead>
                                        <tr>
                                            <th>S.no</th>
                                            <th>Date</th>
                                            <th>Company</th>
                                            <th>Title</th>
                                            <th>Project Type</th>
                                            <th>Total Days</th>
                                            <th>Working Days</th>
                                            <th>Teammates</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $sno = 1;
                                        if ($totalEntries1 > 0) {
                                            while ($row = $result1->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $sno++ . "</td>";
                                                echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['companyName']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['projectTitle']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['projectType']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['totalDays']) . "</td>";
                                                echo "<td>-</td>"; 
                                                echo "<td>" . htmlspecialchars($row['employees']) . "</td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='7'>No project details found</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

<br>
<div class="card shadow mb-4">
<div class="card-header py-3 d-flex align-items-center justify-content-start flex-wrap">
    <p class="m-0" style="font-size: 16px; color: rgb(23, 25, 28); font-weight: 500; white-space: nowrap;">
        <b>Daily Updates</b> <span class="header-counter">2</span>
    </p> &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="date" id="dateFilter" class="form-control ms-3 mt-0 mt-sm-0 mt-2" style="width: auto;">
</div>
                        <div class="card-body">
                            <div class="table-responsive ">
                            <table class="table text-center" style="font-size:14px;" id="dataTable2" width="100%">
    <thead>
        <tr>
            <th>S.no</th>
            <th>Date</th>
            <th>Company</th>
            <th>Title</th>
            <th>Days</th>
            <th>Description</th>
            <th>Total Hrs</th>
            <th>Actual Hrs</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <tr  data-company="ABC Corp">
            <td>1</td>
            <td>05-03-2025</td>
            <td class="company-column">ABc</td>
            <td>xyz</td>
            <td>5</td>
            <td>I completed half backend work</td>
            <td>4.5</td>
            <td>2</td>
            <td><i class="fas fa-check-circle status-icon completed"></i>&nbsp;&nbsp;Completed</td>
        </tr>
        <tr  data-company="ABC Corp">
            <td>2</td>
            <td>05-03-2025</td>
            <td class="company-column">ABC</td>
            <td>kmn</td>
            <td>5</td>
            <td>I completed half backend work</td>
            <td>4.5</td>
            <td>2</td>
            <td><i class="fas fa-check-circle status-icon completed"></i>&nbsp;&nbsp;Completed</td>
        </tr>
        <!-- Add more rows as needed -->
    </tbody>
</table>
                            </div>
                        </div>
                        
                    </div>
                    <?php
if (isset($stmt1)) {
    $stmt1->close();
}
if (isset($stmt2)) {
    $stmt2->close();
}
$conn->close();
?>

                </div>
            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                       <h6> <b>Copyright &copy; Knock the Globe Technologies 2025</b></h6>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

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
<!-- jQuery (Required for DataTables) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- DataTables JavaScript -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll("#dataTable1 tbody tr").forEach(row => {
            row.addEventListener("click", function () {
                // Assuming the first column contains a unique ID
                let employeeId = this.cells[0].innerText.trim(); 
                if (employeeId) {
                    window.location.href = `employeedailyupdate.php?id=${employeeId}`;
                }
            });
        });
    });
</script>
<!-- Initialize DataTable -->


    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>



    <script>
    $(document).ready(function() {
            $('#dataTable1').DataTable({
                "paging": true,
                "ordering": true,
                "info": true,
                "lengthMenu": [5, 10, 25, 50]
            });

            $('#dataTable2').DataTable({
                "paging": true,
                "ordering": true,
                "info": true,
                "lengthMenu": [5, 10, 25, 50]
            });
        });
</script>
            <!-- End of Main Content -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
    // Initialize DataTable
    var table = $('#dataTable').DataTable();

    // Handle row click event
    document.querySelector('#dataTable tbody').addEventListener('click', function (event) {
        const clickedCell = event.target.closest('td'); // Get clicked <td>
        if (!clickedCell) return;

        const row = clickedCell.closest('tr'); // Get parent row
        const columnIndex = clickedCell.cellIndex; // Get column index

        // Define column indices based on your table structure
        const companyColumnIndex = 2; // Company column
        const titleColumnIndex = 3; // Title column

        // Search box inside DataTable
        const searchBox = document.querySelector('input[type="search"]');

        if (columnIndex === companyColumnIndex || columnIndex === titleColumnIndex) {
            const clickedText = clickedCell.textContent.trim();
            window.location.href = `employeeWorkReports.php?search=${encodeURIComponent(clickedText)}`;
        } else {
            window.location.href = "requirement.php";
        }
    });

    // Check if there's a search query in the URL and apply it to DataTable
    const urlParams = new URLSearchParams(window.location.search);
    const searchValue = urlParams.get("search");

    if (searchValue) {
        $('#dataTable_filter input').val(searchValue); // Set search box value
        table.search(searchValue).draw(); // Apply search filter
    }
});

</script>
    <script>
 document.addEventListener("DOMContentLoaded", function () {
    let today = new Date().toISOString().split('T')[0]; // Get today's date in YYYY-MM-DD format
    let dateInput = document.getElementById("dateFilter");

    dateInput.value = today; // Set default to today
    filterByDate(); // Automatically filter on page load

    // Apply filter immediately when date is changed
    dateInput.addEventListener("change", filterByDate);
});

function filterByDate() {
    let selectedDate = document.getElementById("dateFilter").value;
    if (!selectedDate) return;

    let formattedSelectedDate = selectedDate.split("-").reverse().join("-"); // Convert to DD-MM-YYYY
    let table = document.getElementById("dataTable");
    let rows = table.getElementsByTagName("tbody")[0].getElementsByTagName("tr");

    for (let i = 0; i < rows.length; i++) {
        let dateCell = rows[i].getElementsByTagName("td")[1];
        if (dateCell) {
            let rowDate = dateCell.textContent.trim();
            rows[i].style.display = (rowDate === formattedSelectedDate) ? "" : "none";
        }
    }
}
</script>
<script>
setTimeout(function () {
    document.querySelectorAll("tbody tr").forEach(row => {
        console.log(`Row has ${row.cells.length} cells`);
        
        if (row.cells.length < 13) {
            console.warn("Skipping row: Some cells are missing.");
            return;
        }
        
        let taskTypeCell = row.cells[7];
        let moduleStatusCell = row.cells[11];
        let projectStatusCell = row.cells[12];
        
        let taskType = taskTypeCell.innerText.trim();
        let moduleStatus = moduleStatusCell.innerText.trim();
        
        console.log(`Task Type: ${taskType}, Module Status: ${moduleStatus}`);
        
        if (moduleStatus.includes("Completed")&&taskType.includes("Testing") ) {
            projectStatusCell.innerHTML = `
                <button class="btn btn-success btn-sm" onclick="markCompleted(this)">Mark as Completed</button>
            `;
        } else {
            projectStatusCell.innerHTML = `
                <button class="btn btn-warning btn-sm">Ongoing</button>
            `;
        }
    });
}, 2000);

function markCompleted(button) {
    let row = button.closest("tr");
    let projectStatusCell = row.cells[12]; // Adjusted to match correct index
    
    projectStatusCell.innerHTML = `
        <span class="text-success"><i class="fas fa-check-circle"></i> Completed</span>
    `;
}
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll("#dataTable tbody tr").forEach(row => {
            row.addEventListener("click", function () {
                // Assuming the first column contains a unique ID
                let employeeId = this.cells[0].innerText.trim(); 
                if (employeeId) {
                    window.location.href = `employeedailyupdate.php?id=${employeeId}`;
                }
            });
        });
    });
</script>
</body>

</html>
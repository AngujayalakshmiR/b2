<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Task Manager</title>
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link rel="icon" type="image/png" href="img/ktglogo.jpg">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/css/bootstrap.min.css"> -->
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
          /* Optional: Some spacing and styling for the icon buttons */
    .export-btn {
      margin-left: 15px;
    }    
#dataTable th:nth-child(1), #dataTable td:nth-child(1) { width: 2%; }  /* S.no */
    #dataTable th:nth-child(2), #dataTable td:nth-child(2) { width: 8%; } /* Name */
    #dataTable th:nth-child(3), #dataTable td:nth-child(3) { width: 13%; } /* Date */
    #dataTable th:nth-child(4), #dataTable td:nth-child(4) { width: 10%; } /* Company */
    #dataTable th:nth-child(5), #dataTable td:nth-child(5) { width: 20%; } /* Project Title */
    #dataTable th:nth-child(6), #dataTable td:nth-child(6) { width: 10%; }  /* Total Days */
    #dataTable th:nth-child(7), #dataTable td:nth-child(7) { width: 12%; } /* Description */
    #dataTable th:nth-child(8), #dataTable td:nth-child(8) { width: 12%; } /* Total Time */
    #dataTable th:nth-child(9), #dataTable td:nth-child(9) { width: 16%; } /* Actual Time */
    #dataTable th:nth-child(10), #dataTable td:nth-child(10) { width: 9%; } /* Status */
        /* Gradient background for thead */
        thead  {
            
            color: black;
        }
        /* Center align action buttons */
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        /* Styling for buttons */
        .btn-action {
            border: none;
            background: transparent;
            font-size: 18px;
            transition: transform 0.2s ease-in-out;
        }
        .btn-action:hover {
            transform: scale(1.2);
        }
        .btn-edit {
            color: #28a745;
        }
        .btn-delete {
            color: #dc3545;
        }
        /* Add Customer Button */
        .add-employee-btn {
            float: right;
            background: #007bff;
            color: white;
            font-size: 16px;
            padding: 8px 16px;
            border: none;
            border-radius: 10px;
            transition: all 0.3s ease-in-out;
        }
        .add-employee-btn i {
            margin-right: 5px;
        }
        .add-employee-btn:hover {
            background: #0056b3;
            transform: scale(1.1);
        }
         /* Modal Header Gradient Background */
    .modal-header {
        background: linear-gradient(to right, #4568dc, #b06ab3);
        color: white;
    }
    /* Adjust close button color */
    .modal-header .close {
        color: white;
        opacity: 1;
    }
    .modal-header .close:hover {
        color: #f8f9fa;
    }
    .upload-icon {
    transition: transform 0.3s ease-in-out, color 0.3s ease-in-out;
}
.upload-label:hover .upload-icon {
    transform: scale(1.2);
    color: #007bff;
}
.upload-icon.bounce {
    animation: bounce 0.5s ease-in-out;
}
@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-5px); }
}
/* Icon Styling */
.photo-icon{
    color: #5796d8;
}
.aadhar-icon{
    color: rgb(212, 212, 69);
}
.pan-icon{
    color:rgb(250, 148, 65);
}
.photo-icon, .aadhar-icon, .pan-icon {
    font-size: 24px;
    transition: transform 0.3s ease-in-out, color 0.3s ease-in-out;
}

/* Hover Animation */
.photo-icon:hover, .aadhar-icon:hover, .pan-icon:hover {
    transform: scale(1.3);
    color: #007bff;
}

/* Bounce Effect on File Icon */
@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-5px); }
}

.photo-icon:hover, .aadhar-icon:hover, .pan-icon:hover {
    animation: bounce 0.5s ease-in-out;
}

    </style>
<style>
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
        background: linear-gradient(to right, #4568dc, #b06ab3);
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
#dataTable {
        font-size: 14px; /* Adjust size as needed */
    }
    

    /* Dropdown Container */
#employeeFilter  {
    background-color: #007bff; /* Blue background */
    color: white;
    border: none;
    border-radius: 8px;
    padding: 10px 30px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    width: 200px;
    appearance: none;
    position: relative;
    text-align: center;
    background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='white'%3E%3Cpath d='M7 10l5 5 5-5z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 15px center;
    background-size: 18px;
}

/* Hover Effect */
#employeeFilter:hover {
    background-color: #0056b3;
    transform: scale(1.05);
}

/* Focus Effect */
#employeeFilter:focus {
    outline: none;
    box-shadow: 0px 0px 15px rgba(0, 123, 255, 0.8);
}

/* Dropdown Styling */
#employeeFilter option {
    background-color: white;
    color: black;
    font-weight: bold;
    padding: 10px;
    transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
}

/* Hover Effect for Dropdown Options */
#employeeFilter option:hover {
    background-color: #007bff;
    color: white;
}

/* When Option is Selected */
#employeeFilter option:checked {
    background-color: #0056b3;
    color: white;
    font-weight: bold;
}
#projectFilter  {
    background-color: #007bff; /* Blue background */
    color: white;
    border: none;
    border-radius: 8px;
    padding: 10px 30px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    width: 200px;
    appearance: none;
    position: relative;
    text-align: center;
    background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='white'%3E%3Cpath d='M7 10l5 5 5-5z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 15px center;
    background-size: 18px;
}

/* Hover Effect */
#projectFilter:hover {
    background-color: #0056b3;
    transform: scale(1.05);
}

/* Focus Effect */
#projectFilter:focus {
    outline: none;
    box-shadow: 0px 0px 15px rgba(0, 123, 255, 0.8);
}

/* Dropdown Styling */
#projectFilter option {
    background-color: white;
    color: black;
    font-weight: bold;
    padding: 10px;
    transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
}

/* Hover Effect for Dropdown Options */
#projectFilter option:hover {
    background-color: #007bff;
    color: white;
}

/* When Option is Selected */
#projectFilter option:checked {
    background-color: #0056b3;
    color: white;
    font-weight: bold;
}

/* Styling for the navigation */
.nav-tabs {
    border-bottom: none;
    display: flex;
    justify-content: center;
    background: linear-gradient(to right, #4568dc, #b06ab3);
    padding: 5px;
    border-radius: 10px;
}

.nav-tabs .nav-link {
    color: white;
    font-weight: bold;
    border-radius: 5px;
    padding: 10px 20px;
    transition: all 0.4s ease-in-out;
    margin: 5px;
}

/* Hover effect */
.nav-tabs .nav-link:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: scale(1.05);
}

/* Active tab styling */
.nav-tabs .nav-link.active {
    background: white;
    color: #4568dc;
    font-weight: bold;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

/* Add subtle fade-in effect */
.tab-content {
    animation: fadeIn 0.5s ease-in-out;
}

/* Keyframes for fade-in animation */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Card Styling */
.card {
    margin-top: 20px;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

 
    /* Additional styling for month dropdowns (if needed, targeting by id) */
    #monthEmployee,
    #monthProject {
      /* Inherits from the above select styles, can add custom styles here */
    }
</style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: white;">
<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon" style='font-size:19px'>KTG</div>
    <div class="sidebar-brand-text mx-2" style='font-size:19px'>DASHBOARD</div>
</a>
<!-- Divider -->
<div class="sidebar-divider" style="margin-bottom: 3px;"></div>
<!-- Nav Item - Dashboard -->
<li class="nav-item l ">
    <a class="nav-link k" href="index.php" style="color: white;">
        <i class="fas fa-fw fa-tachometer-alt" style="font-size:16px"></i>
        <span>Dashboard</span>
    </a>
</li>
<div class="sidebar-divider" style="margin-bottom: 3px;"></div>
<li class="nav-item l " style="padding:0px;">
    <a class="nav-link k" href="followups.php" style="color: white;">
        <i class="fas fa-fw fa-tachometer-alt" style="font-size:16px"></i>
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
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item " href="customer.php" style="color: black;">Customer</a>
            <a class="collapse-item " href="employee.php" style="color: black;">Employee</a>
            <a class="collapse-item" href="designation.php" style="color: black;">Designation</a>
            <a class="collapse-item" href="projecttype.php" style="color: black;">Project Type</a>
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
<li class="nav-item l active">
    <a class="nav-link k" href="reports.php" style="color: black;">
        <i class="fas fa-fw fa-chart-area" style="font-size:16px"></i>
        <span>Work Reports</span>
    </a>
</li>
<!-- Divider -->
<div class="sidebar-divider d-none d-md-block"></div>
<!-- Sidebar Toggler -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle side border-0" id="sidebarToggle"></button>
</div>
</ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" style=" background:white;">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>
<div class="mr-auto d-flex align-items-center pl-3 py-2">
    <h4 class="text-dark font-weight-bold mr-4" style="color: rgb(15,29,64); font-size: medium; margin-top: 5px;">
        Work Report
    </h4></div>



<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
    <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
            aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small"
                        placeholder="Search for..." aria-label="Search"
                        aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </li>

    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="img-profile rounded-circle"
                src="img/p.png" style="width: 3rem;height: 3rem;">
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
                <style>
    /* Export button styling */
    .export-btn {
      margin-left: 15px;
    }
    /* -------------------- Calendar (Date Input) Styling -------------------- */
    input[type="date"] {
      padding: 10px;
      border-radius: 5px;
      border: 2px solid #0B3D91;
      font-size: 16px;
      color: #333;
      background-color: #fff;
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
      width:200px;
    }
    input[type="date"]:focus {
      border-color: #0B3D91;
      box-shadow: 0 0 8px rgba(69,104,220,0.6);
      outline: none;
    }
    .filter-group {
    gap: 15px; /* Adjust the value as needed */
  }
  </style>
</head>
<body>
  <div class="container-fluid">
    <!-- Page Heading -->
    
    <div class="container-fluid mt-4">
      <!-- Navigation Tabs -->
      <ul class="nav nav-pills custom-nav" id="reportTabs">
    <li class="nav-item">
        <a class="nav-link active" id="employeeTab" href="#" onclick="setActiveTab('employee')">
            <i class="fas fa-user"></i> Employee Report
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="projectTab" href="#" onclick="setActiveTab('project')">
            <i class="fas fa-project-diagram"></i> Project Report
        </a>
    </li>
</ul>
<style>
    /* Adjust font size for navigation tabs */
    .nav-link {
        font-size: 16px; /* Default font size for larger screens */
    }
    /* Media query for smaller screens */
    @media (max-width: 768px) {
        .nav-link {
            font-size: 14px; /* Smaller font size for mobile devices */
        }
    }
</style>
<style>
    /* Navigation Styling */
    .custom-nav .nav-link {
      background-color: #0B3D91;
      color: white;
      border-radius: 50px;
      margin-right: 15px;
      font-size: 14px;
      transition: background-color 0.3s ease, transform 0.3s ease;
    }
    .custom-nav .nav-link.active {
      background-color: rgb(0, 148, 255);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
      transform: scale(1.1);
    }
    .custom-nav .nav-link:hover {
      background-color: rgb(0, 148, 255);
      transform: scale(1.05);
    }
</style>
      <!-- Employee Report Card -->
      <div class="card shadow mb-4" id="employeeReport">
        <div class="card-header py-3 ">
          <!-- First Row: Employee Dropdown Filter and Excel Export -->
          <div class="d-flex flex-wrap align-items-center filter-group   ">
          <select id="employeeFilter" class="form-select w-auto" style="max-width: 200px;">
              <option value="all">All Employees</option>
              <option value="Naveen">Naveen</option>
              <option value="Pavithra">Pavithra</option>
              <option value="Surya">Surya</option>
            </select>
            From:
            <input type="date" id="startDateEmployee" class="form-control" style="max-width: 150px;">
            To:
            <input type="date" id="endDateEmployee" class="form-control" style="max-width: 150px;">
            <button id="exportPdfEmployee" class="btn btn-danger export-btn" style="position: absolute; right: 20px;" title="Export to PDF">
              <i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;Download
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <!-- Employee Report Table -->
            <table class="table table-bordered text-center" style="font-size: 13px;" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr class="thead">
                  <th>S.no</th>
                  <th>Name</th>
                  <th>Date</th>
                  <th>Company</th>
                  <th>Title</th>
                  <th>Type</th>
                  <th>Description</th>
                  <th>Total Hrs</th>
                  <th>Actual Hrs</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody id="tableBody">
                <!-- Example rows; these would normally be generated dynamically -->
                <tr>
                  <td>1</td>
                  <td>Surya</td>
                  <td>10-02-2025</td>
                  <td>Govin</td>
                  <td>ABC</td>
                  <td>Web Application</td>
                  <td>XYZ</td>
                  <td>6</td>
                  <td>5</td>
                  <td>Completed</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Naveen</td>
                  <td>11-02-2025</td>
                  <td>Kurinji</td>
                  <td>xyz</td>
                  <td>Mobile Application</td>
                  <td>aaa</td>
                  <td>4</td>
                  <td>-</td>
                  <td>Started</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Pavithra</td>
                  <td>12-02-2025</td>
                  <td>xxx</td>
                  <td>KMN</td>
                  <td>Web Application</td>
                  <td>bbb</td>
                  <td>7</td>
                  <td>8</td>
                  <td>Completed</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- Project Report Card (Initially Hidden) -->
      <div class="card shadow mb-4" id="projectReport" style="display: none;">
        <div class="card-header py-3 ">
          <!-- First Row: Project Dropdown Filter and Excel Export -->
          <div class="d-flex flex-wrap align-items-center filter-group   ">
            <select id="projectFilter" class="form-select w-auto">
              <option value="all">All Projects</option>
              <!-- Note: The dropdown values are normalized (no extra spaces) -->
              <option value="Govin-ABC">Govin - ABC</option>
              <option value="Kurinji-xyz">Kurinji - xyz</option>
              <option value="xxx-KMN">xxx - KMN</option>
            </select>
                From:
            <input type="date" id="startDateProject" class="form-control mr-2" style="max-width: 150px;" placeholder="Start Date">
            <!-- End Date Input -->To:
            <input type="date" id="endDateProject" class="form-control mr-2" style="max-width: 150px;" placeholder="End Date">
            <!-- Month Dropdown Filter -->
        <!-- Remove the <select> element for month filtering -->
            <button id="exportExcelProject" class="btn btn-danger export-btn" style="position: absolute; right: 20px;" title="Export to PDF">
              <i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;Download
            </button>
          </div>
        </div>
        <div class="card-body" >
          <div class="table-responsive">
            <table class="table table-bordered text-center" style="font-size: 13px;" id="projectTable" width="100%" cellspacing="0">
              <thead>
                <tr class="thead">
                  <th>S.No</th>
                  <th>Date</th>
                  <th>Company-Title</th>
                  <th>Employees</th>
                  <th>Updates</th>
                  <th>Total Hrs</th>
                  <th>Acutual Hrs</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>11-02-2025</td>
                  <td>Govin - ABC</td>
                  <td>Surya,Varshini</td>
                  <td>suma</td>
                  <td>5</td>
                  <td>5</td>
                  <td>Completed</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>11-02-2025</td>
                  <td>Kurinji - xyz</td>
                  <td>Naveen,Mohan</td>
                  <td>suma1</td>
                  <td>6</td>
                  <td>7</td>
                  <td>Completed</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>11-02-2025</td>
                  <td>xxx - KMN</td>
                  <td>Pavithra,Angu</td>
                  <td>suma2</td>
                  <td>4</td>
                  <td>-</td>
                  <td>Started</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>    
    </div>
  </div>
</div>
  <!-- jQuery and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get all rows from the table
        const rows = document.querySelectorAll('#dataTable tbody tr');
        
        rows.forEach(row => {
            row.addEventListener('click', function(event) {
                // Get the clicked cell
                const clickedCell = event.target;

                // Check if the clicked column is "Name" or "Company"
                const nameCell = row.cells[1]; // "Name" column (index 1)
                const companyCell = row.cells[3]; // "Company" column (index 3)

                if (clickedCell === nameCell) {
                    const name = nameCell.textContent.trim();
                    window.location.href = `employeereport.php?name=${encodeURIComponent(name)}`;
                } else if (clickedCell === companyCell) {
                    const company = companyCell.textContent.trim();
                    window.location.href = `companyreport.php?company=${encodeURIComponent(company)}`;
                } else {
                    // For other columns, open the PDF file
                    window.open("http://localhost/b2/Conference%20paper.pdf", "_blank");
                }
            });
        });
    });
</script>
  <script>
    $(document).ready(function() {
    var originalData = [];
    var originalProjectData = [];
    $("#tableBody tr").each(function() {
        originalData.push($(this).clone());
    });
    $("#projectTable tbody tr").each(function() {
        originalProjectData.push($(this).clone());
    });
    function parseDate(dateStr) {
        var parts = dateStr.split("-");
        return new Date(parts[2], parts[1] - 1, parts[0]);
    }
    function filterEmployeeTable() {
        var selectedEmployee = $("#employeeFilter").val();
        var startDateStr = $("#startDateEmployee").val();
        var endDateStr = $("#endDateEmployee").val();
        var startDate = startDateStr ? new Date(startDateStr) : null;
        var endDate = endDateStr ? new Date(endDateStr) : null;
        var filteredRows = originalData.filter(function(row) {
            var passes = true;
            var employeeName = row.find("td:eq(1)").text().trim();
            if (selectedEmployee !== "all" && employeeName !== selectedEmployee) {
                passes = false;
            }
            var dateStr = row.find("td:eq(2)").text().trim();
            var rowDate = parseDate(dateStr);
            if (startDate && rowDate < startDate) {
                passes = false;
            }
            if (endDate && rowDate > endDate) {
                passes = false;
            }
            return passes;
        });
        $("#tableBody").empty();
        filteredRows.forEach(function(row, index) {
            row.find("td:eq(0)").text(index + 1);
            $("#tableBody").append(row);
        });
    }
    function filterProjectTable() {
        var selectedProject = $("#projectFilter").val();
        var startDateStr = $("#startDateProject").val();
        var endDateStr = $("#endDateProject").val();
        var startDate = startDateStr ? new Date(startDateStr) : null;
        var endDate = endDateStr ? new Date(endDateStr) : null;
        var filteredRows = originalProjectData.filter(function(row) {
            var passes = true;
            if (selectedProject !== "all") {
                var normalizedText = row.find("td:eq(2)").text().trim().replace(/\s+/g, '').toLowerCase();
                var normalizedSelected = selectedProject.replace(/\s+/g, '').toLowerCase();
                if (normalizedText !== normalizedSelected) {
                    passes = false;
                }
            }
            var dateStr = row.find("td:eq(1)").text().trim();
            var rowDate = parseDate(dateStr);
            if (startDate && rowDate < startDate) {
                passes = false;
            }
            if (endDate && rowDate > endDate) {
                passes = false;
            }
            return passes;
        });
        $("#projectTable tbody").empty();
        filteredRows.forEach(function(row, index) {
            row.find("td:eq(0)").text(index + 1);
            $("#projectTable tbody").append(row);
        });
    }
    $("#employeeFilter, #startDateEmployee, #endDateEmployee").on("change", function() {
        filterEmployeeTable();
    });
    $("#projectFilter, #startDateProject, #endDateProject").on("change", function() {
        filterProjectTable();
    });
    $("#employeeTab").click(function(e) {
        e.preventDefault();
        $("#employeeReport").show();
        $("#projectReport").hide();
        $(".nav-link").removeClass("active");
        $(this).addClass("active");
    });
    $("#projectTab").click(function(e) {
        e.preventDefault();
        $("#employeeReport").hide();
        $("#projectReport").show();
        $(".nav-link").removeClass("active");
        $(this).addClass("active");
    });
});
    </script>
  <script>
    $(document).ready(function() {
  // Cache the original HTML of the employee table body.
  var originalEmployeeHTML = $("#tableBody").html();
  // Helper function to parse a date string in dd-mm-yyyy format.
  function parseDate(dateStr) {
    var parts = dateStr.split("-");
    return new Date(parts[2], parts[1] - 1, parts[0]);
  }
  // Function to filter Employee Table based on criteria.
  function filterEmployeeTable() {
    var selectedEmployee = $("#employeeFilter").val();
    var startDateStr = $("#startDateEmployee").val();
    var endDateStr = $("#endDateEmployee").val();
    // If no filter is applied, restore the original HTML.
    if (selectedEmployee === "all" && !startDateStr && !endDateStr) {
      $("#tableBody").html(originalEmployeeHTML);
      return;
    }
    // Create a jQuery object from the original HTML.
    var $rows = $("<tbody>" + originalEmployeeHTML + "</tbody>").find("tr");
    $rows = $rows.filter(function() {
      var $row = $(this);
      var employeeName = $row.find("td:eq(1)").text().trim();
      if (selectedEmployee !== "all" && employeeName !== selectedEmployee) {
        return false;
      }
      // Date filter (Column index 2, format: dd-mm-yyyy)
      var dateStr = $row.find("td:eq(2)").text().trim();
      var rowDate = parseDate(dateStr);
      if (startDateStr) {
        var startDate = new Date(startDateStr);
        if (rowDate < startDate) return false;
      }
      if (endDateStr) {
        var endDate = new Date(endDateStr);
        if (rowDate > endDate) return false;
      }
      return true;
    });

    // Rebuild table body with the filtered rows.
    var newHTML = "";
    $rows.each(function(index) {
      $(this).find("td:eq(0)").text(index + 1);
      newHTML += $(this)[0].outerHTML;
    });

    $("#tableBody").html(newHTML);
  }

  // Attach event listeners for Employee filters.
  $("#employeeFilter, #startDateEmployee, #endDateEmployee").on("change", function() {
    if ($(this).is("#employeeFilter")) {
      var val = $(this).val();
      var url = new URL(window.location.href);
      if (val === "all") {
        url.searchParams.delete("name");
      } else {
        url.searchParams.set("name", val);
      }
      history.pushState(null, "", url);
    }
    filterEmployeeTable();
  });

  // Attach event listeners for Project filters.
  $("#projectFilter, #startDateProject, #endDateProject").on("change", function() {
    // (Filtering code for project table would go here.)
  });

  // Toggle between Employee and Project Reports.
  $("#employeeTab").click(function(e) {
    e.preventDefault();
    $("#employeeReport").show();
    $("#projectReport").hide();
    $(".nav-link").removeClass("active");
    $(this).addClass("active");
  });

  $("#projectTab").click(function(e) {
    e.preventDefault();
    $("#employeeReport").hide();
    $("#projectReport").show();
    $(".nav-link").removeClass("active");
    $(this).addClass("active");
  });

  // On page load, if a "name" query parameter exists, set the dropdown and filter.
  function getQueryParameter(param) {
    var urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
  }

  var selectedName = getQueryParameter("name");
  if (selectedName) {
    $("#employeeFilter").val(selectedName);
    filterEmployeeTable();
  }
});

  </script>
  
            <!-- End of Main Content -->

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
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
<!-- Bootstrap 4.6.0 JavaScript -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script> -->
<!-- <script>
    $(document).ready(function() {
    let originalData = []; // Store original employee table data
    let originalProjectData = []; // Store original project table data

    // Store each row as an object in the employee table
    $("#tableBody tr").each(function() {
        let rowData = $(this).clone();
        originalData.push(rowData);
    });

    // Store each row as an object in the project table
    $("#projectTable tbody tr").each(function() {
        let rowData = $(this).clone();
        originalProjectData.push(rowData);
    });

    // Employee Report Filtering
    $("#employeeFilter").change(function() {
        let selectedEmployee = $(this).val();

        if (selectedEmployee === "all") {
            $("#tableBody").empty().append(originalData);
        } else {
            let filteredRows = originalData.filter(row => 
                row.find("td:eq(1)").text().trim() === selectedEmployee
            );

            $("#tableBody").empty();
            filteredRows.forEach((row, index) => {
                row.find("td:eq(0)").text(index + 1);
                $("#tableBody").append(row);
            });
        }
    });

    // Project Report Filtering with normalization
    $("#projectFilter").change(function() {
        let selectedProject = $(this).val(); // e.g. "Govin-ABC"

        if (selectedProject === "all") {
            $("#projectTable tbody").empty().append(originalProjectData);
        } else {
            let filteredRows = originalProjectData.filter(row => {
                // Get the text from the Company-Title column (td:eq(2))
                let companyTitleText = row.find("td:eq(2)").text().trim(); // e.g. "Govin - ABC"
                // Normalize by removing all whitespace and converting to lowercase
                let normalizedText = companyTitleText.replace(/\s+/g, '').toLowerCase();
                let normalizedSelected = selectedProject.replace(/\s+/g, '').toLowerCase();
                return normalizedText === normalizedSelected;
            });

            $("#projectTable tbody").empty();
            filteredRows.forEach(row => $("#projectTable tbody").append(row));
        }
    });
});

</script> -->
<script>
$(document).ready(function() {
    $('#projectTable').DataTable();
});
</script>
<script>
    $(document).ready(function() {
        // Toggle between Employee and Project Reports
        $("#employeeTab").click(function() {
            $("#employeeReport").show();
            $("#projectReport").hide();
            $(".nav-link").removeClass("active");
            $(this).addClass("active");
        });

        $("#projectTab").click(function() {
            $("#employeeReport").hide();
            $("#projectReport").show();
            $(".nav-link").removeClass("active");
            $(this).addClass("active");
        });

        // Employee Filter
        let originalData = $("#tableBody").html(); // Store original table data

        $("#employeeFilter").change(function() {
            let selectedEmployee = $(this).val();
            if (selectedEmployee === "all") {
                $("#tableBody").html(originalData); // Restore original table
            } else {
                let filteredRows = "";
                $("#tableBody tr").each(function(index) {
                    let employeeName = $(this).find("td:eq(1)").text().trim();
                    if (employeeName === selectedEmployee) {
                        $(this).find("td:eq(0)").text(index + 1); // Recalculate S.no
                        filteredRows += `<tr>${$(this).html()}</tr>`; // Store filtered rows
                    }
                });
                $("#tableBody").html(filteredRows); // Update table with filtered rows
            }
        });
    });
</script>
</body>

</html>
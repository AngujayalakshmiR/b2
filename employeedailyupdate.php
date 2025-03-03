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
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/css/bootstrap.min.css"> -->
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>

#dataTable th:nth-child(1), #dataTable td:nth-child(1) { width: 3%; }  /* S.no */
    #dataTable th:nth-child(2), #dataTable td:nth-child(2) { width: 5%; } /* Date */
    #dataTable th:nth-child(3), #dataTable td:nth-child(3) { width: 15%; } /* Company */
    #dataTable th:nth-child(4), #dataTable td:nth-child(4) { width: 5%; } /* Project Title */
    #dataTable th:nth-child(5), #dataTable td:nth-child(5) { width: 5%; }  /* Project Type */
    #dataTable th:nth-child(6), #dataTable td:nth-child(6) { width: 5%; } /* Description */

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

 /* Reduce table font size */
 #dataTable {
        font-size: 14px; /* Adjust size as needed */
    }
tbody{
    border-color: #f8f9fa;
}
    /* Reduce padding for table cells */
    

    .status-icon {
            font-size: 1.2rem;
            transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
        }
        .ongoing { color: orange; animation: spin 1s linear infinite; }
        .pending { color: red; animation: pulse 1s infinite alternate; }
        .completed { color: green; }
        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
        @keyframes pulse { 0% { opacity: 0.6; } 100% { opacity: 1; } }
        
        /* Styled Dropdown */
        .status-dropdown {
            font-weight: bold;
            border: none;
            padding: 6px;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s, color 0.3s;
        }
        .status-ongoing { background: orange; color: white; }
        .status-completed { background: green; color: white; }
/* Fix missing left and bottom borders */
.table thead tr:first-child th:first-child {
    border-top-left-radius: 15px;
}
.table thead tr:first-child th:last-child {
    border-top-right-radius: 15px;
}
.table tbody tr:last-child td:first-child {
    border-bottom-left-radius: 15px;
}
.table tbody tr:last-child td:last-child {
    border-bottom-right-radius: 15px;
}
.table-container {
    border-radius: 15px;
    overflow: hidden;
    border: 1px solid #dee2e6; /* Ensures full border visibility */
}


/* Apply border to all cells */
.table th, .table td {
    border: 1px solid #dee2e6;
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
 /* Styling for the modal */
 @media (max-width:600px) {
    h4{
        font-size: small;
    }
}
@media (min-width:600px) {
    h4{
        font-size: medium;
    }
}

/* Style for the table header (thead) */
#dataTable thead {
    color: rgb(140, 147, 159);
    font-weight: 1; 
    font-style: normal;
    text-overflow: ellipsis;
    white-space: nowrap;
}

/* Style for table data (td) */
#dataTable tbody td {
    font-style: normal;
    overflow: hidden;
    line-height: 1rem;
    text-overflow: ellipsis;
    color: rgb(23, 25, 28);
    font-size: 14px;
    font-weight: 400;
    padding: 10px; /* Adds spacing inside cells */
}

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

/* Styling for the card header */
.card-header {
    display: flex;
    align-items: center;
    justify-content: space-between; /* Adjust spacing */
    padding: 12px 16px;
    background-color: #f8f9fc;
}
.page-item.active .page-link {
    background: rgb(0, 148, 255);
}
</style>
<style>
    .custom-container {
        background: rgb(0, 148, 255);
        color: white;
        border-radius: 25px;
        padding: 20px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }
    .custom-card {
        flex: 1;
        padding: 20px;
        min-width: 100px;
        text-align: center;
        border-right: 2px solid white;
    }
    .custom-card:last-child {
        border-right: none;
    }
    .custom-card b {
        font-size: medium;
    }
    .custom-card div {
        font-size: 14px;
    }
 /* Responsive Design */
 @media (max-width: 1024px) { /* Tablet View */
        .custom-container {
            justify-content: center;
        }
        .custom-card {
            width: 30%;
            border-right: none;
            border-bottom: none;
        }
        .custom-card:nth-child(3n) {
            border-right: none;
        }
        .custom-card:nth-child(4), .custom-card:nth-child(5), .custom-card:nth-child(6) {
            border-bottom: none;
        }
    }
    
    @media (max-width: 768px) { /* Mobile View */
        .custom-card {
            width: 45%;
            border-right: 2px solid none;
            border-bottom: 2px solid none;
        }
        .custom-card:nth-child(2n) {
            border-right: none;
        }
        
        .custom-card b, .custom-card div {
            font-size: medium;
        }
    }



   

</style>

</head>



<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: white;">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
    <div class="sidebar-brand-icon" style='font-size:20px'><b>KTG</b></div>
    <div class="sidebar-brand-text mx-2" style='font-size:20px'><b>DASHBOARD</b></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item  l">
    <a class="nav-link k" href="employeedash.php" style="color: white;">
        <i class="fas fa-fw fa-tachometer-alt" style="font-size:20px"></i>
        <span><b>Dashboard</b></span>
    </a>
</li>
<li class="nav-item active l ">
    <a class="nav-link k" href="employeeProjectAllocated.php" style="color: white;">
        <i class="fas fa-fw fa-folder" style="font-size:20px"></i>
        <span><b>Project Allocated</b></span>
    </a>
</li>

<!-- Nav Item - Project Creation -->
<li class="nav-item l">
    <a class="nav-link k" href="employeeWorkReports.php" style="color: black;">
        <i class="fas fa-fw fa-chart-area" style="font-size:20px"></i>
        <span><b>Work report</b></span>
    </a>
</li>


<!-- Divider -->
<hr class=" d-none d-md-block">
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
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" style=" background:white">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>
<div class="mr-auto d-flex align-items-center pl-3 py-2">
    <h4 class="text-dark font-weight-bold mr-4" style="color: rgb(15,29,64); margin-top: 5px;">
        Project Details
    </h4>
</div>


<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

<h4 class="text-dark font-weight-bold mr-1 d-flex align-items-center pl-3 py-2 " style="color: rgb(15,29,64); font-size: medium; margin-top: 5px;">
        Jayavarshini 
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
            
            
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </a>
        </div>
    </li>

</ul>

</nav>


                <!-- Begin Page Content -->
                <div class="container-fluid">
                <div class="custom-container"> 
    <div class="custom-card"><b>Company Name</b> 
        <div style="margin-top: 10px;">Kurinji Cement</div>
    </div>
    <div class="custom-card"><b>Project Title</b>
        <div style="margin-top: 10px;">Updation in the existing web page</div>
    </div>
    <div class="custom-card"><b>Project Type</b>
        <div style="margin-top: 10px;">Web Development</div>
    </div>
    <div class="custom-card"><b>Total Days</b>
        <div style="margin-top: 10px;">20</div>
    </div>
    <div class="custom-card"><b>Pending Days</b>
        <div style="margin-top: 10px;"> 10</div>
    </div>
    <div class="custom-card"><b>Members Allocated</b>
        <div style="margin-top: 10px;">Jayavarshini, Suriya</div>
    </div>
</div><br>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                    <div class="card-header py-3">
    <div class="row align-items-center">
        <!-- Task Details (One Full Column on Small Screens, One Column on Larger Screens) -->
        <div class="col-md-3 col-12">
            <p class="m-0 fw-bold text-truncate" style="font-size: 16px; color: rgb(23, 25, 28);">
                Task Details <span class="header-counter">2</span>
            </p>
        </div>
        
        <!-- Inputs and Button in One Column (Wraps on Small Screens) -->
        <div class="col-md-9 col-12">
            <div class="row g-1">
                <div class="col-md-6 col-12">
                    <input type="text" class="form-control" id="taskInput1" placeholder="Enter Today Task">
                </div>
                <div class="col-md-4 col-12">
                    <input type="text" class="form-control" id="taskInput2" placeholder="Enter Total Hours">
                </div>
                <div class="col-md-2 col-12">
                    <button type="submit" class="btn w-100 py-1 text-white" style="background: rgb(0, 148, 255); font-size: 15px;">Add</button>
                </div>
            </div>
        </div>
    </div>
</div>


                        <div class="card-body">
                            <div class="table-responsive ">
                            <table class="table text-center" id="dataTable" width="100%">
    <thead>
        <tr>
        <th>S.no</th>
                    <th>Date</th>
                    <th>Task Details</th>
                    <th id="totalHrsHeader">Total Hrs (0)</th>
                    <th id="actualHrsHeader">Actual Hrs (0)</th>
                    <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <tr>
                    <td>1</td>
                    <td>10-02-2025</td>
                    <td>The project requires inbuilt updates and notifications.</td>
                    <td>10</td>
                    <td>-</td>
                    <td><button type="button" class="btn  w-80 py-1" style="background: rgb(0, 148, 255);color:white;font-size:15px;" onclick="enableEdit(event, this)">Update</button></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>11-02-2025</td>
                    <td>Fixing the UI issues in the dashboard.</td>
                    <td>8</td>
                    <td>-</td>
                    <td><button type="button" class="btn  w-80 py-1" style="background: rgb(0, 148, 255);color:white;font-size:15px;" onclick="enableEdit(event, this)">Update</button></td>
                </tr>
        <!-- Add more rows as needed -->
    </tbody>
</table>
                            </div>
                        </div>
                        
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
         
            <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get all rows from the table
        const rows = document.querySelectorAll('#dataTable tbody tr');
        
        rows.forEach(row => {
            row.addEventListener('click', function(event) {
                // Check if the clicked element is in the 'name-column' or 'company-column'
                const nameColumn = event.target.closest('.name-column');
                const companyColumn = event.target.closest('.company-column');

                // If clicked on the name or company column, redirect to respective pages
                if (nameColumn) {
                    const name = nameColumn.textContent;
                    window.location.href = `employeereport.php?name=${name}`;
                } else if (companyColumn) {
                    const company = companyColumn.textContent;
                    window.location.href = `companyreport.php?company=${company}`;
                } else {
                    // For other columns, navigate to the reports page
                    const name = row.getAttribute('data-name');
                    if (name) {
                        window.location.href = `reports.php?name=${encodeURIComponent(name)}`;
                    }
                }
            });
        });
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
        let dateCell = rows[i].getElementsByTagName("td")[2];
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

  <!-- <script>
    $(document).ready(function() {
      // When a row is clicked, get the employee name and redirect to the report page with the name as a query parameter.
      $("#dataTable tbody tr").on("click", function() {
        var employeeName = $(this).data("name");
        if(employeeName) {
          // Redirect to the Customer Details page with the selected name in the URL.
          window.location.href = "reports.php?name=" + encodeURIComponent(employeeName);
        }
      });
    });
  </script> -->



<script>
        function enableEdit(event, btn) {
            event.preventDefault(); // Prevent page reload

            let row = btn.closest("tr"); // Get the row
            let taskField = row.cells[2]; // Task Details field
            let actualHrsField = row.cells[4]; // Actual Hrs field
            let button = row.cells[5].querySelector("button"); // Get the button

            if (button.innerText === "Update") {
                // Enable content editing for Task Details
                taskField.contentEditable = "true";
                taskField.focus();

                // Create input field for Actual Hrs
                let inputField = document.createElement("input");
                inputField.type = "number";
                inputField.className = "form-control";
                inputField.value = actualHrsField.innerText.trim() === "-" ? "" : actualHrsField.innerText;
                actualHrsField.innerHTML = "";
                actualHrsField.appendChild(inputField);
                inputField.focus();

                // Change button text to "Save"
                button.innerText = "Save";
                button.classList.replace("btn-info", "btn-success");
            } else {
                // Save the updated values
                taskField.contentEditable = "false";
                let newActualHrs = actualHrsField.querySelector("input").value;
                actualHrsField.innerHTML = newActualHrs || "-";

                // Disable the button after saving
                button.innerText = "Saved";
                button.classList.replace("btn-success", "btn-secondary");
                button.disabled = true;

                // Update the total hours dynamically
                updateTotalHours();
            }
        }

        function updateTotalHours() {
            let totalHrs = 0;
            let actualHrs = 0;

            // Loop through the table rows
            document.querySelectorAll("#dataTable tbody tr").forEach(row => {
                totalHrs += parseFloat(row.cells[3].innerText) || 0;
                let actualValue = parseFloat(row.cells[4].innerText);
                if (!isNaN(actualValue)) {
                    actualHrs += actualValue;
                }
            });

            // Update table headers dynamically
            document.getElementById("totalHrsHeader").innerText = `Total Hrs (${totalHrs})`;
            document.getElementById("actualHrsHeader").innerText = `Actual Hrs (${actualHrs})`;
        }

        // Call function on page load to set initial values
        window.onload = updateTotalHours;
    </script>

</body>

</html>
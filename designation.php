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
        /* Gradient background for thead */
        thead  {
            background: linear-gradient(to right, #4568dc, #b06ab3);
            color: white;
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
        .add-customer-btn {
            float: right;
            background: #007bff;
            color: white;
            font-size: 16px;
            padding: 8px 16px;
            border: none;
            border-radius: 10px;
            transition: all 0.3s ease-in-out;
        }

        .add-customer-btn i {
            margin-right: 5px;
        }

        .add-customer-btn:hover {
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
    .table {
    border-radius: 15px;
    overflow: hidden; /* Ensures inner elements don't break the radius */
    border-collapse: separate; /* Required for border-radius to work properly */
    border-spacing: 0; /* Removes unwanted gaps */
}

/* Rounds top corners */
.table thead tr:first-child th:first-child {
    border-top-left-radius: 15px;
}
.table thead tr:first-child th:last-child {
    border-top-right-radius: 15px;
}

/* Rounds bottom corners */
.table tbody tr:last-child td:first-child {
    border-bottom-left-radius: 15px;
}
.table tbody tr:last-child td:last-child {
    border-bottom-right-radius: 15px;
}


#taskInput {
    width: 60%;
}

#taskButton {
    width: 30%;
    margin-left: 130px;
}
.acontainer{
    margin-left: 25px;
    margin-right: 25px;
    margin-top: 10px;
    margin-bottom: 10px;
}
/* Tablets and Medium screens */
@media (max-width: 992px) {
    #taskInput {
        width: 80%;
    }

    #taskButton {
        width: 50%;
        font-size: 14px;
        
    }
}

/* Small screens (Phones) */
@media (max-width: 768px) {
    #taskForm {
        flex-direction: column;
        align-items: stretch;
    }

    #taskInput {
        width: 100%;
        margin-bottom: 10px;
    }

    #taskButton {
        width: 100%;
        margin-left: 0px;
    }
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
</style>
    
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: white;">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon" style='font-size:20px'><b>KTG</b></div>
    <div class="sidebar-brand-text mx-2" style='font-size:20px'><b>DASHBOARD</b></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item l ">
    <a class="nav-link k" href="index.php" style="color: white;">
        <i class="fas fa-fw fa-tachometer-alt" style="font-size:20px"></i>
        <span><b>Dashboard</b></span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider" style="margin-bottom: 0px; color:#4568dc">

<!-- Nav Item - Master -->
<li class="nav-item l master active">
    <a class="nav-link k collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo" style="color: white;">
        <i class="fas fa-fw fa-clipboard-list" style="font-size:20px"></i>
        <span><b>Master</b></span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item " href="customer.php" style="color: black;"><b>Customer</b></a>
            <a class="collapse-item " href="employee.php" style="color: black;"><b>Employee</b></a>
            <a class="collapse-item active" href="designation.php" style="color: white;"><b>Designation</b></a>
            <a class="collapse-item" href="projecttype.php" style="color: black;"><b>Project Type</b></a>
        </div>
    </div>
</li> 

<!-- Divider -->
<hr class="sidebar-divider" style="margin-bottom: 0px;">

<!-- Nav Item - Project Creation -->
<li class="nav-item l">
    <a class="nav-link k" href="projectcreation.php" style="color: black;">
        <i class="fas fa-fw fa-folder" style="font-size:20px"></i>
        <span><b>Project Creation</b></span>
    </a>
</li>

<hr class="sidebar-divider" style="margin-bottom: 0px;">

<!-- Nav Item - Daily Updates -->
<li class="nav-item l">
    <a class="nav-link k" href="dailyupdates.php" style="color: black;">
        <i class="fas fa-fw fa-table" style="font-size:20px"></i>
        <span><b>Daily Updates</b></span>
    </a>
</li>

<hr class="sidebar-divider" style="margin-bottom: 0px;">

<!-- Nav Item - Work Reports -->
<li class="nav-item l">
    <a class="nav-link k" href="reports.php" style="color: black;">
        <i class="fas fa-fw fa-chart-area" style="font-size:20px"></i>
        <span><b>Work Reports</b></span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

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
                                
                   <!-- Header Section -->
<div class="mr-auto d-flex align-items-center pl-3 py-2">
    <h4 class="text-dark font-weight-bold mr-4" style="color: rgb(15,29,64); font-size: medium; margin-top: 5px;">
        Master > Designation
    </h4>
    <button class="btn d-flex align-items-center px-3" style="background-color: rgb(15,29,64); color: white; border-radius: 25px;"
        data-toggle="modal" data-target="#designationModal">
        <i class="fa-solid fa-id-badge fa-1x"></i>&nbsp;
        Create Designation
    </button>
    <i id="trashIcon" class="fa-solid fa-trash fa-2x ml-3" 
       style="color: red; cursor: pointer; padding: 10px; border-radius: 50%; background: white; box-shadow: 0px 0px 5px rgba(0,0,0,0.2);">
    </i>
</div>

<!-- Customer Modal (No header, reduced width) -->
<!-- Include Font Awesome for Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<!-- Modal -->
<div class="modal fade" id="designationModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 40%;">
    <div class="modal-content" style="border-radius: 15px;">
      <div class="modal-body p-0">
        <div class="row no-gutters">
          <!-- Left Column: Form -->
          <div class="col-md-10">
            <div class="ml-3 mt-3 mb-3 mr-3">
              <form id="designationForm">
                <div class="form-group">
                  <label for="designationInput"><b>Designation Details:</b></label>
                  <input type="text" class="form-control" id="designationInput" placeholder="Enter designation" required>
                </div>
                <div class="d-flex justify-content-start">
                  <button type="submit" class="btn" style="background-color: rgb(15,29,64); color: white; border-radius: 25px;">Submit</button>
                </div>
              </form>
            </div>
          </div>

          <!-- Right Column: Designation Icon -->
          <div class="col-md-2 d-flex align-items-center justify-content-center" 
               style="background-color: rgb(15,29,64); color: white; 
                      border-top-right-radius: 14px; border-bottom-right-radius: 14px;">
            <i class="fa-solid fa-id-badge fa-4x"></i> <!-- Designation Icon -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                   

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
                <!-- Begin Page Content -->
              <!-- Include Bootstrap -->

           <!-- Designation Cards Container -->
<div class="container mt-4">
    <div class="row" id="designationContainer" style="row-gap: 20px;"></div>
</div>

<!-- Add Designation Modal -->
<div class="modal fade" id="designationModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 40%;">
    <div class="modal-content" style="border-radius: 15px;">
      <div class="modal-body p-0">
        <div class="row no-gutters">
          <!-- Left Column: Form -->
          <div class="col-md-10">
            <div class="ml-3 mt-3 mb-3 mr-3">
              <form id="designationForm">
                <div class="form-group">
                  <label for="designationInput"><b>Designation Details:</b></label>
                  <input type="text" class="form-control" id="designationInput" placeholder="Enter designation" required>
                </div>
                <div class="d-flex justify-content-start">
                  <button type="submit" class="btn" style="background-color: rgb(15,29,64); color: white; border-radius: 25px;">Submit</button>
                </div>
              </form>
            </div>
          </div>
          <!-- Right Column: Designation Icon -->
          <div class="col-md-2 d-flex align-items-center justify-content-center" 
               style="background-color: rgb(15,29,64); color: white; 
                      border-top-right-radius: 14px; border-bottom-right-radius: 14px;">
            <i class="fa-solid fa-id-badge fa-4x"></i> <!-- Designation Icon -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Edit Designation Modal -->
<div class="modal fade" id="editDesignationModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 40%;">
    <div class="modal-content" style="border-radius: 15px;">
      <div class="modal-body p-0">
        <div class="row no-gutters">
          <!-- Left Column: Form -->
          <div class="col-md-10">
            <div class="ml-3 mt-3 mb-3 mr-3">
              <form id="editDesignationForm">
                <input type="hidden" id="editIndex">
                <div class="form-group">
                  <label for="editDesignationInput"><b>Designation Details:</b></label>
                  <input type="text" class="form-control" id="editDesignationInput" placeholder="Edit designation" required>
                </div>
                <div class="d-flex justify-content-start">
                  <button type="submit" class="btn" style="background-color: rgb(15,29,64); color: white; border-radius: 25px;">Update</button>
                </div>
              </form>
            </div>
          </div>
          <!-- Right Column: Designation Icon -->
          <div class="col-md-2 d-flex align-items-center justify-content-center" 
               style="background-color: rgb(15,29,64); color: white; 
                      border-top-right-radius: 14px; border-bottom-right-radius: 14px;">
                <i class="fa-solid fa-pen-to-square fa-3x" style="color: white;"></i>
                    </div>
        </div>
      </div>
    </div>
  </div>
</div>



                <!-- /.container-fluid -->

            </div>

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
    <script>
$(document).ready(function() {
    $('#dataTable').DataTable();
});
</script>

    
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script>
    let colors = ["#F8A5B2", "#89D9E2", "#E0DB71", "#86E269", "#66D9B2"];
    let colorIndex = 0;

    function getNextColor() {
        let color = colors[colorIndex];
        colorIndex = (colorIndex + 1) % colors.length;
        return color;
    }

    // Handle adding new designation
    document.getElementById("designationForm").addEventListener("submit", function(event) {
        event.preventDefault();
        let designationInput = document.getElementById("designationInput");
        let designation = designationInput.value.trim();
        if (designation === "") return;
        addDesignation(designation);
        $("#designationModal").modal("hide");
        document.getElementById("designationForm").reset();
    });

    function addDesignation(designation) {
        let newCard = document.createElement("div");
        newCard.className = "col-md-3 draggable-container"; // Wrapper div
        let cardId = "card-" + new Date().getTime();
        newCard.innerHTML = `
            <div id="${cardId}" class="card p-3 draggable-card" draggable="true" 
                style="min-height: 50px; color:black; background-color: ${getNextColor()}; 
                       border-radius: 10px; position: relative; transition: transform 0.2s;">
                <div class="card-body text-center">
                    <h6 class="card-text">${designation}</h6>
                </div>
            </div>
        `;

        let cardElement = newCard.querySelector(".card");

        // Drag Events
        cardElement.addEventListener("dragstart", function(event) {
            event.dataTransfer.setData("text/plain", cardId);
            setTimeout(() => {
                cardElement.style.opacity = "0.5";
            }, 0);
        });

        cardElement.addEventListener("dragend", function() {
            cardElement.style.opacity = "1";
        });

        // Click to edit
        cardElement.addEventListener("click", function() {
            openEditModal(cardId, designation);
        });

        document.getElementById("designationContainer").appendChild(newCard);
    }

    function openEditModal(cardId, designation) {
        document.getElementById("editDesignationInput").value = designation;
        document.getElementById("editIndex").value = cardId;
        $("#editDesignationModal").modal("show");
    }

    // Handle updating the designation
    document.getElementById("editDesignationForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent page reload

        let editInput = document.getElementById("editDesignationInput").value.trim();
        let cardId = document.getElementById("editIndex").value;

        if (editInput === "" || !cardId) return;

        let cardElement = document.getElementById(cardId);
        if (cardElement) {
            cardElement.querySelector(".card-text").textContent = editInput;
        }

        $("#editDesignationModal").modal("hide");
    });

    // Delete Functionality
    function deleteCard(cardId) {
        let cardElement = document.getElementById(cardId);
        if (cardElement) {
            cardElement.parentElement.remove(); // Remove the entire wrapper div
        }
    }

    // Trash Icon Drop Handling
    let trashIcon = document.getElementById("trashIcon");

    trashIcon.addEventListener("dragover", function(event) {
        event.preventDefault();
    });

    trashIcon.addEventListener("drop", function(event) {
        event.preventDefault();
        let cardId = event.dataTransfer.getData("text/plain");
        deleteCard(cardId);
    });
</script>

</body>

</html>
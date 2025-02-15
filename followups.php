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
        width: 90%; /*
         Keep it smaller than the sidebar */
        margin: 0 auto; /* Center align */
        padding:0px;
        text-align:center;
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
.plus-icon {
    transition: transform 0.3s ease-in-out;
}

.plus-button {
    transition: all 0.3s ease-in-out;
}

.plus-button:hover {
    background-color: rgb(0, 120, 220); /* Darker shade of blue */
    transform: scale(1.1); /* Slightly enlarge the button */
}

.plus-button:hover .plus-icon {
    transform: rotate(135deg); /* Rotate the plus icon */
}
.status-container {
    display: flex;
    flex-wrap: wrap;
    gap: 15px; /* Increases space between cards */
    justify-content: center;
    margin-top: 10px;
}


  .draggable-card {
    min-height: 50px;
    width: 250px;
    color: black;
    background-color: var(--card-color);
    border-radius: 10px;
    position: relative;
    transition: transform 0.2s, background-color 0.3s;
    cursor: pointer;
    padding: 10px;
    text-align: center;
    float:center;
  }

  .draggable-card:hover {
    transform: scale(1.05);
  }

  .card-description {
    font-size: 12px;
    color: #555;
    display: none;
  }

  .draggable-card:hover .card-description {
    display: block;
  }
</style>
    
<style>
  /* Style for Count Box */
.count-box {
    display: inline-block;
    width: 24px;
    height: 24px;
    line-height: 24px;
    background-color: rgb(224, 230, 235);
    color: rgb(140, 147, 159);
    font-size: 12px;
    font-weight: bold;
    text-align: center;
    border-radius: 4px; /* Slightly rounded corners */
    margin-left: 5px;
}

/* Optional: Adjust title styling */
.title {
    font-size: 14px;
    color: black;
}

  /* Container Styling */
  .status-container {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    justify-content: center;
    margin-top: 10px;
  }

  /* Card Styling */
  .draggable-card {
    min-height: 50px;
    width: 250px;
    color: black;
    background-color: var(--card-color);
    border-radius: 10px;
    text-align: center;
    padding: 10px;
    transition: transform 0.2s;
    cursor: pointer;
  }

  .draggable-card:hover {
    transform: scale(1.05);
  }

  /* Vertical Divider */
  .vertical-divider {
    position: absolute;
    top: 0;
    right: 0;
    width: 1px;
    height: 100%;
    background-color: #ccc;
  }

  /* Prevent Divider on Last Column */
  .col-md-4:last-child .vertical-divider {
    display: none;
  }

  /* Hide default radio button */
.radio-btn input {
  display: none;
}

/* Custom Radio Button Style */
.custom-radio {
  display: inline-block;
  padding: 8px 15px;
  border-radius: 20px;
  cursor: pointer;
  font-weight: 600;
  transition: all 0.3s ease-in-out;
  background-color: #f1f1f1;
  color: #333;
  border: 2px solid transparent;
}

/* Colors for Different Status */
.ongoing { background-color: #FFD700; }  /* Gold */
.payment { background-color: #28a745; color: white; } /* Green */
.newClient { background-color: #007bff; color: white; } /* Blue */

/* Hover Effect */
.custom-radio:hover {
  filter: brightness(1.1);
  box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.2);
}

/* Active (Selected) State */
.radio-btn input:checked + .custom-radio {
  border: 2px solid #000;
  transform: scale(1.05);
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
<li class="nav-item l active" style="padding:0px;">
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
<li class="nav-item l">
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
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" style=" background:white;">          
                   <!-- Header Section -->
                   <div class="mr-auto d-flex align-items-center pl-3 py-2">
    <h4 class="text-dark font-weight-bold mr-4" style="color: rgb(15,29,64); font-size: medium; margin-top: 5px;">
        FollowUps
    </h4>
  <!-- Button to Open Modal -->
<button class="btn d-flex align-items-center px-3 plus-button" 
    style="background-color:rgb(0, 148, 255); color: white; border-radius: 25px;"
    data-toggle="modal" data-target="#designationModal">
    <i class="fa-solid fa-plus fa-1x plus-icon"></i>&nbsp;
    Add
</button>
    <i id="trashIcon" class="fa-solid fa-trash fa-2x ml-3" 
       style="color: rgb(15,29,64); cursor: pointer; padding: 10px; border-radius: 50%; background: white; box-shadow: 0px 0px 5px rgba(0,0,0,0.2);float:left;font-size:15px;">
    </i>
</div>
<!-- Include Font Awesome for Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


<!-- Modal -->
<div class="modal fade" id="designationModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="row no-gutters">
          <!-- Form Section -->
          <div class="col-12 p-3">
            <form id="designationForm">
              
              <!-- Title Field -->
              <div class="form-group">
                <label for="titleInput"><b>Title:</b></label>
                <input type="text" class="form-control" id="titleInput" placeholder="Enter title" required>
              </div>

              <!-- Short Description Field -->
              <div class="form-group">
                <label for="descriptionInput"><b>Short Description:</b></label>
                <textarea class="form-control" id="descriptionInput" rows="2" placeholder="Enter short description" required></textarea>
              </div>

              <!-- Radio Buttons for Status -->
              <div class="form-group">
                <label><b>Status:</b></label>
                <div class="d-flex flex-wrap justify-content-start align-items-center">
                  <label class="radio-btn">
                    <input type="radio" name="status" value="ongoing" required>
                    <span class="custom-radio ongoing">Ongoing</span>
                  </label>
                  <label class="radio-btn">
                    <input type="radio" name="status" value="payment" required>
                    <span class="custom-radio payment">Payment</span>
                  </label>
                  <label class="radio-btn">
                    <input type="radio" name="status" value="newClient" required>
                    <span class="custom-radio newClient">New Client</span>
                  </label>
                  <div class="text-center">
                <button type="submit" class="btn submit-btn">Submit</button>
              </div>
                </div>
              </div>

              <!-- Submit Button -->
              

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Responsive CSS -->
<style>
  /* Modal Responsiveness */
  .modal-dialog {
    max-width: 35%;
  }

  @media (max-width: 992px) { /* Tablets */
    .modal-dialog {
      max-width: 60%;
    }
  }

  @media (max-width: 768px) { /* Mobile */
    .modal-dialog {
        max-width: 70%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: auto; /* Ensures it's centered */
    }
    .custom-radio {
        font-size: 12px;
        width:100%;
    }
    .submit-btn {
        font-size: 10px;
        padding: 4px 8px;
        margin-top: 5px;
    }
}


  /* Styling */
  .modal-content {
    border-radius: 15px;
  }

  .custom-radio {
    font-size: 14px;
    margin-right: 10px;
  }

  .submit-btn {
    background-color: rgb(15,29,64);
    color: white;
    border-radius: 10px;
    font-size: 14px;
    padding: 4px 8px;
  }

  .d-flex.flex-wrap {
    gap: 10px;
  }
</style>

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
              <!-- Include Bootstrap -->

        <!-- Designation Cards Container -->
        <div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-4 position-relative" ondrop="drop(event, 'ongoing')" ondragover="allowDrop(event)">
            <h6 class="text-center title">
                <b>Ongoing</b>
                <span class="count-box" id="ongoingCount">0</span>
            </h6>
            <hr>
            <div class="status-container" id="ongoingContainer"></div>
            <div class="vertical-divider"></div> <!-- Divider -->
        </div>
        <div class="col-md-4 position-relative" ondrop="drop(event, 'payment')" ondragover="allowDrop(event)">
            <h6 class="text-center title">
                <b>Payment</b>
                <span class="count-box" id="paymentCount">0</span>
            </h6>
            <hr>
            <div class="status-container" id="paymentContainer"></div>
            <div class="vertical-divider"></div> <!-- Divider -->
        </div>
        <div class="col-md-4" ondrop="drop(event, 'newClient')" ondragover="allowDrop(event)">
            <h6 class="text-center title">
                <b>New Client</b>
                <span class="count-box" id="newClientCount">0</span>
            </h6>
            <hr>
            <div class="status-container" id="newClientContainer"></div>
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
    <!-- Modal for Editing -->
    <div class="modal fade" id="editDesignationModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="row no-gutters">
          <!-- Form Section -->
          <div class="col-12 p-3">
            <form id="editDesignationForm">
              <input type="hidden" id="editCardId">
              
              <!-- Title Field -->
              <div class="form-group">
                <label for="editTitleInput"><b>Title:</b></label>
                <input type="text" class="form-control" id="editTitleInput" placeholder="Enter title" required>
              </div>

              <!-- Short Description Field -->
              <div class="form-group">
                <label for="editDescriptionInput"><b>Short Description:</b></label>
                <textarea class="form-control" id="editDescriptionInput" rows="2" placeholder="Enter short description" required></textarea>
              </div>

              <!-- Radio Buttons for Status -->
              <div class="form-group">
                <label><b>Status:</b></label>
                <div class="d-flex flex-wrap justify-content-start align-items-center">
                  <label class="radio-btn">
                    <input type="radio" name="editStatus" value="ongoing" required>
                    <span class="custom-radio ongoing">Ongoing</span>
                  </label>
                  <label class="radio-btn">
                    <input type="radio" name="editStatus" value="payment" required>
                    <span class="custom-radio payment">Payment</span>
                  </label>
                  <label class="radio-btn">
                    <input type="radio" name="editStatus" value="newClient" required>
                    <span class="custom-radio newClient">New Client</span>
                  </label>
                  <!-- Submit Button -->
              <div class="text-center">
                <button type="submit" class="btn submit-btn">Update</button>
              </div>
                </div>
              </div>

              

            </form>
          </div>
        </div>
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
document.getElementById("designationForm").addEventListener("submit", function(event) {
  event.preventDefault();
  
  let title = document.getElementById("titleInput").value.trim();
  let description = document.getElementById("descriptionInput").value.trim();
  let status = document.querySelector('input[name="status"]:checked');

  if (title === "" || !status) return;

  addDesignation(title, description, status.value);
  $("#designationModal").modal("hide");
  document.getElementById("designationForm").reset();
});


function getNextColor() {
  return "rgb(183, 225, 254)"; // Fixed card color
}

function addDesignation(title, description, status) {
  let newCardWrapper = document.createElement("div");
  newCardWrapper.className = "draggable-container";
  let cardId = "card-" + new Date().getTime();
  
  newCardWrapper.innerHTML = `
    <div id="${cardId}" class="card p-2 draggable-card text-center" draggable="true"
         style="background-color: ${getNextColor()};" ondragstart="drag(event)">
        <h6 class="card-title m-1">${title}</h6>
        <p class="card-description">${description}</p>
    </div>
  `;

  let container = document.getElementById(status + "Container");
  container.appendChild(newCardWrapper);

  updateCounts();
}

// Drag and Drop Functionality
function allowDrop(event) {
  event.preventDefault();
}

function drag(event) {
  event.dataTransfer.setData("text", event.target.id);
}

function drop(event, status) {
  event.preventDefault();
  let cardId = event.dataTransfer.getData("text");
  let card = document.getElementById(cardId);
  if (card) {
    document.getElementById(status + "Container").appendChild(card.parentElement);
    updateCounts();
  }
}

// Delete Card when dropped into Trash
document.getElementById("trashIcon").addEventListener("dragover", function(event) {
  event.preventDefault();
});

document.getElementById("trashIcon").addEventListener("drop", function(event) {
  event.preventDefault();
  let cardId = event.dataTransfer.getData("text");
  let card = document.getElementById(cardId);
  if (card) {
    card.parentElement.remove(); // Remove the card wrapper
    updateCounts();
  }
});

// Update the count dynamically
function updateCounts() {
  document.getElementById("ongoingCount").textContent = document.getElementById("ongoingContainer").children.length;
  document.getElementById("paymentCount").textContent = document.getElementById("paymentContainer").children.length;
  document.getElementById("newClientCount").textContent = document.getElementById("newClientContainer").children.length;
}

</script>

<script>
document.addEventListener("click", function(event) {
    if (event.target.closest(".draggable-card")) {
        let card = event.target.closest(".draggable-card");
        let title = card.querySelector(".card-title").textContent;
        let description = card.querySelector(".card-description").textContent;
        let cardId = card.id;
        let parentId = card.parentElement.parentElement.id;

        document.getElementById("editCardId").value = cardId;
        document.getElementById("editTitleInput").value = title;
        document.getElementById("editDescriptionInput").value = description;

        let statusRadios = document.getElementsByName("editStatus");
        statusRadios.forEach(radio => {
            radio.checked = radio.value + "Container" === parentId;
        });

        $("#editDesignationModal").modal("show");
    }
});

document.getElementById("editDesignationForm").addEventListener("submit", function(event) {
    event.preventDefault();
    
    let cardId = document.getElementById("editCardId").value;
    let title = document.getElementById("editTitleInput").value;
    let description = document.getElementById("editDescriptionInput").value;
    let status = document.querySelector('input[name="editStatus"]:checked').value;
    
    let card = document.getElementById(cardId);
    if (card) {
        card.querySelector(".card-title").textContent = title;
        card.querySelector(".card-description").textContent = description;
        document.getElementById(status + "Container").appendChild(card.parentElement);
    }
    
    $("#editDesignationModal").modal("hide");
    updateCounts();
});
</script>

</body>

</html>
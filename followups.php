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
    min-height: 40px;
    width: 250px;
    color: black;
    background-color: var(--card-color);
    border-radius: 10px;
    position: relative;
    transition: transform 0.2s, background-color 0.3s;
    cursor: pointer;
    padding: 8px;
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
    min-height: 40px;
    width: 240px;
    color: black;
    background-color: var(--card-color);
    border-radius: 10px;
    text-align: center;
    padding: 8px;
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
  .col-md-3:last-child .vertical-divider {
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
                   <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
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

              <!-- Dropdown for Status -->
              <div class="form-group">
                <label for="statusSelect"><b>Status:</b></label>
                <select class="form-control" id="statusSelect" required>
                  <option value="ongoing">Ongoing</option>
                  <option value="payment">Payment</option>
                  <option value="new-client">New Client</option>
                </select>
              </div>

              <!-- Dropdown for Assigned To -->
              <div class="form-group">
                <label for="assignedToSelect"><b>Assigned To:</b></label>
                <select class="form-control" id="assignedToSelect" required>
                  <option value="Naveen">Naveen</option>
                  <option value="Mohan">Mohan</option>
                  <option value="Kathir">Kathir</option>
                </select>
              </div>

              <!-- Submit Button -->
              <div class="text-center">
                <button type="submit" class="btn submit-btn">Submit</button>
              </div>

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
                                    src="img/p.png" style="width: 2rem;height: rem;">
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
<!-- Include Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<div class="container-fluid mt-4">
  <!-- Nav Tabs -->
  <ul class="nav nav-pills custom-nav">
    <li class="nav-item">
      <a class="nav-link active" id="all-tab" href="#" onclick="setActiveTab('all')">
        <i class="fas fa-list-ul"></i> All
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="ongoing-tab" href="#" onclick="setActiveTab('ongoing')">
        <i class="fas fa-spinner"></i> Ongoing
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="payment-tab" href="#" onclick="setActiveTab('payment')">
        <i class="fas fa-credit-card"></i> Payment
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="new-client-tab" href="#" onclick="setActiveTab('new-client')">
        <i class="fas fa-user-plus"></i> New Client
      </a>
    </li>
  </ul>

  <!-- Card Containers -->
  <div id="cards-container" class="row mt-4" ondrop="drop(event)" ondragover="allowDrop(event)">
  </div>

  <!-- Custom Styles -->
  <style>
    /* Flag icon in the right corner */
.card-body {
  position: relative; /* Make the parent div relative */
}

.flag-icon {
  position: absolute;
  top: 10px;
  right: -8px;
  float:right;
  font-size: 15px;
  color: #0B3D91; /* You can change the color */
}

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

    /* Card Styling */
    .card {
      margin: 8px;
      padding: 2px; /* Reduce padding */
      width: 100%;
      min-height: 40px; /* Reduce card height */
      font-size: 14px; /* Reduce font size */
      cursor: pointer;
      transition: transform 0.2s ease;
      color: black;
      display: flex;
      align-items: center; /* Center content vertically */
      justify-content: center; /* Center content horizontally */
      text-align: center;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    /* Ensure 4 Cards per Row */
    .card-container {
      flex: 1 1 calc(25% - 16px); /* 4 cards per row */
      max-width: calc(25% - 16px);
    }

    /* Responsive: Adjust cards for smaller screens */
    @media (max-width: 992px) {
      .card-container {
        flex: 1 1 calc(50% - 16px); /* 2 cards per row */
        max-width: calc(50% - 16px);
      }
    }

    @media (max-width: 600px) {
      .card-container {
        flex: 1 1 100%; /* 1 card per row */
        max-width: 100%;
      }
    }

    .card:hover {
      transform: scale(1.05);
    }

    /* Background Colors for Status */
    .card.ongoing {
      background-color: rgb(183, 225, 254);
    }

    .card.new-client {
      background-color: rgb(206, 248, 201);
    }

    .card.payment {
      background-color: rgb(217, 230, 162);
    }

    /* Hide Description & Status Initially */
    .card-text, .card-status {
      display: none;
    }
  </style>
</div>
<script>
  let allCards = []; // Store all cards globally

document.getElementById("designationForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission

    // Capture form data
    const title = document.getElementById("titleInput").value;
    const description = document.getElementById("descriptionInput").value;
    const status = document.getElementById("statusSelect").value; // Get selected status from dropdown
    const assignedTo = document.getElementById("assignedToSelect").value; // Get selected "Assigned To" from dropdown

    // Create card
    const card = createCard(title, description, status, assignedTo);

    // Save card to global array
    allCards.push(card);

    // Append the card to the respective tab section
    appendCardToTab(status, card);

    // Refresh the displayed cards
    refreshCards();

    // Clear form fields after submission
    document.getElementById("designationForm").reset();
});

function createCard(title, description, status, assignedTo) {
  const card = document.createElement("div");
card.classList.add("card", "card-container", "col-12", "col-md-6", "col-lg-3", status);
card.setAttribute('data-status', status); // Add status as data attribute
card.setAttribute('draggable', 'true'); // Make the card draggable
card.setAttribute('id', 'card-' + new Date().getTime()); // Unique ID for the card

card.innerHTML = `
  <div class="card-body" onclick="toggleDetails(this)">
    <span class="flag-icon fas fa-flag"></span> <!-- Add the flag icon here -->
    <p class="card-title">${title}</p>
    <p class="card-text">${description}</p>
    <p class="card-status"><strong>Status:</strong> ${status}</p>
    <p class="card-assigned-to"><strong>Assigned To:</strong> ${assignedTo}</p>
  </div>
`;


    // Add dragstart event
    card.addEventListener('dragstart', dragStart);

    return card;
}

function appendCardToTab(status, card) {
    let container = document.getElementById("cards-container");
    container.appendChild(card);
}

function setActiveTab(tab) {
    const tabs = document.querySelectorAll('.nav-link');
    tabs.forEach(tab => tab.classList.remove('active'));

    const activeTab = document.getElementById(tab + '-tab');
    activeTab.classList.add('active');

    // Refresh displayed cards
    refreshCards();
}

function refreshCards() {
    const activeTab = document.querySelector('.nav-link.active').id.replace('-tab', '');
    const container = document.getElementById("cards-container");
    container.innerHTML = ''; // Clear existing cards

    allCards.forEach(card => {
        if (activeTab === 'all' || card.getAttribute('data-status') === activeTab) {
            container.appendChild(card);
        }
    });
}

function toggleDetails(cardBody) {
    const description = cardBody.querySelector(".card-text");
    const status = cardBody.querySelector(".card-status");
    const assignedTo = cardBody.querySelector(".card-assigned-to");
    if (description.style.display === "none") {
        description.style.display = "block";
        status.style.display = "block";
        assignedTo.style.display = "block";
    } else {
        description.style.display = "none";
        status.style.display = "none";
        assignedTo.style.display = "none";
    }
}

// Drag and Drop Functions
function allowDrop(event) {
    event.preventDefault();
}

function dragStart(event) {
    event.dataTransfer.setData("text", event.target.id); // Save the dragged card's ID
}

function drop(event) {
    event.preventDefault();
    const draggedCardId = event.dataTransfer.getData("text");
    const draggedCard = document.getElementById(draggedCardId);

    // Get the card where the dragged card should be placed
    const dropTarget = event.target.closest('.card-container');

    // If dropTarget is not null and it's not the same card being dropped
    if (dropTarget && dropTarget !== draggedCard) {
        // Move the dragged card to the new position
        dropTarget.parentNode.insertBefore(draggedCard, dropTarget.nextSibling);

        // Update the global card array to reflect the new order
        allCards = Array.from(document.querySelectorAll(".card")).map(card => card);
    }
}

// Add event listeners for the drop zone
document.getElementById("cards-container").addEventListener('dragover', allowDrop);
document.getElementById("cards-container").addEventListener('drop', drop);

</script>

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
<!-- Side Modal for Card Details -->
<div id="sideModal" class="side-modal">
  <div class="side-modal-content">
    <span class="close-btn" onclick="closeModal()">&times;</span>
    <h2 class="modal-title">Edit Card Details</h2>
    <form id="cardEditForm">
      <div class="form-group">
        <label for="editTitle">Title:</label>
        <input type="text" id="editTitle" name="title" required>
      </div>

      <div class="form-group">
        <label for="editDescription">Description:</label>
        <input type="text" id="editDescription" name="description" required>
      </div>

      <div class="form-group">
        <label for="editStatus">Status:</label>
        <select id="editStatus" name="status" required>
          <option value="ongoing">Ongoing</option>
          <option value="new-client">New Client</option>
          <option value="payment">Payment</option>
        </select>
      </div>

      <div class="form-group">
        <label for="editAssignedTo">Assigned To:</label>
        <select id="editAssignedTo" name="assignedTo" required>
          <option value="mohan">Mohan</option>
          <option value="naveen">Naveen</option>
          <option value="kathir">Kathir</option>
        </select>
      </div>

      

      <button type="submit" class="button1">Save Changes</button>
    </form>
  </div>
</div>

<style>
/* Side Modal Container */
.side-modal {
  display: none;
  position: fixed;
  top: 0;
  right: 0;
  width: 500px;
  height: 100%;
  background-color: #ffffff;
  box-shadow: -4px 0 12px rgba(0, 0, 0, 0.15);
  transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
  transform: translateX(100%);
  z-index: 9999;
  opacity: 0;
}

.side-modal.open {
  display: block;
  transform: translateX(0);
  opacity: 1;
}

.side-modal-content {
  padding: 20px;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  background-color: #ffffff;
  border-left: 3px solid rgb(0, 148, 255);
  box-sizing: border-box;
}

.modal-title {
  margin-top: 0;
  font-size: 24px;
  font-weight: 600;
  text-align: center;
  color: #333;
}

.close-btn {
  position: absolute;
  top: 15px;
  right: 20px;
  font-size: 30px;
  cursor: pointer;
  color: #333;
  transition: color 0.3s ease;
}

.close-btn:hover {
  color: #4CAF50;
}

/* Form Styling */
.form-group {
  margin-bottom: 15px;
}

label {
  font-size: 14px;
  color: #666;
  margin-bottom: 5px;
  font-weight: bold;
}

input, select {
  width: 100%;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 8px;
  font-size: 16px;
  color: #333;
  box-sizing: border-box;
  transition: border 0.3s ease;
}

input:focus, select:focus {
  border-color: rgb(0, 148, 255);
  outline: none;
}

/* Row Layout for Added Date and Flag */
.row {
  display: flex;
  justify-content: space-between;
}

.date-container, .flag-container {
  flex: 1;
  margin-right: 15px;
}

.flag-container {
  display: flex;
  align-items: center;
}

.flag-icon input {
  width: 35px;
  height: 35px;
  padding: 0;
  border-radius: 50%;
}

.flag-icon-span {
  margin-left: 10px;
  font-size: 20px;
  cursor: pointer;
  transition: transform 0.3s ease;
}

.flag-icon-span:hover {
  transform: scale(1.2);
}

.button1 {
  background-color: rgb(0, 148, 255);
  color: white;
  border: none;
  padding: 12px 20px;
  font-size: 16px;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
  align-self: center;
}

.button1:hover {
  background-color: rgb(0, 148, 255);
}

.button1:focus {
  outline: none;
}


  /* Style for Side Modal */
.side-modal {
  display: none; /* Hidden by default */
  position: fixed;
  top: 0;
  right: 0;
  width: 500px;
  height: 100%;
  background-color: #ffffff; /* Set background to white */
  box-shadow: -4px 0 12px rgba(0, 0, 0, 0.15);
  transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
  transform: translateX(100%);
  z-index: 9999;
  opacity: 0;
}

.side-modal.open {
  display: block;
  transform: translateX(0);
  opacity: 1;
}

.side-modal-content {
  padding: 20px;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  background-color: #ffffff; /* Set background to white */
  border-left: 3px solid rgb(0, 148, 255);
  box-sizing: border-box;
}

.modal-title {
  margin-top: 0;
  font-size: 24px;
  font-weight: 600;
  text-align: center;
  color: #333;
}

.close-btn {
  position: absolute;
  top: 15px;
  right: 20px;
  font-size: 30px;
  cursor: pointer;
  color: #333;
  transition: color 0.3s ease;
}

.close-btn:hover {
  color: #4CAF50;
}

/* Styling for form group */
.form-group {
  margin-bottom: 15px;
}

label {
  font-size: 14px;
  color: #666;
  margin-bottom: 5px;
  font-weight: bold; /* Make labels bold */
}

input, select {
  width: 100%;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 8px;
  font-size: 16px;
  color: #333;
  box-sizing: border-box;
  transition: border 0.3s ease;
}

input:focus, select:focus {
  border-color: rgb(0, 148, 255);
  outline: none;
}

.button1 {
  background-color: rgb(0, 148, 255);
  color: white;
  border: none;
  padding: 12px 20px;
  font-size: 16px;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
  align-self: center;
}

.button1:hover {
  background-color: rgb(0, 148, 255);
}

.button1:focus {
  outline: none;
}

</style>
<script>
  let currentCard = null; // Track the current card being edited

function toggleDetails(cardBody) {
    // Open modal and populate with card data
    const card = cardBody.closest('.card');
    const title = card.querySelector(".card-title").textContent;
    const description = card.querySelector(".card-text").textContent;
    const status = card.getAttribute("data-status");
    const assignedTo = card.querySelector(".card-assigned-to").textContent.replace('Assigned To: ', '');

    // Fill the modal with the card's data
    document.getElementById("editTitle").value = title;
    document.getElementById("editDescription").value = description;
    document.getElementById("editStatus").value = status;
    document.getElementById("editAssignedTo").value = assignedTo;

    // Set the current card
    currentCard = card;

    // Open the modal
    document.getElementById("sideModal").classList.add("open");
}

// Close the side modal
function closeModal() {
    document.getElementById("sideModal").classList.remove("open");
}

// Handle the form submission (save edited card details)
document.getElementById("cardEditForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission

    // Get the edited values
    const title = document.getElementById("editTitle").value;
    const description = document.getElementById("editDescription").value;
    const status = document.getElementById("editStatus").value;
    const assignedTo = document.getElementById("editAssignedTo").value;

    // Update the current card with the new values
    currentCard.querySelector(".card-title").textContent = title;
    currentCard.querySelector(".card-text").textContent = description;
    currentCard.setAttribute("data-status", status);
    currentCard.querySelector(".card-assigned-to").textContent = `Assigned To: ${assignedTo}`;

    // Close the modal
    closeModal();
});

</script>

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



</body>

</html>
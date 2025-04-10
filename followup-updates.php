<?php
session_start();

if (!isset($_SESSION['username']) && !isset($_SESSION['empUserName'])) {
    header("Location: login.php");
    exit();
}
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
    <?php include ("sidebar.php"); ?>
    
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
    
  

<style>
 
.add{
  background-color:rgb(0, 148, 255); 
  color: white; 
  border-radius: 25px; 
  font-size: 50px;
  padding:8px;
}
  #addAccessBtn{
        background: rgb(238, 153, 129); 
        color: white; 
        padding: 8px;
        font-size: 16px; 
        font-weight: 600; 
        border-radius: 25px; 
        transition: all 0.3s ease-in-out;
        border: none; 
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }
    /* Ensure buttons are responsive */
    .btn-container {
        display: flex;
        flex-direction: column; /* Stack vertically on mobile */
        gap: 10px; /* Space between buttons */
    }

    /* Responsive Button Sizes */
    .plus-button, #addAccessBtn {
        font-size: 16px;
        width: 100%;  /* Full width on smaller screens */
    }

    @media (max-width: 868px) {
        .plus-button, #addAccessBtn {
            width: 100%;  /* Ensure full width on small screens */
            font-size: 10px;  /* Slightly smaller font size */
        }
        .fa-plus{
          font-size:10px
    
        }
    }

    @media (min-width: 768px) {
        .plus-button, #addAccessBtn {
            width: auto;  /* Auto width on larger screens */
            font-size: 14px;
        }
    }
</style>


<style>
    /* Access Button Hover Effect */
    #addAccessBtn:hover {
        background: rgb(255, 105, 0); /* Slightly darker shade */
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    /* Dropdown Container Hover Effect */
    #accessDropdownContainer:hover {
        box-shadow: 0 6px 14px rgba(0, 0, 0, 0.2);
    }

    /* Dropdown Items */
    .employee-checkbox {
        margin-right: 10px;
    }

    .employee-label {
        font-size: 14px;
        font-weight: 500;
        color: #333;
        transition: color 0.3s ease-in-out;
    }

    .employee-label:hover {
        color: rgb(255, 105, 0);
        cursor: pointer;
    }

    /* Dropdown Item Wrapper */
    .dropdown-item-wrapper {
        display: flex;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid #f0f0f0;
        transition: background 0.2s ease-in-out;
    }

    .dropdown-item-wrapper:last-child {
        border-bottom: none;
    }

    /* Highlight on Hover */
    .dropdown-item-wrapper:hover {
        background-color: rgba(255, 105, 0, 0.1);
    }
</style>


<!-- Remove Selected Employees Display -->
<!-- <div id="selectedAccessContainer" class="mt-2">
    <span id="selectedAccess">--Nil--</span>
</div> -->


</div>
<!-- Include Font Awesome for Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">




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
<?php
include 'dbconn.php'; // adjust to your actual DB connection file

$title = $_GET['title'];
$status = $_GET['status'];

$title = mysqli_real_escape_string($conn, $title);
$status = mysqli_real_escape_string($conn, $status);

$sql = "SELECT * FROM followups WHERE title='$title' AND status='$status'";
$result = mysqli_query($conn, $sql);
?>

<div class="container-fluid mt-4">
    <h3 class="section-title"><?= htmlspecialchars($title) . ' - ' . htmlspecialchars(ucfirst($status)) ?></h3>
    <div class="row row-cols-1 row-cols-md-4 g-4" data-masonry='{"percentPosition": true }'>

    <?php
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $dates = explode(',', $row['date']);
        $updates = explode(',', $row['updates']);

        // Use the shorter length to avoid mismatch
        $count = min(count($dates), count($updates));

        for ($i = 0; $i < $count; $i++) {
            $date = trim($dates[$i]);
            $update = trim($updates[$i]);
            echo "
                <div class='col'>
                    <div class='card h-100'>
                        <span class='update-date fw-bold p-2'>$date</span> <br><br>
                        <div class='card-body'>
                            <p class='card-text'>$update</p>
                        </div>
                    </div>
                </div>
            ";
        }
    } else {
        echo "<p class='text-muted'>No updates found for this title and status.</p>";
    }
    ?>
    </div>



<style>


.section-title {
    text-align: center;
    font-size: 22px;
    font-weight: bold;
    color: #222;
    margin-bottom: 20px;
    padding: 10px;
    border-radius: 12px;
}

.custom-card {
    min-height: 180px;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.15);
    border-radius: 20px;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    padding: 15px;
    position: relative;
    overflow: hidden;
    border: none;
    text-align: center;
}

.custom-card:hover {
    transform: translateY(-5px);
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
}

.card-title {
    font-size: 15px;
    font-weight: bold;
    color: #222;
}

.card-text {
    font-size: 14px;
    color: #444;
}

.update-date {
    position: absolute;
    top: 10px;
    right: 10px;
    background: rgba(0, 0, 0, 0.8);
    color: #fff;
    padding: 4px 8px;
    font-size: 10px;
    font-style: italic;
    border-radius: 12px;
    font-weight: bold;
}
</style>



  <!-- Custom Styles -->
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
<style>
/* Card Styles */
.card {
  position: relative; /* Makes absolute positioning work for children */
  box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
  min-height: 40px; /* Ensures consistent height */
  display: flex;
  flex-direction: column;
  justify-content: space-between; /* Ensures spacing */
}
/* Flag Icon - Initially only outlined */
.flag-icon {
  position: absolute;
  top: 5px;
  right: 20px;
  cursor: pointer;
  font-size: 14px;
  padding: 5px;
  color: white; /* Initially transparent */
  background-color: transparent;
}

/* When a color is selected */
.flag-icon.selected {
  color: inherit; /* Fills the icon */
  border-color: inherit; /* Changes outline color */
}

/* Delete Icon - Fixing it to the bottom-right */
/* Delete Icon - Initially Hidden */
.delete-icon {
  position: absolute;
  bottom: 10px;
  right: 10px;
  cursor: pointer;
  font-size: 14px;
  color: red;
  opacity: 0; /* Initially hidden */
  transform: scale(0.5); /* Starts slightly smaller */
  transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
}

/* Show delete icon when hovering over the card */
.card:hover .delete-icon {
  opacity: 1; /* Make it visible */
  transform: scale(1); /* Scale up to normal size */
}

/* Color Picker */
.color-picker {
  display: none;
  position: absolute;
  top: 30px;
  right: 8px;
  background: white;
  padding: 5px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.color-picker span {
  display: inline-block;
  width: 20px;
  height: 20px;
  margin: 3px;
  cursor: pointer;
  border-radius: 5px;
  border: 1px solid #000; /* Ensures visibility */
}
.card-text {
    display: block !important;
}


</style>

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
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
<!-- Side Modal for Card Details -->

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"></script>


</body>

</html>
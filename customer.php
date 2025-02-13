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
<style>
  /* Base styles for the side modal */
.side-modal {
  position: fixed;
  top: 0;
  right: -100%; /* Initially hidden */
  width: 400px;
  height: 100vh;
  background: rgba(15, 29, 64); /* Transparent bluish effect */
  backdrop-filter: blur(10px); /* Glassmorphism effect */
  clip-path: polygon(25% 0%, 100% 0%, 100% 100%, 0% 100%);
  transition: right 0.4s ease-in-out;
  z-index: 1000;
  padding: 10px; /* Reduce padding */
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: -5px 0px 15px rgba(0, 0, 0, 0.3);
}

/* Open state */
.side-modal.open {
  right: 0;
}

/* Modal content */
.modal-content1 {
  position: relative;
  width: 90%; /* Ensure it fits within modal */
  display: flex;
  flex-direction: column;
  align-items: center;
  background: none;
  padding: 5px;
}

/* Close button */
.side-modal .close {
  position: absolute;
  top: 10px;
  right: 15px;
  font-size: 24px;
  cursor: pointer;
  color: white;
  transition: transform 0.3s ease;
}

.side-modal .close:hover {
  transform: rotate(90deg);
}

/* Form styling */
#modalForm1 {
  display: flex;
  flex-direction: column;
  width: 100%; /* Full width */
  align-items: right; /* Center elements */
}

/* Input Fields */
#modalForm1 input {
  width: 100%; /* Full width */
  max-width: 90%; /* Ensure it doesn't overflow */
  margin-bottom: 12px;
  padding: 10px;
  border: 2px solid rgb(255, 255, 255);
  border-radius: 8px;
  background: rgb(255, 255, 255);
  color: rgba(15, 29, 64);
  font-size: 16px;
  transition: border 0.3s ease, box-shadow 0.3s ease;
}

#modalForm1 input:focus {
  border-color: rgb(248, 165, 178);
  box-shadow: 0px 0px 10px rgba(248, 165, 178, 0.5);
  outline: none;
}

#modalForm1 input::placeholder {
  color: rgba(15, 29, 64, 0.6); /* Darker placeholder for visibility */
}

/* Submit Button */
#modalForm1 button {
  background: rgb(248, 165, 178);
  color: white;
  padding: 12px;
  width: 90%;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  font-size: 16px;
  transition: background 0.3s ease, transform 0.2s ease;
}
.modal-content1 {
  padding-left: 30px;
}
.side-modal {
  clip-path: none;
}


#modalForm1 button:hover {
  background: rgb(220, 145, 158);
  transform: scale(1.05);
}
.card-body{
  color:black;
}
</style>
<!-- Modal Styles -->



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
<li class="nav-item  l master active">
    <a class="nav-link k collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo" style="color: white;">
        <i class="fas fa-fw fa-clipboard-list" style="font-size:20px"></i>
        <span><b>Master</b></span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item active" href="customer.php" style="color: white;"><b>Customer</b></a>
            <a class="collapse-item " href="employee.php" style="color: black;"><b>Employee</b></a>
            <a class="collapse-item" href="designation.php" style="color: black;"><b>Designation</b></a>
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
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" style="background:white;">
  <!-- Create Customer Button -->
  <div class="mr-auto d-flex align-items-center pl-3 py-2">
    <h4 class="text-dark font-weight-bold mr-4" 
        style="color: rgb(15,29,64); font-size: medium; margin-top: 5px;">
        Master &gt; Customer Details
    </h4>
    <button class="btn d-flex align-items-center px-3" 
        style="background-color: rgb(15,29,64); color: white; border-radius: 25px;"
        data-toggle="modal" data-target="#customerModal">
      <i class="fas fa-user mr-2"></i> Create Customer
    </button>
  </div>
  
  <!-- (Other topbar items can go here) -->
  
</nav>

<!-- Customer Modal -->
<div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 40%;">
    <div class="modal-content" style="border-radius: 15px;">
      <div class="modal-body p-0">
        <div class="row no-gutters">
          <!-- Left Column: Form -->
          <div class="col-md-10">
            <div class="ml-3 mt-3 mb-3 mr-3">
              <!-- Notice we removed the action and method attributes for client-side handling -->
              <form id="customerForm">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="customerName"><b>Name:</b></label>
                      <input type="text" class="form-control" id="customerName" placeholder="Enter name" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="companyName"><b>Company Name:</b></label>
                      <input type="text" class="form-control" id="companyName" placeholder="Enter company name" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="phoneNumber"><b>Phone Number:</b></label>
                      <input type="text" class="form-control" id="phoneNumber" placeholder="Enter phone number" required>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="customerAddress"><b>Address:</b></label>
                  <textarea class="form-control" id="customerAddress" rows="3" placeholder="Enter address" required></textarea>
                </div>
                <div class="d-flex justify-content-start">
                  <button type="submit" class="btn" style="background-color: rgb(15,29,64); color: white; border-radius: 25px;">
                    Submit
                  </button>
                </div>
              </form>
            </div>
          </div>
          <!-- Right Column: Vertical "CUSTOMER" text -->
          <div class="col-md-2 d-flex align-items-center justify-content-center" style="background-color: rgb(15,29,64); color: white; border-top-right-radius: 14px; border-bottom-right-radius: 14px;">
            <div class="text-center" style="font-size: 36px;font-family:'Apple Chancery',fantacy;font-style:oblique; font-weight: 1000;">
              C<br>
              U<br>
              S<br>
              T<br>
              O<br>
              M<br>
              E<br>
              R
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div id="customerContainer" class="row">
    <!-- Cards will be appended here -->
  </div>
</div>

<!-- Side Modal -->
<div id="sideModal" class="side-modal">
  <div class="modal-content1">
    <form id="modalForm1">
      <input type="hidden" id="editId">
      <input type="text" id="modal-customerName" placeholder="Customer Name" required>
      <input type="text" id="modal-companyName" placeholder="Company Name" required>
      <input type="text" id="modal-phoneNumber" placeholder="Phone Number" required>
      <input type="text" id="modal-customerAddress" placeholder="Customer Address" required>
      <button type="submit" id="submitBtn">Submit</button>
    </form>
  </div>
</div>




<!-- jQuery, Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- jQuery and your script -->
<script>
  $(document).ready(function(){
  var submissionCount = localStorage.getItem('submissionCount') ? parseInt(localStorage.getItem('submissionCount')) : 0;

  // Handle new customer addition
  $('#customerForm').on('submit', function(e){
    e.preventDefault();

    var customerName = $('#customerName').val();
    var companyName = $('#companyName').val();
    var phoneNumber = $('#phoneNumber').val();
    var customerAddress = $('#customerAddress').val();

    submissionCount++;
    localStorage.setItem('submissionCount', submissionCount);

    var cardColors = ['rgb(248,165,178)', 'rgb(137,217,226)', 'orange'];
    var cardColor = cardColors[(submissionCount - 1) % 3];

    var cardHTML = `
      <div class="col-md-3 mt-3">
        <div class="card p-3" data-id="${submissionCount}" style="background-color: ${cardColor}; border-radius: 10px; cursor: pointer;">
          <div class="card-body">
            <h6 class="card-text"><span class="customer-name">${customerName}</span></h6>
            <h6 class="card-text"><strong> <span class="company-name">${companyName}</span></strong></h6>
          </div>
        </div>
      </div>
    `;

    $('#customerContainer').append(cardHTML);
    localStorage.setItem('customer_hidden_' + submissionCount, JSON.stringify({ 
      name: customerName, 
      company: companyName, 
      phone: phoneNumber, 
      address: customerAddress 
    }));

    $('#customerForm')[0].reset();
  });

  // Open Edit Modal
  $('#customerContainer').on('click', '.card', function(){
    var cardId = $(this).data('id');
    var data = localStorage.getItem('customer_hidden_' + cardId);

    if(data) {
      var details = JSON.parse(data);
      $('#editId').val(cardId);
      $('#modal-customerName').val(details.name);
      $('#modal-companyName').val(details.company);
      $('#modal-phoneNumber').val(details.phone);
      $('#modal-customerAddress').val(details.address);
      $('#submitBtn').text('Update');
      $('#sideModal').addClass('open');
    }
  });

  // Handle edit form submission
  $('#modalForm1').on('submit', function(e){
    e.preventDefault();

    var editId = $('#editId').val();
    var customerName = $('#modal-customerName').val();
    var companyName = $('#modal-companyName').val();
    var phoneNumber = $('#modal-phoneNumber').val();
    var customerAddress = $('#modal-customerAddress').val();

    if(editId) {
      var card = $(`.card[data-id="${editId}"]`);
      card.find('.customer-name').text(customerName);
      card.find('.company-name').text(companyName);

      localStorage.setItem('customer_hidden_' + editId, JSON.stringify({
        name: customerName, 
        company: companyName, 
        phone: phoneNumber, 
        address: customerAddress 
      }));

      $('#modalForm1')[0].reset();
      $('#submitBtn').text('Submit');
      $('#sideModal').removeClass('open');
    }
  });

  // Close Side Modal
  $('#sideModal').on('click', '.close', function(){
    $('#sideModal').removeClass('open');
    $('#modalForm1')[0].reset();
    $('#submitBtn').text('Submit');
    $('#editId').val('');
  });

  $('#sideModal').on('click', function(e) {
    if ($(e.target).is('#sideModal')) {
      $('#sideModal').removeClass('open');
    }
  });
});

</script>
            <!-- End of Main Content -->

            <!-- Footer -->
           
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
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

</body>

</html>
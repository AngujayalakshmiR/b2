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
<li class="nav-item l" style="padding:0px;">
    <a class="nav-link k" href="followups.php" style="color: white;">
        <i class="fas fa-fw fa-comment-dots" style="font-size:16px"></i>
        <span>FollowUps</span>
    </a>
</li>
<!-- Divider -->
<div class="sidebar-divider" style="margin-bottom: 3px;"></div>
<!-- Nav Item - Master -->
<li class="nav-item l active master">
    <a class="nav-link k collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo" style="color: white;">
        <i class="fas fa-fw fa-clipboard-list" style="font-size:16px"></i>
        <span>Master</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item " href="customer.php" style="color: black;">Customer</a>
            <a class="collapse-item active" href="employee.php" style="color: white;">Employee</a>
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
    <h4 class="text-dark font-weight-bold mr-3" 
        style="color: rgb(15,29,64); margin-top: 5px;">
        Master &gt; Employee Details
    </h4>

</div>




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
                <div class="container mb-4 mt-4" style="background: white; border-radius: 25px; border: 2px solid rgb(0, 148, 255);">
<div class="column">
    <div class="row">
        <!-- Left Section (20% width for the button) -->
       
        <!-- Right Section (80% width for form fields) -->
        <div class="col-md-12">
            <form id="customerForm" class="row g-3 mt-3">
                <!-- Column 1: Name & Company Name -->
                <div class="col-md-3 pb-1">
                    <input type="text" class="form-control mb-2" id="employeename" placeholder="Enter Employee Name">
                    <select class="form-control mb-2" id="designation">
    <option value="">Select Designation</option>
    <option value="web_developer">Web Developer</option>
    <option value="ui_ux_designer">UI/UX Designer</option>
    <option value="mobile_app_designer">Mobile App Designer</option>
</select>

                    <input type="text" class="form-control mb-2" id="employeephnno" placeholder="Enter Phone Number">
                </div>

                <!-- Column 2: Address & District -->
                <div class="col-md-3 pb-1">
                    <textarea class="form-control mb-2" id="customeraddress" placeholder="Enter Company Address" rows="2" style="height: 85px;"></textarea>
                    <!-- Country -->
                    <select class="form-control mb-2" id="country">
                        <option value="">Select Country</option>
                    </select>
                </div>

                <!-- Column 3: State & Country -->
                <div class="col-md-2 pb-1">
                    <!-- State (Dropdown for India, Manual for other countries) -->
                    <select class="form-control mb-2 d-none" id="stateDropdown">
                        <option value="">Select State</option>
                    </select>

                    <input type="text" class="form-control mb-2" id="stateInput" placeholder="Enter State">
                    <!-- District (Dropdown for India, Manual for other countries) -->
                    <select class="form-control mb-2 d-none" id="districtDropdown">
                        <option value="">Select District</option>
                    </select>
                    <input type="text" class="form-control mb-2" id="districtInput" placeholder="Enter District">
                    <input type="text" class="form-control mb-2" id="pincode" placeholder="Enter Pincode">
                </div>
               <!-- Column 4: File Uploads & Credentials -->
        <div class="col-md-4 pb-1">
        <div class="row"> 
    <!-- File Upload Section -->
    <div class="col-md-4 col-sm-6 pb-2">
        <div class="form-group">
            <label for="employeePhoto" class="upload-label d-block font-weight-bold" style="margin-bottom: 0px;">
                <i id="photoIcon" class="fas fa-camera-retro fa-lg" style="text-align: center; display: block; cursor: pointer;margin-bottom: 8px;color: rgb(222, 141, 197);"></i>
                <p class="mt-1" style="font-size: 14px; text-align:center;margin-bottom: 5px;">Upload Photo</p>
            </label>
            <input type="file" class="form-control-file d-none" id="employeePhoto" onchange="updateIcon(this, 'photoIcon', 'photoFileName')">
            <p class="file-name text-muted" id="photoFileName" style="font-size: 14px; text-align:center;">No file chosen</p>
        </div>
    </div>

    <div class="col-md-4 col-sm-6 pb-2">
        <div class="form-group">
            <label for="aadharCard" class="upload-label d-block font-weight-bold" style="margin-bottom: 0px;">
                <i id="aadharIcon" class="fas fa-id-card fa-lg " style="text-align: center; display: block; cursor: pointer;margin-bottom: 8px;color: rgb(140, 221, 130);"></i>
                <p class="mt-1" style="font-size: 14px; text-align:center;margin-bottom: 5px;">Upload Aadhar</p>
            </label>
            <input type="file" class="form-control-file d-none" id="aadharCard" onchange="updateIcon(this, 'aadharIcon', 'aadharFileName')">
            <p class="file-name text-muted" id="aadharFileName" style="font-size: 14px; text-align:center;">No file chosen</p>
        </div>
    </div>

    <div class="col-md-4 col-sm-12 pb-2">
        <div class="form-group">
            <label for="panCard" class="upload-label d-block font-weight-bold" style="margin-bottom: 0px;">
                <i id="panIcon" class="fas fa-id-badge fa-lg " style="text-align: center; display: block; cursor: pointer;margin-bottom: 8px;color: rgb(246, 185, 114);"></i>
                <p class="mt-1" style="font-size: 14px; text-align:center; margin-bottom: 5px;">Upload Pan</p>
            </label>
            <input type="file" class="form-control-file d-none" id="panCard" onchange="updateIcon(this, 'panIcon', 'panFileName')">
            <p class="file-name text-muted" id="panFileName" style="font-size: 14px; text-align:center;">No file chosen</p>
        </div>
    </div>
</div>



            <!-- Username and Password Section -->
            <div class="row">
                <div class="col-sm-6 pb-2">
                    <input type="text" class="form-control" id="username" placeholder="Enter Username">
                </div>
                <div class="col-sm-6 pb-2">
                    <input type="password" class="form-control" id="password" placeholder="Enter Password">
                </div>
            </div>
        </div>

            </form>
        </div>
    </div></div>
    <div class="column">
    <div class="pb-2 d-flex justify-content-sm-end justify-content-center align-items-center">
    <button type="submit" class="btn" id="customerbtn" 
        style="background: rgb(0, 148, 255); border-radius: 25px; color: white; width: auto;">
        <i class="fas fa-users"></i>&nbsp; Add Employee
    </button>
</div>

</div>

</div>
<script>
  

    function updateIcon(input, iconId, fileNameId) {
    var fileName = input.files.length > 0 ? input.files[0].name : "No file chosen";
    document.getElementById(fileNameId).textContent = fileName;

    // Change icon to green check mark if a file is selected
    var icon = document.getElementById(iconId);
    if (input.files.length > 0) {
        icon.className = "fas fa-check-circle fa-lg text-success";
    } else {
        // Reset to original icon if no file is selected
        if (iconId === "photoIcon") {
            icon.className = "fas fa-camera-retro fa-lg text-primary";
        } else if (iconId === "aadharIcon") {
            icon.className = "fas fa-id-card fa-lg text-success";
        } else if (iconId === "panIcon") {
            icon.className = "fas fa-id-badge fa-lg text-danger";
        }
    }
}

// List of states and districts for India
const statesAndDistricts = {
   "Andhra Pradesh": ["Visakhapatnam", "Vijayawada", "Guntur", "Nellore", "Kurnool", "Chittoor", "Anantapur", "East Godavari", "West Godavari", "Prakasam", "Srikakulam", "Kadapa", "Krishna", "Rayalaseema"],
"Arunachal Pradesh": ["Itanagar", "Tawang", "Ziro", "Pasighat", "West Kameng", "East Kameng", "Lower Subansiri", "Upper Subansiri", "West Siang", "East Siang", "Lohit", "Namsai"],
"Assam": ["Guwahati", "Silchar", "Dibrugarh", "Tezpur", "Jorhat", "Nagaon", "Barpeta", "Bongaigaon", "Karimganj", "Sonitpur", "Sivasagar", "Cachar", "Kokrajhar", "Morigaon"],
"Bihar": ["Patna", "Gaya", "Muzaffarpur", "Bhagalpur", "Darbhanga", "Purnia", "Nalanda", "Samastipur", "Begusarai", "Saran", "Vaishali", "Madhubani", "Katihar", "Araria"],
"Chhattisgarh": ["Raipur", "Bilaspur", "Durg", "Korba", "Jagdalpur", "Rajnandgaon", "Surguja", "Koriya", "Raigarh", "Jashpur"],
"Goa": ["North Goa", "South Goa"],
"Gujarat": ["Ahmedabad", "Surat", "Vadodara", "Rajkot", "Gandhinagar", "Bhavnagar", "Jamnagar", "Anand", "Kutch", "Sabarkantha", "Patan", "Junagadh"],
"Haryana": ["Gurugram", "Faridabad", "Panipat", "Ambala", "Hisar", "Karnal", "Rewari", "Sonipat", "Fatehabad", "Sirsa", "Jhajjar"],
"Himachal Pradesh": ["Shimla", "Kullu", "Manali", "Dharamshala", "Solan", "Mandi", "Kangra", "Bilaspur", "Hamirpur", "Kullu", "Una", "Chamba"],
"Jharkhand": ["Ranchi", "Jamshedpur", "Dhanbad", "Bokaro", "Hazaribagh", "Dumka", "Giridih", "Jamtara", "Deoghar", "Ramgarh"],
"Karnataka": ["Bengaluru", "Mysore", "Hubli", "Mangalore", "Belagavi", "Tumkur", "Udupi", "Dakshina Kannada", "Hassan", "Kodagu", "Bijapur", "Bidar", "Chikkaballapur", "Chikkamagaluru"],
"Kerala": ["Thiruvananthapuram", "Kochi", "Kozhikode", "Thrissur", "Kottayam", "Malappuram", "Palakkad", "Ernakulam", "Kollam", "Pathanamthitta", "Alappuzha", "Idukki"],
"Madhya Pradesh": ["Bhopal", "Indore", "Gwalior", "Jabalpur", "Ujjain", "Sagar", "Katni", "Khandwa", "Hoshangabad", "Rewa", "Satna", "Dewas", "Vidisha"],
"Maharashtra": ["Mumbai", "Pune", "Nagpur", "Nashik", "Thane", "Aurangabad", "Kolhapur", "Solapur", "Nanded", "Amravati", "Chandrapur", "Jalna"],
"Manipur": ["Imphal", "Churachandpur", "Thoubal", "Bishnupur", "Ukhrul", "Senapati", "Tamenglong", "Chandel", "Kangpokpi"],
"Meghalaya": ["Shillong", "Tura", "Jowai", "Nongstoin", "East Khasi Hills", "West Khasi Hills", "Ri Bhoi", "South West Khasi Hills"],
"Mizoram": ["Aizawl", "Lunglei", "Champhai", "Serchhip", "Kolasib", "Mamit"],
"Nagaland": ["Kohima", "Dimapur", "Mokokchung", "Tuensang", "Mon", "Peren", "Wokha"],
"Odisha": ["Bhubaneswar", "Cuttack", "Puri", "Sambalpur", "Rourkela", "Berhampur", "Bargarh", "Ganjam", "Balasore", "Dhenkanal"],
"Punjab": ["Amritsar", "Ludhiana", "Patiala", "Jalandhar", "Bathinda", "Mohali", "Gurdaspur", "Firozpur", "Mansa", "Sangrur"],
"Rajasthan": ["Jaipur", "Udaipur", "Jodhpur", "Kota", "Ajmer", "Bikaner", "Sikar", "Alwar", "Bharatpur", "Pali"],
"Sikkim": ["Gangtok", "Namchi", "Mangan", "Gyalshing"],
"Tamil Nadu": ["Chennai", "Coimbatore", "Madurai", "Tiruchirappalli", "Salem", "Vellore", "Tirunelveli", "Erode", "Dindigul", "Karur", "Tanjore", "Thoothukudi", "Kanyakumari", "Cuddalore", "Villupuram", "Theni", "Ramanathapuram", "Nilgiris", "Virudhunagar", "Perambalur", "Krishnagiri", "Ariyalur", "Namakkal", "Pudukottai", "Sivaganga"],
"Telangana": ["Hyderabad", "Warangal", "Karimnagar", "Nizamabad", "Khammam", "Mahabubnagar", "Adilabad", "Nalgonda", "Rangareddy", "Medak"],
"Tripura": ["Agartala", "Udaipur", "Dharmanagar", "Kailashahar"],
"Uttar Pradesh": ["Lucknow", "Kanpur", "Varanasi", "Noida", "Agra", "Meerut", "Ghaziabad", "Allahabad", "Bareilly", "Aligarh", "Moradabad", "Saharanpur", "Firozabad", "Muzaffarnagar"],
"Uttarakhand": ["Dehradun", "Haridwar", "Nainital", "Almora", "Udham Singh Nagar", "Pauri Garhwal", "Tehri Garhwal", "Champawat"],
"West Bengal": ["Kolkata", "Darjeeling", "Siliguri", "Howrah", "Asansol", "Durgapur", "Malda", "Purulia", "Bankura", "Nadia"],
"Andaman and Nicobar Islands": ["Port Blair"],
"Chandigarh": ["Chandigarh"],
"Dadra and Nagar Haveli and Daman and Diu": ["Daman", "Diu", "Silvassa"],
"Lakshadweep": ["Kavaratti"],
"Delhi": ["Central Delhi", "East Delhi", "South Delhi", "West Delhi"],
"Puducherry": ["Pondicherry", "Karaikal", "Mahe", "Yanam"],
"Jammu and Kashmir": ["Srinagar", "Jammu", "Anantnag", "Baramulla", "Kupwara", "Poonch", "Rajouri", "Kathua"],
"Ladakh": ["Leh", "Kargil"]

};

// List of all 195 countries
const countries = [
    "India", "United States", "United Kingdom", "Canada", "Australia", "Germany", "France", "China", "Japan", "Brazil",
    "Russia", "South Korea", "Italy", "Spain", "Mexico", "Indonesia", "Netherlands", "Saudi Arabia", "Turkey", "Switzerland",
    "South Africa", "Sweden", "Argentina", "Poland", "Belgium", "Norway", "Thailand", "Ireland", "Austria", "Singapore",
    "New Zealand", "Denmark", "Finland", "Malaysia", "Portugal", "Greece", "Czech Republic", "Israel", "United Arab Emirates",
    "Vietnam", "Hungary", "Philippines", "Colombia", "Pakistan", "Chile", "Bangladesh", "Egypt", "Nigeria", "Ukraine",
    "Peru", "Venezuela", "Kazakhstan", "Romania", "Algeria", "Ecuador", "Iraq", "Morocco", "Slovakia", "Belarus", "Serbia",
    "Sri Lanka", "Croatia", "Lithuania", "Bulgaria", "Tunisia", "Slovenia", "Jordan", "Paraguay", "Uruguay", "Lebanon",
    "Georgia", "Azerbaijan", "Panama", "Armenia", "Oman", "Bolivia", "Myanmar", "Luxembourg", "Cuba", "Sudan", "Afghanistan",
    "Nepal", "Honduras", "Costa Rica", "North Macedonia", "Estonia", "El Salvador", "Cyprus", "Jamaica", "Latvia", "Bahrain",
    "Trinidad and Tobago", "Iceland", "Botswana", "Namibia", "Mauritius", "Montenegro", "Moldova", "Zambia", "Ethiopia",
    "Ghana", "Senegal", "Cameroon", "Madagascar", "Tanzania", "Kenya", "Mozambique", "Fiji", "Malta", "Bosnia and Herzegovina",
    "Gabon", "Burkina Faso", "Benin", "Guatemala", "Laos", "Papua New Guinea", "Uganda", "Mongolia", "Brunei", "Togo", "Nicaragua",
    "Seychelles", "Congo", "Malawi", "Suriname", "Maldives", "Somalia", "Eswatini", "Bhutan", "Guyana", "Belize", "Chad",
    "Burundi", "Mauritania", "Sierra Leone", "Lesotho", "Guinea", "Djibouti", "Comoros", "Liberia", "Saint Lucia", "Saint Vincent",
    "Grenadines", "Sao Tome and Principe", "Samoa", "Solomon Islands", "Vanuatu", "Gambia"
];

// Populate Country Dropdown
let countryDropdown = document.getElementById("country");
countries.forEach(country => {
    let option = document.createElement("option");
    option.value = country;
    option.textContent = country;
    countryDropdown.appendChild(option);
});

// Populate State Dropdown (for India)
let stateDropdown = document.getElementById("stateDropdown");
for (let state in statesAndDistricts) {
    let option = document.createElement("option");
    option.value = state;
    option.textContent = state;
    stateDropdown.appendChild(option);
}

// Handle State Selection
stateDropdown.addEventListener("change", function() {
    let selectedState = this.value;
    let districtDropdown = document.getElementById("districtDropdown");
    districtDropdown.innerHTML = '<option value="">Select District</option>';

    if (selectedState && statesAndDistricts[selectedState]) {
        statesAndDistricts[selectedState].forEach(district => {
            let option = document.createElement("option");
            option.value = district;
            option.textContent = district;
            districtDropdown.appendChild(option);
        });
    }
});

// Handle Country Selection
countryDropdown.addEventListener("change", function() {
    let country = this.value;
    let stateDropdown = document.getElementById("stateDropdown");
    let stateInput = document.getElementById("stateInput");
    let districtDropdown = document.getElementById("districtDropdown");
    let districtInput = document.getElementById("districtInput");

    if (country === "India") {
        stateDropdown.classList.remove("d-none");
        stateInput.classList.add("d-none");
        districtDropdown.classList.remove("d-none");
        districtInput.classList.add("d-none");
    } else {
        stateDropdown.classList.add("d-none");
        stateInput.classList.remove("d-none");
        districtDropdown.classList.add("d-none");
        districtInput.classList.remove("d-none");
    }
});
</script>
                    
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <p class="m-0" style="font-size: 16px;color:rgb(23, 25, 28);font-style: normal;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    color: rgb(23, 25, 28);
    font-size: 16px;
    font-weight: 500;"><b>Employee Details</b> 
        <span class="header-counter">3</span>  <!-- Counter next to heading -->
</p>
                        </div>
                        <div class="card-body" style="padding: 20px;">
                            <div class="table-responsive ">
                            <table class="table text-center" id="dataTable" width="100%">
                            <colgroup>
        <col style="width: 5%;">  <!-- S.no -->
        <col style="width: 8%;">  <!-- Name -->
        <col style="width: 12%;">  <!-- Company -->
        <col style="width: 12%;">  <!-- Title -->
        <col style="width: 12%;">  <!-- Total Days (Adjusted) -->
        <col style="width:5%;">  <!-- Description -->
        <col style="width: 5%;">  <!-- Total Hrs (Adjusted) -->
        <col style="width: 5%;">  <!-- Actual Hrs (Adjusted) -->
        <col style="width: 10%;">  <!-- Status -->
    </colgroup>
                            <thead>
              <tr style="font-family:calibri;">
              <th>S.no</th>
                                            <th>Name</th>
                                            <th>Designation</th>
                                            <th>Ph No</th>
                                            <th>Address</th>
                                            <th>Photo</th>
                                            <th>Aadhar</th>
                                            <th>Pan</th>
                                            <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
              <td>1</td>
                                            <td>JayaVarshini</td>
                                            <td>App Developer</td>
                                            <td>1234567890</td>
                                            <td>No.123, Nehru Nagar, Karur-639006, Tamil Nadu, India</td>
                <td>
                                                <i class="fas fa-camera-retro photo-icon" title="Photo" style="color: rgb(222, 141, 197);"></i>
                                            </td>
                                            <td>
                                                <i class="fas fa-id-card aadhar-icon" title="Aadhar Card" style="color: rgb(140, 221, 130);"></i>
                                            </td>
                                            <td>
                                                <i class="fas fa-id-badge pan-icon" title="Pan Card" style="color: rgb(246, 185, 114);"></i>
                                            </td>
                                            <td class="action-buttons">
                                                <button class="btn-action btn-edit"><i class="fas fa-edit"></i></button>
                                                <button class="btn-action btn-delete" ><i class="fas fa-trash-alt" style="color: rgb(238, 153, 129);"></i></button>
                                            </td>
              </tr>
              <tr>
              <td>2</td>
                                            <td>Suriya</td>
                                            <td>Full Stack Developer</td>
                                            <td>9876543210</td>
                                            <td>No.143, Vijaya Street, Chennai-5, Tamil Nadu, India</td>
                <td>
                                                <i class="fas fa-camera-retro photo-icon" title="Photo" style="color: rgb(222, 141, 197);"></i>
                                            </td>
                                            <td>
                                                <i class="fas fa-id-card aadhar-icon" title="Aadhar Card" style="color: rgb(140, 221, 130);"></i>
                                            </td>
                                            <td>
                                                <i class="fas fa-id-badge pan-icon" title="Pan Card" style="color: rgb(246, 185, 114);"></i>
                                            </td>
                                            <td class="action-buttons">
                                                <button class="btn-action btn-edit"><i class="fas fa-edit"></i></button>
                                                <button class="btn-action btn-delete"><i class="fas fa-trash-alt" style="color: rgb(238, 153, 129);"></i></button>
                                            </td>
              </tr>
              <tr>
                                            <td>3</td>
                                            <td>Mohan</td>
                                            <td>UI / UX Designer</td>
                                            <td>4567891234</td>
                                            <td>No.11/A, Sengunthar Nagar, Karur-639006, Tamil Nadu, India</td>
                                            <td>
                                                <i class="fas fa-camera-retro photo-icon" title="Photo" style="color: rgb(222, 141, 197);"></i>
                                            </td>
                                            <td>
                                                <i class="fas fa-id-card aadhar-icon" title="Aadhar Card" style="color: rgb(140, 221, 130);"></i>
                                            </td>
                                            <td>
                                                <i class="fas fa-id-badge pan-icon" title="Pan Card" style="color: rgb(246, 185, 114);"></i>
                                            </td>
                                            <td class="action-buttons">
                                                <button class="btn-action btn-edit"><i class="fas fa-edit"></i></button>
                                                <button class="btn-action btn-delete"><i class="fas fa-trash-alt" style="color: rgb(238, 153, 129);"></i></button>
                                            </td>
                                        </tr>
            </tbody>
</table>
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
    function updateFileName(input, fileNameId) {
        const fileInput = input.files[0];
        
        // Ensure the input has a file
        const fileNameElement = document.getElementById(fileNameId);
        
        if (fileInput) {
            fileNameElement.textContent = fileInput.name;
            // Change the color to red when a file is uploaded
            fileNameElement.style.color = 'red';
        } else {
            fileNameElement.textContent = "No file chosen";
            // Reset the color if no file is selected
            fileNameElement.style.color = 'initial';
        }

        // Add bounce animation to the icon
        const icon = input.previousElementSibling.querySelector(".upload-icon");
        icon.classList.add("bounce");

        // Remove animation after it plays once
        setTimeout(() => {
            icon.classList.remove("bounce");
        }, 500);
    }
</script>
</body>

</html>
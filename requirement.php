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
thead{
    color:black;
}
#dataTable th:nth-child(1), #dataTable td:nth-child(1) { width: 3%; }  /* S.no */
    #dataTable th:nth-child(2), #dataTable td:nth-child(2) { width: 10%; } /* Date */
    #dataTable th:nth-child(3), #dataTable td:nth-child(3) { width: 10%; } /* Company */
    #dataTable th:nth-child(4), #dataTable td:nth-child(4) { width: 18%; } /* Project Title */
    #dataTable th:nth-child(5), #dataTable td:nth-child(5) { width: 10%; }  /* Project Type */
    #dataTable th:nth-child(6), #dataTable td:nth-child(6) { width: 10%; } /* Description */
    #dataTable th:nth-child(7), #dataTable td:nth-child(7) { width: 11%; } /* Total days */
    #dataTable th:nth-child(7), #dataTable td:nth-child(7) { width: 11%; } /* Working days */
    #dataTable th:nth-child(8), #dataTable td:nth-child(8) { width: 15%; } /* Teammates */

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


html, body {
    height: 100%;
    margin: 0;
}

#wrapper {
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* Full viewport height */
}

#content-wrapper {
    flex: 1; /* Pushes the footer down */
    display: flex;
    flex-direction: column;
}

#content {
    flex: 1; /* Ensures content takes up remaining space */
}

.sticky-footer {
    margin-top: auto; /* Pushes footer to the bottom */
}


/* First container (Button Holder) */
.button-container {
    height: 10vh; /* 10% of viewport height */
    overflow-x: auto; /* Horizontal scrolling */
    overflow-y: hidden; /* Hides vertical scroll */
    white-space: nowrap; /* Keeps items in a single row */
    padding: 10px;
    background: #f8f9fa; /* Light background */
    scrollbar-width: thin; /* Makes scrollbar thin for Firefox */
    scrollbar-color: rgb(15, 29, 64) transparent; /* Dark blue color */
}

/* Custom Scrollbar for Chrome, Edge, Safari */
.button-container::-webkit-scrollbar {
    height: 4px; /* Thin scrollbar */
}

.button-container::-webkit-scrollbar-track {
    background: transparent; /* No background */
}

.button-container::-webkit-scrollbar-thumb {
    background: rgb(15, 29, 64); /* Dark blue scrollbar */
    border-radius: 5px;
}




</style>
<style>
        /* Container for requirement boxes */
        .file-container {
            overflow-x: auto; /* Horizontal scrolling */
            overflow-y: hidden; /* No vertical scroll */
            white-space: nowrap;
            padding: 15px;
            background: #f8f9fa;
            scrollbar-width: thin;
            scrollbar-color: rgb(73, 161, 255) transparent;
        }

        /* Custom scrollbar for Chrome, Edge, Safari */
        .file-container::-webkit-scrollbar {
            height: 6px; /* Thicker scrollbar */
        }
        .file-container::-webkit-scrollbar-track {
            background: #ddd;
            border-radius: 5px;
        }
        .file-container::-webkit-scrollbar-thumb {
            background: rgb(15, 29, 64);
            border-radius: 5px;
        }

        /* Flexbox for boxes */
        .file-wrapper {
            display: flex;
            gap: 15px; /* Space between boxes */
            flex-wrap: nowrap; /* No wrapping */
        }

        /* Styling for each requirement file box */
        .file-box {
            width: 380px; /* Increased width */
            height: 150px; /* Increased height */
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px;
            color: white;
            font-size: 16px;
            border-radius: 10px;
            cursor: pointer;
            box-shadow: 3px 3px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s;
        }
        .file-box:hover {
            transform: scale(1.05);
        }

        /* Colors for the first four unique boxes */
        .file-box:nth-child(4n+1) { background:rgb(254, 115, 84); } /* Red */
        .file-box:nth-child(4n+2) { background:rgb(86, 192, 111); } /* Green */
        .file-box:nth-child(4n+3) { background:rgb(73, 161, 255); } /* Blue */
        .file-box:nth-child(4n+4) { background:rgb(255, 207, 63); } /* Yellow */

        /* Graphic design image */
        .file-box:nth-child(4n+1) .file-img  {
            width: 180px;
            height: 180px;
            background: url('img/graphicimg.png') no-repeat center;
            background-size: contain;
            border-radius: 5px;
        }
        .file-box:nth-child(4n+2) .file-img {
            width: 190px;
            height: 190px;
            background: url('img/graphicimg1.png') no-repeat center;
            background-size: contain;
            border-radius: 5px;
        }
        .file-box:nth-child(4n+3) .file-img  {
            width: 180px;
            height: 190px;
            background: url('img/graphicimg2.jpg') no-repeat center;
            background-size: contain;
            border-radius: 5px;
        }
        .file-box:nth-child(4n+4) .file-img {
            width: 150px;
            height: 150px;
            background: url('img/graphicimg4.jpg') no-repeat center;
            background-size: contain;
            border-radius: 5px;
        }


    .delete-btn {
        position: absolute;
        top: 10px;
        left: 10px;
        background: white;
        color: red;
        font-size: 14px;
        padding: 5px;
        border-radius: 50%;
        cursor: pointer;
        display: none;
    }

    .file-box:hover .delete-btn {
        display: block;
    }

    .file-link {
        color: white;
        text-decoration: none;
    }
    </style>
</head>



<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
   
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-2 static-top shadow" style=" background:white">


<div class="mr-auto d-flex align-items-center pl-3 py-2">
    <h4 class="text-dark font-weight-bold mr-4" style="color: rgb(15,29,64); margin-top: 5px;">
        Project Requirements
    </h4>
</div>


<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">
<div class="d-flex justify-content-between align-items-center mb-2">
<a href="#" id="addFileBtn" class="btn" style="background: rgb(81, 172, 246); font-size: 15px; color: white;">
    <i class="fas fa-folder-plus"></i> &nbsp; Add File
</a>
<input type="file" id="fileInput" accept=".pdf, .jpg, .jpeg, .png, .doc, .docx, .ppt, .pptx">


    </div>
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
                
    <div class="container-fluid" style="padding-left: 5px;padding-right:15px;">
    <div class="file-container">
        <div class="file-wrapper" id="fileWrapper">
            <!-- Files will be dynamically added here -->
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
    const fileWrapper = document.getElementById("fileWrapper");
    const fileInput = document.getElementById("fileInput");
    const addFileBtn = document.getElementById("addFileBtn");

    // Load files from local storage (Only filenames, because actual files are stored in "b2" folder)
    let storedFiles = JSON.parse(localStorage.getItem("uploadedFiles")) || [];

    function renderFiles() {
    fileWrapper.innerHTML = ""; // Clear existing files

    storedFiles.forEach((fileName, index) => {
        let fileBox = document.createElement("div");
        fileBox.classList.add("file-box");

        // Create an image container for styling
        let fileImg = document.createElement("div");
        fileImg.classList.add("file-img");

        fileBox.innerHTML = `
            <div class="delete-btn" onclick="deleteFile('${fileName}')">❌</div>
            <a href="b2/${fileName}" target="_blank" class="file-link">
                <b>Requirement ${index + 1}</b>
            </a>
        `;

        // Append the image container
        fileBox.appendChild(fileImg);
        fileWrapper.appendChild(fileBox);
    });
}


    addFileBtn.addEventListener("click", () => fileInput.click());

    fileInput.addEventListener("change", (event) => {
        const file = event.target.files[0];

        if (file) {
            let formData = new FormData();
            formData.append("file", file);

            fetch("upload.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    storedFiles.push(data.filename);
                    localStorage.setItem("uploadedFiles", JSON.stringify(storedFiles));
                    renderFiles();
                } else {
                    alert("File upload failed!");
                }
            })
            .catch(error => console.error("Error:", error));
        }
    });

    function deleteFile(fileName) {
        fetch(`delete.php?file=${fileName}`, { method: "GET" })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                storedFiles = storedFiles.filter(name => name !== fileName);
                localStorage.setItem("uploadedFiles", JSON.stringify(storedFiles));
                renderFiles();
            } else {
                alert("File deletion failed!");
            }
        })
        .catch(error => console.error("Error:", error));
    }

    renderFiles(); // Initial render
</script>

</body>

</html>
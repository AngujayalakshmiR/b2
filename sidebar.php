<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Redirect if the user is not logged in
if (!isset($_SESSION['username']) && !isset($_SESSION['empUserName'])) {
    header("Location: login.php");
    exit();
}

// Determine user role based on session variables
$role = ''; // Default value to avoid undefined warnings

if (isset($_SESSION['username'])) {
    $role = 'admin'; // Assuming username is for admin
} elseif (isset($_SESSION['empUserName'])) {
    $role = 'employee'; // Assuming empUserName is for employee
}

include 'dbconn.php';
?>

<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: white;">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon" style='font-size:19px'>KTG</div>
        <div class="sidebar-brand-text mx-2" style='font-size:19px'>DASHBOARD</div>
    </a>
    <hr class="sidebar-divider my-0">
    <div class="sidebar-divider" style="margin-bottom: 3px;"></div>

    <?php if ($role === 'admin') : ?>
        <!-- Admin Navigation -->
        <li class="nav-item l active">
            <a class="nav-link k" href="index.php" style="color: white;">
                <i class="fas fa-fw fa-tachometer-alt" style="font-size:16px"></i>
                <span>Admin Dashboard</span>
            </a>
        </li>
        <div class="sidebar-divider" style="margin-bottom: 3px;"></div>

        <li class="nav-item l">
            <a class="nav-link k" href="followups.php" style="color: black;">
                <i class="fas fa-fw fa-comment-dots" style="font-size:16px"></i>
                <span>FollowUps</span>
            </a>
        </li>
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
                    <a class="collapse-item" href="customer.php" style="color: black;">Customer</a>
                    <a class="collapse-item" href="employee.php" style="color: black;">Employee</a>
                    <a class="collapse-item" href="designation.php" style="color: black;">Designation</a>
                    <a class="collapse-item" href="projecttype.php" style="color: black;">Project Type</a>
                    <a class="collapse-item" href="followuptype.php" style="color: black;">FollowUp Type</a>
                </div>
            </div>
        </li> 
        <div class="sidebar-divider" style="margin-bottom: 3px;"></div>

        <li class="nav-item l">
            <a class="nav-link k" href="projectcreation.php" style="color: black;">
                <i class="fas fa-fw fa-folder" style="font-size:16px"></i>
                <span>Project Creation</span>
            </a>
        </li>
        <div class="sidebar-divider" style="margin-bottom: 3px;"></div>

        <li class="nav-item l">
            <a class="nav-link k" href="dailyupdates.php" style="color: black;">
                <i class="fas fa-fw fa-table" style="font-size:16px"></i>
                <span>Daily Update</span>
            </a>
        </li>
        <div class="sidebar-divider" style="margin-bottom: 3px;"></div>

        <li class="nav-item l">
            <a class="nav-link k" href="reports.php" style="color: black;">
                <i class="fas fa-fw fa-chart-area" style="font-size:16px"></i>
                <span>Admin Work Reports</span>
            </a>
        </li>
        <div class="sidebar-divider" style="margin-bottom: 3px;"></div>

        <li class="nav-item l">
            <a class="nav-link k" href="userrights.php" style="color: black;">
                <i class="fas fa-user-shield" style="font-size:16px"></i>
                <span>User Rights</span>
            </a>
        </li>
    <?php elseif ($role === 'employee') :
        // Fetch employee rights from the database (both module and rights data)
        $Name = $_SESSION['Name'];
        $accessModules = [];

        $sql = "SELECT module, rights FROM userrights WHERE name = '$Name'";
        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $accessModules[] = $row; // Each row contains 'module' and 'rights'
            }
        }

        // Employee static navigation items
        ?>
        <!-- Employee Navigation -->
        <li class="nav-item l active">
            <a class="nav-link k" href="employeedash.php" style="color: white;">
                <i class="fas fa-fw fa-tachometer-alt" style="font-size:16px"></i>
                <span>Employee Dashboard</span>
            </a>
        </li>
        <div class="sidebar-divider" style="margin-bottom: 3px;"></div>

        <li class="nav-item l">
            <a class="nav-link k" href="employeeProjectAllocated.php" style="color: black;">
                <i class="fas fa-fw fa-folder" style="font-size:16px"></i>
                <span>Project Allocation</span>
            </a>
        </li>
        <div class="sidebar-divider" style="margin-bottom: 3px;"></div>

        <li class="nav-item l">
            <a class="nav-link k" href="employeeWorkReports.php" style="color: black;">
                <i class="fas fa-fw fa-chart-area" style="font-size:16px"></i>
                <span>Work Reports</span>
            </a>
        </li>
        <div class="sidebar-divider" style="margin-bottom: 3px;"></div>

        <?php
        // Define a mapping of allowed modules to their page URLs
        $availableModules = [
            "Dashboard"      => "index.php",
            "Customer"       => "customer.php",
            "Employee"       => "employee.php",
            "Designation"    => "designation.php",
            "Project Type"   => "projecttype.php",
            "FollowUp Type"  => "followuptype.php",
            "Project Creation" => "projectcreation.php",
            "Daily Update"   => "dailyupdates.php",
            "Work Reports"   => "reports.php"
        ];

        // Display additional access-based navigation using rights in URL
        foreach ($accessModules as $moduleData) {
            $moduleName = $moduleData['module'];
            $rights = urlencode($moduleData['rights']); // URL encode the rights data

            if (isset($availableModules[$moduleName])) {
                // Append rights data as a query parameter to the URL
                $moduleUrl = $availableModules[$moduleName] . "?rights=" . $rights;
                echo '<li class="nav-item l">
                        <a class="nav-link k" href="' . $moduleUrl . '" style="color: black;">
                            <i class="fas fa-fw fa-folder" style="font-size:16px"></i>
                            <span>' . $moduleName . '</span>
                        </a>
                      </li>
                      <div class="sidebar-divider" style="margin-bottom: 3px;"></div>';
            }
        }
    endif;
    ?>

    <br>
    <div class="sidebar-divider d-none d-md-block"></div>

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle side border-0" id="sidebarToggle"></button>
    </div>
</ul>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const navLinks = document.querySelectorAll(".nav-item");

    // Retrieve the last active page from localStorage
    const activePage = localStorage.getItem("activePage");

    if (activePage) {
        navLinks.forEach((link) => {
            if (link.querySelector("a").getAttribute("href") === activePage) {
                link.classList.add("active");
            } else {
                link.classList.remove("active");
            }
        });
    }

    navLinks.forEach((navItem) => {
        navItem.addEventListener("click", function () {
            // Remove 'active' class from all items
            navLinks.forEach((item) => item.classList.remove("active"));

            // Add 'active' class to the clicked item
            this.classList.add("active");

            // Store the active page in localStorage
            localStorage.setItem("activePage", this.querySelector("a").getAttribute("href"));
        });
    });
});
</script>

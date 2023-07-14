<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0-alpha3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
<!-- table styles -->

<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="stats.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Admin Controls</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="main.php">
                        <i class="bi bi-circle"></i><span>User Data</span>
                    </a>
                </li>
                <li>
                    <a href="add_user.php">
                        <i class="bi bi-circle"></i><span>Add User</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Item 3</span>
                    </a>
                </li> -->
            </ul>
        </li>
        
        <li class="nav-heading">My Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.php">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>
        <!-- End Profile Page Nav -->



        <!-- <li class="nav-item">
            <a class="nav-link collapsed" href="register-form.php">
                <i class="bi bi-card-list"></i>
                <span>Register</span>
            </a>
        </li> -->
        <!-- End Register Page Nav -->

        <!-- <li class="nav-item">
            <a class="nav-link collapsed" href="login.php">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Login</span>
            </a>
        </li> -->
        <!-- End Login Page Nav -->
</ul>
</aside>
<!-- End Sidebar-->
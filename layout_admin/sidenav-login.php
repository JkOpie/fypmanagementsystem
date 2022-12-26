<nav class="sidenav shadow-right sidenav-light">
    <div class="sidenav-menu">
        <div class="nav accordion" id="accordionSidenav">
            <!-- Sidenav Accordion (Dashboard)-->
            <a class="nav-link mt-3" href="/fyp/admin-login.php?type=student">
                <div class="nav-link-icon"><i class="fa-solid fa-user"></i></div>
                Student Login
            </a>

            <a class="nav-link" href="/fyp/admin-login.php?type=cluster">
                <div class="nav-link-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                Cluster Login
            </a>
            
            <a class="nav-link" href="/fyp/admin-login.php?type=fyp_coordinator">
                <div class="nav-link-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                Fyp Coordinator Login
            </a>

            <a class="nav-link" href="/fyp/admin-login.php?type=supervisor">
                <div class="nav-link-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                Supervisor Login
            </a>
            <a class="nav-link" href="/fyp/admin-login.php?type=hod">
                <div class="nav-link-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                HOD Login
            </a>
        </div>
    </div>
    <!-- Sidenav Footer-->
    <div class="sidenav-footer">
        <div class="sidenav-footer-content">
            <div class="sidenav-footer-subtitle">Logged in as:</div>
            <div class="sidenav-footer-title"><?php echo $_SESSION['name'] ?></div>
        </div>
    </div>
</nav>
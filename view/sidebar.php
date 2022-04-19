<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
            <img src="img/logo_mix.png" class="img-fluid w-50" alt="">
        </div>
        <!-- <div class="sidebar-brand-text mx-3">Pengaduan dan Aspirasi</div> -->
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item
    <?= ($page == 1) ? 'active' : '' ?>
    ">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item
    <?= ($page == 2 || $page == 3) ? 'active' : '' ?>
    ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-user-circle"></i>
            <span>Data Akun</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item
                <?= ($page == 2) ? 'active' : '' ?>
                " href="data-admin.php">Data Admin</a>
                <a class="collapse-item
                <?= ($page == 3) ? 'active' : '' ?>
                " href="data-user.php">Data Pengguna Jasa</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item
    <?= ($page == 4) ? 'active' : '' ?>
    ">
        <a class="nav-link" href="data-pengaduan.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Data Pengaduan</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item
    <?= ($page == 5) ? 'active' : '' ?>
    ">
        <a class="nav-link" href="data-aspirasi.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Data Aspirasi</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Keluar</span></a>
    </li> 

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
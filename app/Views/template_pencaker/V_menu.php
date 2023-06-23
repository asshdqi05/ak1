<?php $session = session();
if ($session->get('level') == 1) {
    $level = "Admin";
} else if ($session->get('level') == 2) {
    $level = "Petugas";
} else if ($session->get('level') == 3) {
    $level = "Pimpinan";
}
?>
<aside class="main-sidebar sidebar-light-olive elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link navbar-olive">
        <img src="<?= base_url('assets') ?>/dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light text-light">Sistem Informasi AK1</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets') ?>/dist/img/user.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"> <span class="text-olive"> <?= $session->get('nama'); ?> </span></a>
            </div>
        </div>

        <!-- Sidebar Menu -->

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="<?= site_url('C_home_pencaker') ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('C_pengajuan_ak1') ?>" class="nav-link">
                        <i class="nav-icon fas fa-laptop-house"></i>
                        <p>
                            Pengajuan AK1
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('C_terima_kerja') ?>" class="nav-link">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>
                            Input Terima Kerja
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('C_history_terima_kerja') ?>" class="nav-link">
                        <i class="nav-icon fas fa-history"></i>
                        <p>
                            History Terima Kerja
                        </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
</aside>
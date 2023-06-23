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
                <img src="<?= base_url('assets') ?>/dist/img/avatar2.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"> <span class="text-olive"> <?= $session->get('nama_user'); ?> - <span class="text-indigo"><?= $level ?> </span></a>
            </div>
        </div>

        <!-- Sidebar Menu -->

        <?php if ($session->get('level') == 1) { ?>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                    <li class="nav-item">
                        <a href="<?= site_url('C_home') ?>" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-th-list"></i>
                            <p>
                                Master
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= site_url('C_kecamatan') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Kecamatan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('C_Nagari') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Nagari</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="<?= site_url('C_petugas') ?>" class="nav-link">
                            <i class="nav-icon fas fa-id-card-alt"></i>
                            <p>
                                Petugas
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= site_url('C_pencaker') ?>" class="nav-link">
                            <i class="nav-icon fas fa-user-tie"></i>
                            <p>
                                Pencaker
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= site_url('C_user') ?>" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                User
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= site_url('C_pengajuan') ?>" class="nav-link">
                            <i class="nav-icon fas fa-laptop-house"></i>
                            <p>
                                Pengajuan AK1
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= site_url('C_laporan') ?>" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                Laporan
                            </p>
                        </a>
                    </li>

                </ul>
            </nav>
        <?php } else if ($session->get('level') == 2) { ?>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                    <li class="nav-item">
                        <a href="<?= site_url('C_home') ?>" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= site_url('C_pencaker') ?>" class="nav-link">
                            <i class="nav-icon fas fa-user-tie"></i>
                            <p>
                                Pencaker
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= site_url('C_pengajuan') ?>" class="nav-link">
                            <i class="nav-icon fas fa-laptop-house"></i>
                            <p>
                                Pengajuan AK1
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
        <?php } else if ($session->get('level') == 3) { ?>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                    <li class="nav-item">
                        <a href="<?= site_url('C_home') ?>" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= site_url('C_laporan') ?>" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                Laporan
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
        <?php } ?>


        <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
</aside>
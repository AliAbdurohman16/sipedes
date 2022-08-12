<!-- sidebar-wrapper -->
<nav id="sidebar" class="sidebar-wrapper sidebar-dark">
    <div class="sidebar-content" data-simplebar style="height: calc(100% - 60px);">
        <div class="sidebar-brand">
            <a href="index.html">
                <img src="<?= base_url() ?>/assets/images/logo-dark.png" height="24" class="logo-light-mode" alt="">
                <img src="<?= base_url() ?>/assets/images/logo-light.png" height="24" class="logo-dark-mode" alt="">
                <span class="sidebar-colored">
                    <img src="<?= base_url() ?>/assets/images/logo-light.png" height="24" alt="">
                </span>
            </a>
        </div>

        <ul class="sidebar-menu">
            <?php
            $uri = new \CodeIgniter\HTTP\URI();
            $uri = service('uri');
            ?>
            <li class="<?= ($uri->getSegment(1) == 'dashboard' ? 'active' : '') ?>"><a href="<?= base_url('dashboard') ?>"><i class="ti ti-home me-2"></i>Dashboard</a></li>
            <?php if (session()->get('role')->id == 1) : ?>
                <li><a href="index.html"><i class="fa-solid fa-clock me-2"></i></i>Log Activity</a></li>
                <li class="sidebar-dropdown <?= ($uri->getSegment(1) == 'rt' ? 'active' : '') ?>">
                    <a href="javascript:void(0)"><i class="ti ti-browser me-2"></i>Data Master</a>
                    <div class="sidebar-submenu <?= ($uri->getSegment(1) == 'rt' || $uri->getSegment(1) == 'data_jabatan' ? 'd-block' : '') ?>">
                        <ul>
                            <li><a href="<?= site_url('admin/data_rw') ?>">Data RW</a></li>
                            <li class="<?= ($uri->getSegment(1) == 'rt' ? 'active' : '') ?>"><a href="<?= base_url('rt') ?>">Data RT</a></li>
                            <li class="<?= ($uri->getSegment(1) == 'data_jabatan' ? 'active' : '') ?>"><a href="<?= base_url('data_jabatan') ?>">Data Jabatan</a></li>
                            <li><a href="index-rtl.html">Pengajuan</a></li>
                        </ul>
                    </div>
                </li>
            <?php endif; ?>
            <li><a href="index.html"><i class="fa-solid fa-users-between-lines me-2"></i>Penduduk</a></li>
            <li><a href="index.html"><i class="fa-solid fa-users me-2"></i>Users</a></li>
            <li class="sidebar-dropdown">
                <a href="javascript:void(0)"><i class="fa-solid fa-envelope me-2"></i>Surat</a>
                <div class="sidebar-submenu">
                    <ul>
                        <li><a href="chat.html">Surat Keluar</a></li>
                        <li><a href="email.html">Surat Masuk</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="index.html"><i class="fa-solid fa-user-pen me-2"></i></i>Pengajuan</a></li>
            <li><a href="<?= base_url() . '/logout' ?>"><i class="fa-solid fa-right-from-bracket me-2"></i>Keluar</a></li>

        </ul>
        <!-- sidebar-menu  -->
    </div>
</nav>
<!-- sidebar-wrapper  -->
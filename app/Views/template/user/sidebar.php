<!-- sidebar-wrapper -->
<nav id="sidebar" class="sidebar-wrapper sidebar-dark">
    <div class="sidebar-content" data-simplebar style="height: calc(100% - 60px);">
        <div class="sidebar-brand">
            <center>
                <a href="<?= base_url() ?>">
                    <img src="<?= base_url() ?>/images/logo/Sipedes.png" width="35%" class="logo-light-mode" alt="">
                    <img src="<?= base_url() ?>/images/logo/Sipedes.png" width="35%" class="logo-dark-mode" alt="">
                    <span class="sidebar-colored">
                        <img src="<?= base_url() ?>/images/logo/Sipedes.png" width="35%" alt="">
                    </span>
                </a>
            </center>
        </div>

        <ul class="sidebar-menu">
            <?php
            $uri = new \CodeIgniter\HTTP\URI();
            $uri = service('uri');
            ?>
            <li class="<?= ($uri->getSegment(1) == 'dashboard' ? 'active' : '') ?>"><a href="<?= base_url('user/dashboard') ?>"><i class="ti ti-home me-2"></i>Dashboard</a></li>
            <li class="<?= ($uri->getSegment(1) == 'tulis_pengajuan' ? 'active' : '') ?>"><a href="<?= base_url('user/tulis_pengajuan') ?>"><i class="fa-solid fa-user-pen me-2"></i>Tulis Pengajuan</a></li>
            <li class="<?= ($uri->getSegment(1) == 'pengajuan_dikirim' ? 'active' : '') ?>"><a href="<?= base_url('user/pengajuan_dikirim') ?>"><i class="fa-solid fa-envelope-open-text me-2"></i>Pengajuan Dikirim</a></li>
            <li class="<?= ($uri->getSegment(1) == 'pengajuan_sudah_dibuat' ? 'active' : '') ?>"><a href="<?= base_url('user/pengajuan_sudah_dibuat') ?>"><i class="fa-solid fa-envelope-circle-check me-2"></i>Pengajuan Sudah Dibuat</a></li>
            <li><a href="<?= base_url('user/logout') ?>"><i class="fa-solid fa-right-from-bracket me-2"></i>Keluar</a></li>
        </ul>
        <!-- sidebar-menu  -->
    </div>
</nav>
<!-- sidebar-wrapper  -->
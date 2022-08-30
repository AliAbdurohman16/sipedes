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
            <?php if (session()->get('role')->id == 2) : ?>
                <li class="<?= ($uri->getSegment(1) == 'dashboard' ? 'active' : '') ?>"><a href="<?= base_url('user/dashboard') ?>"><i class="ti ti-home me-2"></i>Dashboard</a></li>
            <?php else : ?>
                <li class="<?= ($uri->getSegment(1) == 'dashboard' ? 'active' : '') ?>"><a href="<?= base_url('admin/dashboard') ?>"><i class="ti ti-home me-2"></i>Dashboard</a></li>
            <?php endif; ?>
            <?php if (session()->get('role')->id == 1 || session()->get('role')->id == 3 || session()->get('role')->id == 4) : ?>
                <li class="<?= ($uri->getSegment(1) == 'log_activity' ? 'active' : '') ?>"><a href="<?= base_url('admin/log_activity') ?>"><i class="fa-solid fa-clock me-2"></i></i>Log Activity</a></li>
            <?php endif; ?>
            <?php if (session()->get('role')->id == 1) : ?>
                <li class="sidebar-dropdown <?= ($uri->getSegment(1) == 'data_dusun' || $uri->getSegment(1) == 'data_rw' || $uri->getSegment(1) == 'data_rt' || $uri->getSegment(1) == 'data_jabatan' ? 'active' : '') ?>">
                    <a href="javascript:void(0)"><i class="ti ti-browser me-2"></i>Data Master</a>
                    <div class="sidebar-submenu <?= ($uri->getSegment(1) == 'data_rt' || $uri->getSegment(1) == 'data_jabatan' ? 'd-block' : '') ?>">
                        <ul>
                            <li class="<?= ($uri->getSegment(1) == 'data_dusun' ? 'active' : '') ?>"><a href="<?= base_url('admin/data_dusun') ?>">Data Dusun</a></li>
                            <li class="<?= ($uri->getSegment(1) == 'data_rw' ? 'active' : '') ?>"><a href="<?= site_url('admin/data_rw') ?>">Data RW</a></li>
                            <li class="<?= ($uri->getSegment(1) == 'data_rt' ? 'active' : '') ?>"><a href="<?= base_url('admin/data_rt') ?>">Data RT</a></li>
                            <li class="<?= ($uri->getSegment(1) == 'data_jabatan' ? 'active' : '') ?>"><a href="<?= base_url('admin/data_jabatan') ?>">Data Jabatan</a></li>
                        </ul>
                    </div>
                </li>
            <?php endif; ?>
            <?php if (session()->get('role')->id == 1 || session()->get('role')->id == 4) : ?>
            <li class="sidebar-dropdown">
                <a href="javascript:void(0)"><i class="fa-solid fa-users-between-lines me-2"></i>Penduduk</a>
                <div class="sidebar-submenu">
                    <ul>
                        <li class="<?= ($uri->getSegment(1) == 'penduduk' ? 'active' : '') ?>"><a href="<?= base_url('admin/penduduk') ?>"></i>Data Penduduk</a></li>
                        <li class="<?= ($uri->getSegment(1) == 'kartu-keluarga' ? 'active' : '') ?>"><a href="<?= base_url('admin/kartu-keluarga') ?>">Data Kartu Keluarga</a></li>
                    </ul>
                </div>
            </li>
            <?php endif; ?>
            <?php if (session()->get('role')->id == 1) : ?>
            <li class="<?= ($uri->getSegment(1) == 'users' ? 'active' : '') ?>"><a href="<?= base_url('admin/users') ?>"><i class="fa-solid fa-users me-2"></i>Pengguna</a></li>
            <li class="<?= ($uri->getSegment(1) == 'aparat-desa' ? 'active' : '') ?>"><a href="<?= base_url('admin/aparat-desa') ?>"><i class="fa-solid fa-user-tie me-2"></i>Aparat Desa</a></li>
            <?php endif; ?>
            <?php if (session()->get('role')->id == 1 || session()->get('role')->id == 3) : ?>
            <li class="sidebar-dropdown <?= ($uri->getSegment(1) == 'data_pengajuan_masuk' || $uri->getSegment(1) == 'data_pengajuan_sudah_dibuat' ? 'active' : '') ?>">
                <a href="javascript:void(0)"><i class="fa-solid fa-envelope-open-text me-2"></i>Data Pengajuan</a>
                <div class="sidebar-submenu <?= ($uri->getSegment(1) == 'data_pengajuan_masuk' || $uri->getSegment(1) == 'data_pengajuan_sudah_dibuat' ? 'd-block' : '') ?>">
                    <ul>
                        <li class="<?= ($uri->getSegment(1) == 'data_pengajuan_masuk' ? 'active' : '') ?>"><a href="<?= base_url('admin/data_pengajuan_masuk') ?>">Data Pengajuan Masuk</a></li>
                        <li class="<?= ($uri->getSegment(1) == 'data_pengajuan_sudah_dibuat' ? 'active' : '') ?>"><a href="<?= base_url('admin/data_pengajuan_sudah_dibuat') ?>">Data Pengajuan Sudah Dibuat</a></li>
                    </ul>
                </div>
            </li>
            <li class="sidebar-dropdown <?= ($uri->getSegment(1) == 'surat_keterangan_nama' || $uri->getSegment(1) == 'surat_keterangan_domisli' || $uri->getSegment(1) == 'surat_keterangan_belum_nikah' ? 'active' : '') ?>">
                <a href="javascript:void(0)"><i class="fa-solid fa-envelope-circle-check me-2"></i>Data Surat Pengajuan</a>
                <div class="sidebar-submenu <?= ($uri->getSegment(1) == 'surat_keterangan_nama' || $uri->getSegment(1) == 'surat_keterangan_domisli' || $uri->getSegment(1) == 'surat_keterangan_belum_nikah' ? 'd-block' : '') ?>">
                    <ul>
                        <li class="<?= ($uri->getSegment(1) == 'surat_keterangan_nama' ? 'active' : '') ?>"><a href="<?= base_url('admin/surat_keterangan_nama') ?>">Surat Keterangan Nama</a></li>
                        <li class="<?= ($uri->getSegment(1) == 'surat_keterangan_domisli' ? 'active' : '') ?>"><a href="<?= base_url('admin/surat_keterangan_domisli') ?>">Surat Keterangan Domisli</a></li>
                        <li class="<?= ($uri->getSegment(1) == 'surat_keterangan_belum_nikah' ? 'active' : '') ?>"><a href="<?= base_url('admin/surat_keterangan_belum_nikah') ?>">Surat Keterangan Belum Nikah</a></li>
                        <li class="<?= ($uri->getSegment(1) == 'surat_keterangan_lahir' ? 'active' : '') ?>"><a href="<?= base_url('admin/surat_keterangan_lahir') ?>">Surat Keterangan Lahir</a></li>
                        <li class="<?= ($uri->getSegment(1) == 'surat_keterangan_penghasilan' ? 'active' : '') ?>"><a href="<?= base_url('admin/surat_keterangan_penghasilan') ?>">Surat Keterangan Penghasilan</a></li>
                        <li class="<?= ($uri->getSegment(1) == 'surat_keterangan_pindah_kk' ? 'active' : '') ?>"><a href="<?= base_url('admin/surat_keterangan_pindah_kk') ?>">Surat Keterangan Pindah KK</a></li>
                        <li class="<?= ($uri->getSegment(1) == 'surat_keterangan_rame_rame' ? 'active' : '') ?>"><a href="<?= base_url('admin/surat_keterangan_rame_rame') ?>">Surat Keterangan Rame-rame</a></li>
                        <li class="<?= ($uri->getSegment(1) == 'surat_keterangan_sku' ? 'active' : '') ?>"><a href="<?= base_url('admin/surat_keterangan_sku') ?>">Surat Keterangan SKU</a></li>
                        <li class="<?= ($uri->getSegment(1) == 'surat_keterangan_sktm' ? 'active' : '') ?>"><a href="<?= base_url('admin/surat_keterangan_sktm') ?>">Surat Keterangan SKTM</a></li>
                        <li class="<?= ($uri->getSegment(1) == 'surat_keterangan_skck' ? 'active' : '') ?>"><a href="<?= base_url('admin/surat_keterangan_skck') ?>">Surat Keterangan SKCK</a></li>
                        <li class="<?= ($uri->getSegment(1) == 'surat_keterangan_kematian' ? 'active' : '') ?>"><a href="<?= base_url('admin/surat_keterangan_kematian') ?>">Surat Keterangan Kematian</a></li>
                    </ul>
                </div>
            </li>
            <li class="<?= ($uri->getSegment(1) == 'laporan' ? 'active' : '') ?>"><a href="<?= base_url('admin/laporan') ?>"><i class="fa-solid fa-chart-column me-2"></i>Laporan</a></li>
            <?php endif; ?>
            <?php if (session()->get('role')->id == 2) : ?>
                <li class="sidebar-dropdown <?= ($uri->getSegment(1) == 'tulis_pengajuan' || $uri->getSegment(1) == 'pengajuan_dikirim' || $uri->getSegment(1) == 'pengajuan_sudah_dibuat' ? 'active' : '') ?>">
                    <a href="javascript:void(0)"><i class="fa-solid fa-user-pen me-2"></i>Pengajuan</a>
                    <div class="sidebar-submenu <?= ($uri->getSegment(1) == 'tulis_pengajuan' || $uri->getSegment(1) == 'pengajuan_dikirim' || $uri->getSegment(1) == 'pengajuan_sudah_dibuat' ? 'd-block' : '') ?>">
                        <ul>
                            <li class="<?= ($uri->getSegment(1) == 'tulis_pengajuan' ? 'active' : '') ?>"><a href="<?= base_url('user/tulis_pengajuan') ?>">Tulis Pengajuan</a></li>
                            <li class="<?= ($uri->getSegment(1) == 'pengajuan_dikirim' ? 'active' : '') ?>"><a href="<?= base_url('user/pengajuan_dikirim') ?>">Pengajuan Dikirim</a></li>
                            <li class="<?= ($uri->getSegment(1) == 'pengajuan_sudah_dibuat' ? 'active' : '') ?>"><a href="<?= base_url('user/pengajuan_sudah_dibuat') ?>">Pengajuan Sudah Dibuat</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="<?= base_url('user/logout') ?>"><i class="fa-solid fa-right-from-bracket me-2"></i>Keluar</a></li>
            <?php else : ?>
                <li><a href="<?= base_url('admin/logout') ?>"><i class="fa-solid fa-right-from-bracket me-2"></i>Keluar</a></li>
            <?php endif; ?>

        </ul>
        <!-- sidebar-menu  -->
    </div>
</nav>
<!-- sidebar-wrapper  -->
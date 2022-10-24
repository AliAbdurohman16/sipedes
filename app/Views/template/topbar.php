<?php

use CodeIgniter\I18n\Time;

$db = db_connect();
$user = $db->table('users')->getWhere(['id' => session()->get('user')->id])->getRow();
$pengajuan = $db->table('pengajuan')->where('status', 'Belum Dibuat')->orderBy('created_at','DESC')->get()->getResult();
$result = $db->table('pengajuan')->where('status', 'Belum Dibuat')->where('read_admin', 'no')->get()->getNumRows();
?>
<!-- Top Header -->
<div class="top-header">
    <div class="header-bar d-flex justify-content-between border-bottom">
        <div class="d-flex align-items-center">
            <a href="#" class="logo-icon me-3">
                <img src="<?= base_url() ?>/images/logo/logo_sipedes.png" height="30" class="small" alt="">
                <span class="big">
                    <img src="<?= base_url() ?>/images/logo/logo_sipedes.png" height="24" class="logo-light-mode" alt="">
                    <img src="<?= base_url() ?>/images/logo/logo_sipedes.png" height="24" class="logo-dark-mode" alt="">
                </span>
            </a>
            <a id="close-sidebar" class="btn btn-icon btn-soft-light" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
            </a>
        </div>

        <ul class="list-unstyled mb-0">
            <?php if (session()->get('role')->id == 1 || session()->get('role')->id == 3) : ?>
                <li class="list-inline-item mb-0 ms-1">
                    <div class="dropdown dropdown-primary">
                        <button type="button" class="btn btn-icon btn-soft-light dropdown-toggle p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti ti-bell"></i></button>
                        <?php if ($result != 0) : ?>
                            <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
                                <span class="visually-hidden">New alerts</span>
                            </span>
                        <?php endif; ?>

                        <div class="dropdown-menu dd-menu shadow rounded border-0 mt-3 p-0" data-simplebar style="height: 320px; width: 290px;">
                            <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
                                <h6 class="mb-0 text-dark">Notifications</h6>
                                <span class="badge bg-soft-danger rounded-pill"><?= $result ?></span>
                            </div>
                            <div class="p-3">
                                <?php foreach ($pengajuan as $p) : ?>
                                    <div onclick="detailPengajuan(<?= $p->id ?>)" class="dropdown-item features feature-primary key-feature p-0 mb-2">
                                        <div class="d-flex align-items-center">
                                            <div class="icon text-center rounded-circle me-2">
                                                <i class="fa-solid fa-envelope-open-text"></i>
                                            </div>
                                            <div class="flex-1">
                                                <h6 class="mb-0 text-dark title <?= ($p->read_admin == 'no' ? 'fw-bold' : '') ?>">Pengajuan Belum Dibuat</h6>
                                                <small class="text-muted">
                                                    <?php
                                                    $time = Time::parse($p->created_at, 'Asia/Jakarta');
                                                    echo $time->humanize();
                                                    ?>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endif; ?>

            <li class="list-inline-item mb-0 ms-1">
                <div class="dropdown dropdown-primary">
                    <button type="button" class="btn btn-soft-light dropdown-toggle p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= base_url('images/avatar/' . $user->image) ?>" class="avatar avatar-ex-small rounded" alt=""></button>
                    <div class="dropdown-menu dd-menu dropdown-menu-end shadow border-0 mt-3 py-3" style="min-width: 200px;">
                        <a class="dropdown-item d-flex align-items-center text-dark pb-3" href="profile.html">
                            <img src="<?= base_url('images/avatar/' . $user->image) ?>" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                            <div class="flex-1 ms-2">
                                <span class="d-block"><?= $user->name ?></span>
                                <small class="text-muted"><?= session()->get('role')->name ?></small>
                            </div>
                        </a>
                        <a class="dropdown-item text-dark" href="<?= site_url('admin/dashboard') ?>"><span class="mb-0 d-inline-block me-1"><i class="ti ti-home"></i></span> Dashboard</a>
                        <a class="dropdown-item text-dark" href="<?= site_url('admin/account') ?>"><span class="mb-0 d-inline-block me-1"><i class="ti ti-settings"></i></span> Akun Saya</a>
                        <div class="dropdown-divider border-top"></div>
                        <a class="dropdown-item text-dark" href="<?= site_url('admin/logout') ?>"><span class="mb-0 d-inline-block me-1"><i class="ti ti-logout"></i></span> Keluar</a>

                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- Top Header -->
<div class="viewModal" style="display: none;"></div>
<script>
    function detailPengajuan(id) {
        $.ajax({
            type: 'post',
            url: "<?= site_url('admin/data_pengajuan_masuk/detail_notification') ?>",
            data: {
                id: id
            },
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    $('.viewModal').html(response.success).show();
                    $('#detailModal').modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }
</script>
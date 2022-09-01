<?= $this->extend('template/user/index'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="layout-specing">
        <div class="d-md-flex justify-content-between align-items-center">
            <h5 class="mb-0"><?= $title ?></h5>

            <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
                <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                    <li class="breadcrumb-item text-capitalize active" aria-current="page"><?= $title ?></li>
                </ul>
            </nav>
        </div>

        <div class="row row-cols-xl-4 row-cols-md-2 row-cols-1">
        <div class="col mt-4">
                    <a href="#!" class="features feature-primary d-flex justify-content-between align-items-center rounded shadow p-3">
                        <div class="d-flex align-items-center">
                            <div class="icon text-center rounded-pill">
                                <i class="fa-solid fa-envelope-open-text fs-4 mb-0"></i>
                            </div>
                            <div class="flex-1 ms-3">
                                <h6 class="mb-0 text-muted">Data Pengajuan Dikirim</h6>
                                <p class="fs-5 text-dark fw-bold mb-0"><span class="counter-value" data-target="<?= $dikirim ?>">0</span></p>
                            </div>
                        </div>
                    </a>
                </div>
                <!--end col-->
                <div class="col mt-4">
                    <a href="#!" class="features feature-primary d-flex justify-content-between align-items-center rounded shadow p-3">
                        <div class="d-flex align-items-center">
                            <div class="icon text-center rounded-pill">
                                <i class="fa-solid fa-envelope-circle-check fs-4 mb-0"></i>
                            </div>
                            <div class="flex-1 ms-3">
                                <h6 class="mb-0 text-muted">Data Pengajuan Sudah Dibuat</h6>
                                <p class="fs-5 text-dark fw-bold mb-0"><span class="counter-value" data-target="<?= $sdh_dibuat ?>">0</span></p>
                            </div>
                        </div>
                    </a>
                </div>
                <!--end col-->
        </div>
    </div>
</div>
<!--end container-->
<?= $this->endSection(); ?>
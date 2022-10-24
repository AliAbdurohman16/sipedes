<?= $this->extend('template/index'); ?>

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

        <div class="row">
            <div class="col-lg-6 mt-4">
                <div class="card border-0 rounded shadow p-4">
                    <h5 class="mb-0">Laporan : </h5>
                    <form action="<?= site_url('admin/laporan/print') ?>" method="POST" target="_blank" class="needs-validation" novalidate="">
                        <?= csrf_field(); ?>
                        <div class="row mt-4">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Awal : <span class="text-danger">*</span></label>
                                    <div class="form-icon position-relative">
                                        <i data-feather="calendar" class="fea icon-sm icons"></i>
                                        <input type="date" name="start" class="form-control ps-5" placeholder="Tanggal Awal :" required>
                                        <div class="invalid-feedback">
                                            Tanggal awal tidak boleh kosong
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->

                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Akhir : <span class="text-danger">*</span></label>
                                    <div class="form-icon position-relative">
                                        <i data-feather="calendar" class="fea icon-sm icons"></i>
                                        <input type="date" name="end" class="form-control ps-5" placeholder="Tanggal Akhir :" required>
                                        <div class="invalid-feedback">
                                            Tanggal akhir tidak boleh kosong
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->

                            <div class="col-lg-12 mt-2 mb-0">
                                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-print"></i>&nbsp;Cetak Laporan</button>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </form>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
</div>
<!--end container-->
<?= $this->endSection(); ?>
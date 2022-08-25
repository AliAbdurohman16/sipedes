<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="layout-specing">
        <div class="d-md-flex justify-content-between align-items-center">
            <h5 class="mb-0"><?= $title ?></h5>

            <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
                <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                    <li class="breadcrumb-item text-capitalize"><a href="index.html">Pengajuan</a></li>
                    <li class="breadcrumb-item text-capitalize active" aria-current="page"><?= $title ?></li>
                </ul>
            </nav>
        </div>

        <div class="row">
            <div class="col-8 mt-4">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">No Kartu Keluarga <span class="text-danger">*</span></label>
                                    <div class="form-icon position-relative">
                                        <i data-feather="user" class="fea icon-sm icons"></i>
                                        <input name="no_kk" type="number" class="form-control ps-5" placeholder="No Kartu Keluarga :">
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">NIK <span class="text-danger">*</span></label>
                                    <div class="form-icon position-relative">
                                        <i data-feather="user-check" class="fea icon-sm icons"></i>
                                        <input name="nik" type="number" class="form-control ps-5" placeholder="NIK :">
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">No Telepon</label>
                                    <div class="form-icon position-relative">
                                        <i data-feather="phone" class="fea icon-sm icons"></i>
                                        <input name="telepon" type="number" class="form-control ps-5" placeholder="No Telepon :">
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Jenis Pengajuan</label>
                                    <select class="form-select form-control" name="jenis" aria-label="Default select example">
                                        <option selected>Pilih Jenis Pengajuan</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Keterangan</label>
                                    <div class="form-icon position-relative">
                                        <i data-feather="message-circle" class="fea icon-sm icons"></i>
                                        <textarea name="keterangan" rows="4" class="form-control ps-5" placeholder="Keterangan :"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="submit" id="submit" name="send" class="btn btn-primary" value="Send Message">
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
</div>
</div>
<!--end container-->
<?= $this->endSection(); ?>
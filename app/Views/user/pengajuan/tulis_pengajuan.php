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

                        <form action="<?= site_url('tulis_pengajuan/create') ?>" method="POST">
                            <div class="row">
                                <!--end col-->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">NIK <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="user-check" class="fea icon-sm icons"></i>
                                            <input name="nik" type="number" class="form-control ps-5 <?= ($validation->hasError('nik')) ? 'is-invalid' : '' ?>" value="<?= old('nik') ?>" placeholder="NIK :">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nik'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">No Telepon <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="phone" class="fea icon-sm icons"></i>
                                            <input name="telepon" type="number" class="form-control ps-5 <?= ($validation->hasError('telepon')) ? 'is-invalid' : '' ?>" value="<?= old('telepon') ?>" placeholder="No Telepon :">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('telepon'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Jenis Pengajuan Surat <span class="text-danger">*</span></label>
                                        <select class="form-select form-control <?= ($validation->hasError('jenis')) ? 'is-invalid' : '' ?>" name="jenis" aria-label="Default select example">
                                            <option selected>Pilih Jenis Pengajuan Surat</option>
                                            <option value="Keterangan Nama" <?= old('jenis') ?>>Keterangan Nama</option>
                                            <option value="Keterangan Domisli">Keterangan Domisli</option>
                                            <option value="Keterangan Belum Nikah">Keterangan Belum Nikah</option>
                                            <option value="Keterangan Lahir">Keterangan Lahir</option>
                                            <option value="Keterangan Penghasilan">Keterangan Penghasilan</option>
                                            <option value="Keterangan Pindah KK">Keterangan Pindah KK</option>
                                            <option value="Keterangan Rame-rame">Keterangan Rame-rame</option>
                                            <option value="Keterangan SKU">Keterangan SKU</option>
                                            <option value="Keterangan SKTM">Keterangan SKTM</option>
                                            <option value="Keterangan SKCK">Keterangan SKCK</option>
                                            <option value="Keterangan Kematian">Keterangan Kematian</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('jenis'); ?>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Keterangan <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="message-circle" class="fea icon-sm icons"></i>
                                            <textarea name="keterangan" rows="4" class="form-control ps-5 <?= ($validation->hasError('keterangan')) ? 'is-invalid' : '' ?>" placeholder="Keterangan :"><?= old('keterangan') ?></textarea>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('keterangan'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="submit" class="btn btn-primary" value="Kirim Pengajuan">
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
</div>
<!--end container-->
<?= $this->endSection(); ?>
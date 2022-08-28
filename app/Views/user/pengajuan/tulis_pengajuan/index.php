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

                        <form action="<?= site_url('user/tulis_pengajuan/create') ?>" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">No Kartu Keluarga <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="user" class="fea icon-sm icons"></i>
                                            <input name="no_kk" type="number" class="form-control ps-5 <?= ($validation->hasError('no_kk')) ? 'is-invalid' : '' ?>" value="<?= old('no_kk') ?>" placeholder="No Kartu Keluarga :">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('no_kk'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-6">
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
                                        <label class="form-label">No Whatsapp <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="phone" class="fea icon-sm icons"></i>
                                            <input name="telepon" type="number" class="form-control ps-5 <?= ($validation->hasError('telepon')) ? 'is-invalid' : '' ?>" value="<?= old('telepon') ?>" placeholder="No Whatsapp : contoh 628****">
                                            <small>Gunakan no whatsapp di awali dengan 62 seperti contoh : 6281234***</small>
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
                                            <option value="">Pilih Jenis Pengajuan Surat</option>
                                            <option value="Keterangan Nama">Keterangan Nama</option>
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

<script>
        $(function() {
            <?php if (session()->has("error_message")) { ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '<?= session("error_message") ?>'
                })
            <?php } else if (session()->has("success_message")) { ?>
                Swal.fire({
                    icon: 'success',
                    title: 'Selamat!',
                    text: '<?= session("success_message") ?>'
                })
            <?php } ?>
        });
    </script>
<?= $this->endSection(); ?>
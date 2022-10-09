<?= $this->extend('template/frontend/index'); ?>

<?= $this->section('content'); ?>
<div class="section-lg bg-grey-lighter">
    <div class="container text-center">
        <h1 class="fw-light margin-0">Buat Pengajuan</h1>
    </div><!-- end container -->
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <form action="<?= site_url('tulis_pengajuan/create') ?>" method="POST">
                <?= csrf_field() ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">No Kartu Keluarga <span class="text-danger">*</span></label>
                            <div class="position-relative">
                                <input name="no_kk" type="number" class="form-control <?= ($validation->hasError('no_kk')) ? 'is-invalid' : '' ?>" value="<?= old('no_kk') ?>" placeholder="No Kartu Keluarga" required>
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
                            <div class="position-relative">
                                <input name="nik" type="number" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : '' ?>" value="<?= old('nik') ?>" placeholder="NIK" required>
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
                            <div class="position-relative">
                                <input name="telepon" type="number" class="form-control <?= ($validation->hasError('telepon')) ? 'is-invalid' : '' ?>" value="<?= old('telepon') ?>" placeholder="Contoh: 628****" required>
                                <small>Gunakan no whatsapp dengan diawali dengan 62 seperti contoh : 6281234***</small>
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
                            <select class="form-select form-control <?= ($validation->hasError('jenis')) ? 'is-invalid' : '' ?>" name="jenis" id="jenis" required>
                                <option value="">Pilih Jenis Pengajuan Surat</option>
                                <option value="Keterangan Beda Nama (Beda KTP Dan KK)">Keterangan Beda Nama (KTP Dan KK)</option>
                                <option value="Keterangan Beda Nama (Untuk Ke ATM)">Keterangan Beda Nama (Untuk Ke ATM)</option>
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
                    <div class="col-md-12" id="atmCard" hidden>
                        <div class="mb-3">
                            <label class="form-label">Kartu ATM <span class="text-danger">*</span></label>
                            <div class="position-relative">
                                <input name="atmCard" type="text" class="form-control <?= ($validation->hasError('atmCard')) ? 'is-invalid' : '' ?>" value="<?= old('atmCard') ?>" placeholder="Contoh: BNI, BRI, BCA" required>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('atmCard'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-12" id="noRek" hidden>
                        <div class="mb-3">
                            <label class="form-label">No Rekening <span class="text-danger">*</span></label>
                            <div class="position-relative">
                                <input name="noRek" type="text" class="form-control <?= ($validation->hasError('noRek')) ? 'is-invalid' : '' ?>" value="<?= old('noRek') ?>" placeholder="No Rekening" required>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('noRek'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-12" id="name" hidden>
                        <div class="mb-3">
                            <label class="form-label">Nama di ATM<span class="text-danger">*</span></label>
                            <div class="position-relative">
                                <input name="name" type="text" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : '' ?>" value="<?= old('name') ?>" placeholder="Nama di ATM" required>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('name'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Keterangan <span class="text-danger">*</span></label>
                            <div class="position-relative">
                                <textarea name="keterangan" rows="4" class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : '' ?>" placeholder="Keterangan"><?= old('keterangan') ?></textarea>
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
                        <button type="submit" class="button button-md button-dark w-100">Kirim Pengajuan</button>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('javascript'); ?>
<script>
    $('#jenis').on('change', function() {;
        if ($('#jenis option:selected').val() === 'Keterangan Beda Nama (Untuk Ke ATM)') {
            $('#atmCard').prop('hidden', false);
            $('#noRek').prop('hidden', false);
            $('#name').prop('hidden', false);
        } else {
            $('#atmCard').prop('hidden', 'true');
            $('#noRek').prop('hidden', 'true');
            $('#name').prop('hidden', 'true');
        }
    });
</script>
<?= $this->endSection(); ?>
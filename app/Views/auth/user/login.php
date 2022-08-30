<?= $this->extend('template/auth/main'); ?>

<?= $this->section('content'); ?>
<!-- Hero Start -->
<section class="bg-home bg-circle-gradiant d-flex align-items-center">
    <div class="bg-overlay bg-overlay-white"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card form-signin p-4 rounded shadow">
                    <?= form_open('login/valid_login') ?>
                    <?= csrf_field(); ?>
                    <a href="index.html"><img src="<?= base_url() ?>/images/logo/Sipedes.png" width="35%" class="mb-4 d-block mx-auto" alt=""></a>
                    <h5 class="mb-3 text-center">SISTEM PELAYANAN DESA</h5>
                    <div class="form-floating mb-2">
                        <input type="number" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : '' ?>" id="nik" name="nik" placeholder="NIK" value="<?= old('nik') ?>" autofocus>
                        <label for="nik">NIK</label>
                        <div class="invalid-feedback">
                            <?= $validation->getError('nik'); ?>
                        </div>
                    </div>

                    <button class="btn btn-primary w-100 mt-2" type="submit">Masuk</button>

                    <p class="mb-0 text-muted mt-3 text-center">
                        © <script>
                            document.write(new Date().getFullYear())
                        </script> Sipedes.</p>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
    <!--end container-->
</section>
<!--end section-->
<!-- Hero End -->
<?= $this->endSection(); ?>
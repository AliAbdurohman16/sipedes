<?= $this->extend('template/auth/main'); ?>

<?= $this->section('content'); ?>
<!-- Hero Start -->
<section class="bg-home bg-circle-gradiant d-flex align-items-center">
    <div class="bg-overlay bg-overlay-white"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card form-signin p-4 rounded shadow">
                    <form action="<?= site_url('reset_password/send') ?>" method="POST">
                        <?= csrf_field(); ?>
                        <a href="index.html"><img src="/images/logo/Sipedes.png" width="35%" class="mb-4 d-block mx-auto" alt=""></a>
                        <h5 class="mb-3 text-center">Reset kata sandi</h5>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : '' ?>" name="password" id="floatingInput" placeholder="Kata Sandi Baru" value="<?= old('password') ?>" >
                            <label for="floatingInput">Kata Sandi Baru</label>
                            <div class="invalid-feedback">
                                <?= $validation->getError('password'); ?>
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control <?= ($validation->hasError('confirm_password')) ? 'is-invalid' : '' ?>" name="confirm_password" id="floatingInput" placeholder="Konfirmasi Kata Sandi" value="<?= old('confirm_password') ?>">
                            <label for="floatingInput">Konfirmasi Kata Sandi</label>
                            <div class="invalid-feedback">
                                <?= $validation->getError('confirm_password'); ?>
                            </div>
                        </div>

                        <button class="btn btn-primary w-100" type="submit">Simpan</button>

                        <div class="col-12 text-center mt-3">
                            <p class="mb-0 mt-3"><a href="<?= site_url('forgot_password') ?>" class="text-dark fw-bold">Kembali</a></p>
                        </div>
                        <!--end col-->

                        <p class="mb-0 text-muted mt-3 text-center">© <script>
                                document.write(new Date().getFullYear())
                            </script> Sipedes.</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end container-->
</section>
<!--end section-->
<!-- Hero End -->
<?= $this->endSection(); ?>
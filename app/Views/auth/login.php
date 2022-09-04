<?= $this->extend('template/auth/main'); ?>

<?= $this->section('content'); ?>
<!-- Hero Start -->
<section class="bg-home bg-circle-gradiant d-flex align-items-center">
    <div class="bg-overlay bg-overlay-white"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card form-signin p-4 rounded shadow">
                    <?= form_open('admin/login/valid_login') ?>
                    <?= csrf_field(); ?>
                    <div class="row col-12 mb-4">
                        <div class="col-6 mt-4">
                            <img src="<?= base_url() ?>/images/logo/cibinuang.png" class="img-fluid"
                                alt="Logo Desa Cibinuang">
                        </div>
                        <div class="col-6">
                            <img src="<?= base_url() ?>/images/logo/logo.png" class="img-fluid" alt="Logo Sipedes">
                        </div>
                    </div>
                    <h4 class="text-center">LOGIN ADMIN</h4>
                    <p class="mb-3 fs-6 text-center">SISTEM PELAYANAN DESA CIBINUANG <br> KEC. KUNINGAN, KAB. KUNINGAN
                    </p>
                    <div class="form-floating mb-2">
                        <input type="text"
                            class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : '' ?>"
                            id="username" name="username" placeholder="Nama Pengguna" value="<?= old('username') ?>"
                            autofocus required>
                        <label for="username">Nama Pengguna</label>
                        <div class="invalid-feedback">
                            <?= $validation->getError('username'); ?>
                        </div>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password"
                            class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : '' ?>"
                            id="password" name="password" placeholder="Password" required>
                        <label for="password">Kata Sandi</label>
                        <div class="invalid-feedback">
                            <?= $validation->getError('password'); ?>
                        </div>
                    </div>

                    <button class="btn btn-primary w-100" type="submit">Masuk</button>

                    <div class="d-flex justify-content-center">
                        <p class="forgot-pass mt-3">
                            <a href="<?= site_url('admin/forgot_password')?>" class="text-dark small fw-bold">Lupa Kata
                                Sandi ?</a>
                        </p>
                    </div>

                    <p class="mb-0 text-muted text-center">
                        © <script>
                            document.write(new Date().getFullYear())
                        </script> Sistem Pelayanan Desa Cibinuang.</p>
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
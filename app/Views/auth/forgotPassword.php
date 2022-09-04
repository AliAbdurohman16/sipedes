<?= $this->extend('template/auth/main'); ?>

<?= $this->section('content'); ?>
<!-- Hero Start -->
<section class="bg-home bg-circle-gradiant d-flex align-items-center">
    <div class="bg-overlay bg-overlay-white"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card form-signin p-4 rounded shadow">
                    <form action="<?= site_url('admin/forgot_password/send') ?>" method="POST">
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
                        <h5 class="mb-3 text-center">Atur Ulang Kata Sandi Anda</h5>

                        <p class="text-muted">Silakan masukkan nama pengguna Anda. Jika Anda ingin mengatur ulang kata
                            sandi!.</p>

                        <div class="form-floating mb-3">
                            <input type="text"
                                class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : '' ?>"
                                name="username" id="floatingInput" placeholder="Nama Pengguna"
                                value="<?= old('username') ?>" autofocus required>
                            <label for="floatingInput">Nama Pengguna</label>
                            <div class="invalid-feedback">
                                <?= $validation->getError('username'); ?>
                            </div>
                        </div>

                        <button class="btn btn-primary w-100" type="submit">Kirim</button>

                        <div class="col-12 text-center mt-3">
                            <p class="mb-0 mt-3"><small class="text-dark me-2">Ingat kata sandi Anda ?</small> <a
                                    href="<?= site_url('admin/login') ?>" class="text-dark fw-bold">Masuk</a></p>
                        </div>
                        <!--end col-->

                        <p class="mb-0 text-muted mt-3 text-center">© <script>
                                document.write(new Date().getFullYear())
                            </script> Sistem Pelayanan Desa Cibinuang.</p>
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
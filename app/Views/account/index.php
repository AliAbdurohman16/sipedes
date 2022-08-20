<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="layout-specing">
        <div class="d-md-flex justify-content-between align-items-center">
            <h5 class="mb-0"><?= $title ?></h5>

            <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
                <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                    <li class="breadcrumb-item text-capitalize"><a href="index.html">Akun Saya</a></li>
                    <li class="breadcrumb-item text-capitalize active" aria-current="page"><?= $title ?></li>
                </ul>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-6 mt-4">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <h5 class="text-md-start text-center mb-0">Personal Detail :</h5>

                        <div class="mt-4 text-md-start text-center d-sm-flex">
                            <img src="<?= site_url('images/avatar/' . $users->image) ?>" class="avatar float-md-left avatar-medium rounded-circle shadow me-md-4" alt="">

                            <div class="mt-md-4 mt-3 mt-sm-0">
                                <a href="javascript:void(0)" class="btn btn-primary mt-2">Ubah Foto</a>
                                <a href="javascript:void(0)" class="btn btn-outline-primary mt-2 ms-2">Hapus</a>
                            </div>
                        </div>

                        <form action="account/create" method="POST">
                            <div class="col-md-12 mt-4">
                                <div class="mb-3">
                                    <label class="form-label">Nama Lengkap</label>
                                    <div class="form-icon position-relative">
                                        <i data-feather="user" class="fea icon-sm icons"></i>
                                        <input name="name" id="first" type="text" class="form-control ps-5" placeholder="Nama Lengkap :" value="<?= $users->name?>">
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Username</label>
                                    <div class="form-icon position-relative">
                                        <i data-feather="user-check" class="fea icon-sm icons"></i>
                                        <input name="username" id="last" type="text" class="form-control ps-5" placeholder="Username :" value="<?= $users->username?>">
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">No. Telepon</label>
                                    <div class="form-icon position-relative">
                                        <i data-feather="phone" class="fea icon-sm icons"></i>
                                        <input name="telephone" id="email" type="number" class="form-control ps-5" placeholder="No. Telepon :" value="<?= $users->telephone?>">
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-12">
                                <input type="submit" id="submit" name="send" class="btn btn-primary" value="Save Changes">
                            </div>
                            <!--end col-->
                        </form>
                        <!--end form-->
                    </div>
                </div>
            </div>
            <!--end col-->

            <div class="col-lg-6 mt-4">
                <div class="card border-0 rounded shadow p-4">
                    <h5 class="mb-0">Ubah Kata Sandi :</h5>
                    <form action="account/change_password" method="POST">
                        <div class="row mt-4">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Kata Sandi Lama :</label>
                                    <div class="form-icon position-relative">
                                        <i data-feather="key" class="fea icon-sm icons"></i>
                                        <input type="password" name="oldPassword" class="form-control ps-5" placeholder="Kata Sandi Lama :" required="">
                                    </div>
                                </div>
                            </div>
                            <!--end col-->

                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Kata Sandi Baru :</label>
                                    <div class="form-icon position-relative">
                                        <i data-feather="key" class="fea icon-sm icons"></i>
                                        <input type="password" name="newPassword" class="form-control ps-5" placeholder="Kata Sandi Baru :" required="">
                                    </div>
                                </div>
                            </div>
                            <!--end col-->

                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Konfirmasi Kata Sandi :</label>
                                    <div class="form-icon position-relative">
                                        <i data-feather="key" class="fea icon-sm icons"></i>
                                        <input type="password" name="confirmPassword" class="form-control ps-5" placeholder="Konfirmasi Kata Sandi :" required="">
                                    </div>
                                </div>
                            </div>
                            <!--end col-->

                            <div class="col-lg-12 mt-2 mb-0">
                                <button class="btn btn-primary">Save password</button>
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
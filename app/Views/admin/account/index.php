<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="layout-specing">
        <div class="d-md-flex justify-content-between align-items-center">
            <h5 class="mb-0"><?= $title ?></h5>

            <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
                <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                    <li class="breadcrumb-item text-capitalize">Akun Saya</li>
                    <li class="breadcrumb-item text-capitalize active" aria-current="page"><?= $title ?></li>
                </ul>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-6 mt-4">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <h5 class="text-md-start text-center mb-0">Personal Detail :</h5>

                        <div class="mt-4">
                            <center>
                                <img src="<?= site_url('images/avatar/' . $users->image) ?>" class="avatar avatar-medium rounded-circle shadow me-md-4" id="chosen-image" alt="">
                            </center>
                        </div>

                        <?= form_open_multipart('', ['class' => 'formProfile']); ?>
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id" value="<?= $users->id ?>">
                        <input type="hidden" name="old_image" value="<?= $users->image ?>">
                        <div class="col-md-12 mt-4">
                            <div class="mb-3">
                                <label class="form-label">Foto</label>
                                <div class="form-icon position-relative">
                                    <i data-feather="image" class="fea icon-sm icons"></i>
                                    <input name="image" id="image" type="file" class="form-control ps-5">
                                    <div class="invalid-feedback errorImage"></div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-md-12 mt-4">
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                <div class="form-icon position-relative">
                                    <i data-feather="user" class="fea icon-sm icons"></i>
                                    <input name="name" id="name" type="text" class="form-control ps-5" placeholder="Nama Lengkap :" value="<?= $users->name ?>">
                                    <div class="invalid-feedback errorName"></div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Username <span class="text-danger">*</span></label>
                                <div class="form-icon position-relative">
                                    <i data-feather="user-check" class="fea icon-sm icons"></i>
                                    <input name="username" id="username" type="text" class="form-control ps-5" placeholder="Username :" value="<?= $users->username ?>">
                                    <div class="invalid-feedback errorUsername"></div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">No. Telepon <span class="text-danger">*</span></label>
                                <div class="form-icon position-relative">
                                    <i data-feather="phone" class="fea icon-sm icons"></i>
                                    <input name="telephone" id="telephone" type="number" class="form-control ps-5" placeholder="No. Telepon :" value="<?= $users->telephone ?>">
                                    <div class="invalid-feedback errorTelephone"></div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-md-12">
                            <button type="submit" id="save" class="btn btn-primary">Simpan Profil</button>
                        </div>
                        <!--end col-->
                        <?= form_close(); ?>
                        <!--end form-->
                    </div>
                </div>
            </div>
            <!--end col-->

            <div class="col-lg-6 mt-4">
                <div class="card border-0 rounded shadow p-4">
                    <h5 class="mb-0">Ubah Kata Sandi : </h5>
                    <?= form_open('admin/account/changePassword', ['class' => 'formPassword']); ?>
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" value="<?= $users->id ?>">
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Kata Sandi Lama : <span class="text-danger">*</span></label>
                                <div class="form-icon position-relative">
                                    <i data-feather="key" class="fea icon-sm icons"></i>
                                    <input type="password" name="oldPassword" id="oldPassword" class="form-control ps-5" placeholder="Kata Sandi Lama :">
                                    <div class="invalid-feedback errorOldPassword"></div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Kata Sandi Baru : <span class="text-danger">*</span></label>
                                <div class="form-icon position-relative">
                                    <i data-feather="key" class="fea icon-sm icons"></i>
                                    <input type="password" name="newPassword" id="newPassword" class="form-control ps-5" placeholder="Kata Sandi Baru :">
                                    <div class="invalid-feedback errorNewPassword"></div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Konfirmasi Kata Sandi : <span class="text-danger">*</span></label>
                                <div class="form-icon position-relative">
                                    <i data-feather="key" class="fea icon-sm icons"></i>
                                    <input type="password" name="confirmPassword" id="confirmPassword" class="form-control ps-5 <?= ($validation->hasError('confirmPassword')) ? 'is-invalid' : '' ?>" placeholder="Konfirmasi Kata Sandi :">
                                    <div class="invalid-feedback errorConfirmPassword"></div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->

                        <div class="col-lg-12 mt-2 mb-0">
                            <button type="submit" class="btn btn-primary" id="savePassword">Simpan Kata Sandi</button>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                    <?= form_close(); ?>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
</div>
<!--end container-->

<script src="<?= base_url() ?>/assets/js/upload.js"></script>
<script>
    $("#save").click(function(e) {
        e.preventDefault();
        let form = $('.formProfile')[0];
        let data = new FormData(form);

        $.ajax({
            type: "post",
            url: "<?= site_url('admin/account/update') ?>",
            data: data,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            dataType: "json",
            beforeSend: function() {
                $('#save').attr('disable', 'disabled');
                $('#save').html('<i class="fa-solid fa-spin fa-spinner"></i>');
            },
            complete: function() {
                $('#save').removeAttr('disable');
                $('#save').html('Simpan');
            },
            success: function(response) {
                if (response.error) {
                    if (response.error.name) {
                        $('#name').addClass('is-invalid');
                        $('.errorName').html(response.error.name);
                    } else {
                        $('#name').removeClass('is-invalid');
                        $('.errorName').html('');
                    }

                    if (response.error.username) {
                        $('#username').addClass('is-invalid');
                        $('.errorUsername').html(response.error.username);
                    } else {
                        $('#username').removeClass('is-invalid');
                        $('.errorUsername').html('');
                    }

                    if (response.error.telephone) {
                        $('#telephone').addClass('is-invalid');
                        $('.errorTelephone').html(response.error.telephone);
                    } else {
                        $('#telephone').removeClass('is-invalid');
                        $('.errorTelephone').html('');
                    }

                    if (response.error.image) {
                        $('#image').addClass('is-invalid');
                        $('.errorImage').html(response.error.image);
                    } else {
                        $('#image').removeClass('is-invalid');
                        $('.errorImage').html('');
                    }
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: response.success,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        })
    })

    $('.formPassword').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: 'json',
            beforeSend: function() {
                $('#savePassword').attr('disable', 'disabled');
                $('#savePassword').html('<i class="fa-solid fa-spin fa-spinner"></i>');
            },
            complete: function() {
                $('#savePassword').removeAttr('disable');
                $('#savePassword').html('Simpan Kata Sandi');
            },
            success: function(response) {
                if (response.error) {
                    if (response.error.oldPassword) {
                        $('#oldPassword').addClass('is-invalid');
                        $('.errorOldPassword').html(response.error.oldPassword);
                    } else {
                        $('#oldPassword').removeClass('is-invalid');
                        $('.errorOldPassword').html('');
                    }

                    if (response.error.newPassword) {
                        $('#newPassword').addClass('is-invalid');
                        $('.errorNewPassword').html(response.error.newPassword);
                    } else {
                        $('#newPassword').removeClass('is-invalid');
                        $('.errorNewPassword').html('');
                    }

                    if (response.error.confirmPassword) {
                        $('#confirmPassword').addClass('is-invalid');
                        $('.errorConfirmPassword').html(response.error.confirmPassword);
                    } else {
                        $('#confirmPassword').removeClass('is-invalid');
                        $('.errorConfirmPassword').html('');
                    }
                } else {
                    if (response.wrong) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: response.wrong,
                        })
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: response.success,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    }
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        })

        return false;
    })
</script>
<?= $this->endSection(); ?>
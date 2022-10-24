<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('admin/users/create', ['class' => 'formUser']); ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                            <input name="name" id="name" type="text" class="form-control" value="<?= old('name') ?>" placeholder="Nama Lengkap">
                            <div class="invalid-feedback errorName">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Username <span class="text-danger">*</span></label>
                            <input name="username" id="username" type="text" class="form-control" value="<?= old('username') ?>" placeholder="Username">
                            <div class="invalid-feedback errorUsername">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Kata Sandi <span class="text-danger">*</span></label>
                            <input name="password" id="password" type="password" class="form-control" value="<?= old('password') ?>" placeholder="Kata Sandi">
                            <div class="invalid-feedback errorPassword">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Konfirmasi Kata Sandi <span class="text-danger">*</span></label>
                            <input name="confirm_password" id="confirm_password" type="password" class="form-control" value="<?= old('confirm_password') ?>" placeholder="Konfirmasi Kata Sandi">
                            <div class="invalid-feedback errorConfirmPassword">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Nomor Telepon <span class="text-danger">*</span></label>
                            <input name="telephone" id="telephone" type="tel" class="form-control" value="<?= old('telephone') ?>" placeholder="Nomor Telepon">
                            <div class="invalid-feedback errorTelephone">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Hak Akses <span class="text-danger">*</span></label>
                            <select class="form-control" id="role_id" name="role_id">
                                <option value="" selected disabled>-- Pilih --</option>
                                <?php foreach ($roles as $role) : ?>
                                    <option value="<?= $role->id ?>" <?= $role->id == old('role_id') ? 'selected' : '' ?>><?= $role->name ?></option>
                                <?php endforeach ?>
                            </select>
                            <div class="invalid-feedback errorRoleId">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" id="save">Simpan</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>


<script>
    $('.formUser').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: 'json',
            beforeSend: function() {
                $('#save').attr('disable', 'disabled');
                $('#save').html('<i class="fa-solid fa-spin fa-spinner"></i>');
            },
            complete: function() {
                $('#save').removeAttr('disable');
                $('#save').html('Simpan');
            },
            success: function(response) {
                if (response.error) {;
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

                    if (response.error.password) {
                        $('#password').addClass('is-invalid');
                        $('.errorPassword').html(response.error.password);
                    } else {
                        $('#password').removeClass('is-invalid');
                        $('.errorPassword').html('');
                    }

                    if (response.error.confirm_password) {
                        $('#confirm_password').addClass('is-invalid');
                        $('.errorConfirmPassword').html(response.error.confirm_password);
                    } else {
                        $('#confirm_password').removeClass('is-invalid');
                        $('.errorConfirmPassword').html('');
                    }

                    if (response.error.telephone) {
                        $('#telephone').addClass('is-invalid');
                        $('.errorTelephone').html(response.error.telephone);
                    } else {
                        $('#telephone').removeClass('is-invalid');
                        $('.errorTelephone').html('');
                    }

                    if (response.error.role_id) {
                        $('#role_id').addClass('is-invalid');
                        $('.errorRoleId').html(response.error.role_id);
                    } else {
                        $('#role_id').removeClass('is-invalid');
                        $('.errorRoleId').html('');
                    }
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: response.success,
                    })
                    $('#addModal').modal('hide');
                    users();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        })

        return false;
    })
</script>
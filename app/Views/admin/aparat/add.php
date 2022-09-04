<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open_multipart('', ['class' => 'formAparatDesa']); ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label">Nama<span class="text-danger">*</span></label>
                            <input name="name" id="name" type="text" class="form-control" value="<?= old('name') ?>" placeholder="Nama Lengkap">
                            <div class="invalid-feedback errorName">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            <div class="invalid-feedback errorJenisKelamin">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                            <input name="tempat_lahir" id="tempat_lahir" type="text" class="form-control" value="<?= old('tempat_lahir') ?>" placeholder="Tempat Lahir">
                            <div class="invalid-feedback errorTempatLahir">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                            <input name="tgl_lahir" id="tgl_lahir" type="date" class="form-control" value="<?= old('tgl_lahir') ?>" placeholder="Tanggal Lahir">
                            <div class="invalid-feedback errorTanggalLahir">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label">Jabatan <span class="text-danger">*</span></label>
                            <select name="jabatan" id="jabatan" class="form-control">
                                <option value="">-- Pilih Jabatan --</option>
                                <?php foreach ($jabatan as $row) : ?>
                                    <option value="<?= $row->id ?>"><?= $row->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback errorJabatan">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pendidikan Terakhir <span class="text-danger">*</span></label>
                            <select name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-control">
                                <option value="">-- Pilih Pendidikan Terakhir --</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                                <option value="S1">S1</option>
                            </select>
                            <div class="invalid-feedback errorPendidikanTerakhir">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Pengangkatan <span class="text-danger">*</span></label>
                            <input name="tgl_pengangkatan" id="tgl_pengangkatan" type="date" class="form-control" value="<?= old('tgl_pengangkatan') ?>" placeholder="Tanggal Lahir">
                            <div class="invalid-feedback errorTanggalPengangkatan">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No SK</label>
                            <input name="no_sk" id="no_sk" type="text" class="form-control" value="<?= old('no_sk') ?>" placeholder="No SK">
                            <div class="invalid-feedback errorNoSk">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label">No Telepon</label>
                            <input name="no_hp" id="no_hp" type="number" class="form-control" value="<?= old('no_hp') ?>" placeholder="No Telepon">
                            <div class="invalid-feedback errorNoHp">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Foto</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="/images/aparat/Avatar.png" alt="default-sampul" class="img-thumbnail img-preview">
                                </div>
                                <div class="col-md-8">
                                    <input name="foto" id="foto" type="file" class="form-control img-preview" value="<?= old('foto') ?>" placeholder="Foto" onchange="previewImg()">
                                    <div class="invalid-feedback errorFoto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" id="save">Simpan</button>
                    </div>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<script>
    function previewImg() {
        const foto = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');
        const fileFoto = new FileReader();

        fileFoto.readAsDataURL(foto.files[0]);

        fileFoto.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }


    $("#save").click(function(e) {
        e.preventDefault();
        let form = $('.formAparatDesa')[0];
        let data = new FormData(form);

        $.ajax({
            type: "post",
            url: "<?= site_url('admin/aparat_desa/create') ?>",
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

                    if (response.error.jenis_kelamin) {
                        $('#jenis_kelamin').addClass('is-invalid');
                        $('.errorJenisKelamin').html(response.error.jenis_kelamin);
                    } else {
                        $('#jenis_kelamin').removeClass('is-invalid');
                        $('.errorJenisKelamin').html('');
                    }

                    if (response.error.tempat_lahir) {
                        $('#tempat_lahir').addClass('is-invalid');
                        $('.errorTempatLahir').html(response.error.tempat_lahir);
                    } else {
                        $('#tempat_lahir').removeClass('is-invalid');
                        $('.errorTempatLahir').html('');
                    }

                    if (response.error.tgl_lahir) {
                        $('#tgl_lahir').addClass('is-invalid');
                        $('.errorTanggalLahir').html(response.error.tgl_lahir);
                    } else {
                        $('#tgl_lahir').removeClass('is-invalid');
                        $('.errorTanggalLahir').html('');
                    }

                    if (response.error.jabatan) {
                        $('#jabatan').addClass('is-invalid');
                        $('.errorJabatan').html(response.error.jabatan);
                    } else {
                        $('#jabatan').removeClass('is-invalid');
                        $('.errorJabatan').html('');
                    }

                    if (response.error.pendidikan_terakhir) {
                        $('#pendidikan_terakhir').addClass('is-invalid');
                        $('.errorPendidikanTerakhir').html(response.error.pendidikan_terakhir);
                    } else {
                        $('#pendidikan_terakhir').removeClass('is-invalid');
                        $('.errorPendidikanTerakhir').html('');
                    }

                    if (response.error.tgl_pengangkatan) {
                        $('#tgl_pengangkatan').addClass('is-invalid');
                        $('.errorTanggalPengangkatan').html(response.error.tgl_pengangkatan);
                    } else {
                        $('#tgl_pengangkatan').removeClass('is-invalid');
                        $('.errorTanggalPengangkatan').html('');
                    }

                    if (response.error.foto) {
                        $('#foto').addClass('is-invalid');
                        $('.errorFoto').html(response.error.foto);
                    } else {
                        $('#foto').removeClass('is-invalid');
                        $('.errorFoto').html('');
                    }
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: response.success,
                    })
                    $('#addModal').modal('hide');
                    dataAparat();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        })
    })
</script>
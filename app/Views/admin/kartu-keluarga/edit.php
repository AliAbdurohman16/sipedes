<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('admin/kartu_keluarga/update', ['class' => 'formKartuKeluarga']); ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Nomor Kartu Keluarga <span class="text-danger">*</span></label>
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <input name="no_kk" id="no_kk" type="number" class="form-control" value="<?= $no_kk ?>" placeholder="Nomor Kartu Keluarga">
                            <div class="invalid-feedback errorNoKK">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Kepala <span class="text-danger">*</span></label>
                            <input name="nama_kepala" id="nama_kepala" type="text" class="form-control" value="<?= $nama_kepala ?>" placeholder="Nama Lengkap">
                            <div class="invalid-feedback errorNamaKepala">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Provinsi <span class="text-danger">*</span></label>
                            <select name="provinsi" id="provinsi" class="form-control">
                                <option value="">-- Pilih Provinsi --</option>
                                <option value="Jawa Barat" <?= $provinsi == 'Jawa Barat' ? 'selected' : ''; ?>>Jawa Barat</option>
                                <option value="Jawa Tengah" <?= $provinsi == 'Jawa Tengah' ? 'selected' : ''; ?>>Jawa Tengah</option>
                                <option value="Jawa Timur" <?= $provinsi == 'Jawa Timur' ? 'selected' : ''; ?>>Jawa Timur</option>
                            </select>
                            <div class="invalid-feedback errorProvinsi">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kabupaten <span class="text-danger">*</span></label>
                            <select name="kabupaten" id="kabupaten" class="form-control">
                                <option value="">-- Pilih Kabupaten --</option>
                                <option value="Cirebon" <?= $kabupaten == 'Cirebon' ? 'selected' : ''; ?>>Cirebon</option>
                                <option value="Indramayu" <?= $kabupaten == 'Indramayu' ? 'selected' : ''; ?>>Indramayu</option>
                                <option value="Kuningan" <?= $kabupaten == 'Kuningan' ? 'selected' : ''; ?>>Kuningan</option>
                                <option value="Majalengka" <?= $kabupaten == 'Majalengka' ? 'selected' : ''; ?>>Majalengka</option>
                            </select>
                            <div class="invalid-feedback errorKabupaten">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Kecamatan <span class="text-danger">*</span></label>
                            <select name="kecamatan" id="kecamatan" class="form-control">
                                <option value="">-- Pilih Kecamatan --</option>
                                <option value="Ciawigebang" <?= $kecamatan == 'Ciawigebang' ? 'selected' : ''; ?>>Ciawigebang</option>
                                <option value="Cibeureum" <?= $kecamatan == 'Cibeureum' ? 'selected' : ''; ?>>Cibeureum</option>
                                <option value="Cibingbin" <?= $kecamatan == 'Cibingbin' ? 'selected' : ''; ?>>Cibingbin</option>
                                <option value="Cigugur" <?= $kecamatan == 'Cigugur' ? 'selected' : ''; ?>>Cigugur</option>
                                <option value="Kuningan" <?= $kecamatan == 'Kuningan' ? 'selected' : ''; ?>>Kuningan</option>
                            </select>
                            <div class="invalid-feedback errorKecamatan">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kelurahan <span class="text-danger">*</span></label>
                            <select name="kelurahan" id="kelurahan" class="form-control">
                                <option value="">-- Pilih Kelurahan --</option>
                                <option value="Cibeurem" <?= $kelurahan == 'Cibeurem' ? 'selected' : ''; ?>>Cibeurem</option>
                                <option value="Ancaran" <?= $kelurahan == 'Ancaran' ? 'selected' : ''; ?>>Ancaran</option>
                                <option value="Cibinuang" <?= $kelurahan == 'Cibinuang' ? 'selected' : ''; ?>>Cibinuang</option>
                                <option value="Karangtawang" <?= $kelurahan == 'Karangtawang' ? 'selected' : ''; ?>>Karangtawang</option>
                            </select>
                            <div class="invalid-feedback errorKelurahan">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">RT / RW <span class="text-danger">*</span></label>
                            <div class="row">
                                <div class="col-md-6">
                                    <select name="rt" id="rt" class="form-control">
                                        <option value="">-- Pilih RT --</option>
                                        <?php foreach ($rts as $rt) : ?>
                                            <option value="<?= $rt->id ?>" <?= $rt->id == $rt_id ? 'selected' : '' ?>><?= $rt->number ?> - <?= $rt->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback errorRt">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <select name="rw" id="rw" class="form-control">
                                        <option value="">-- Pilih RW --</option>
                                        <?php foreach ($rws as $rw) : ?>
                                            <option value="<?= $rw->id ?>" <?= $rw->id == $rw_id ? 'selected' : '' ?>><?= $rw->number ?> - <?= $rw->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback errorRw">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat <span class="text-danger">*</span></label>
                            <textarea name="alamat" id="alamat" rows="1" class="form-control" placeholder="Alamat"><?= $alamat; ?></textarea>
                            <div class="invalid-feedback errorAlamat">
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
    </div>
</div>

<script>
    $('.formKartuKeluarga').submit(function(e) {
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
                if (response.error) {
                    //No KK
                    if (response.error.no_kk) {
                        $('#no_kk').addClass('is-invalid');
                        $('.errorNoKK').html(response.error.no_kk);
                    } else {
                        $('#no_kk').removeClass('is-invalid');
                        $('.errorNoKK').html('');
                    }

                    //Nama Kepala Keluarga
                    if (response.error.nama_kepala) {
                        $('#nama_kepala').addClass('is-invalid');
                        $('.errorNamaKepala').html(response.error.nama_kepala);
                    } else {
                        $('#nama_kepala').removeClass('is-invalid');
                        $('.errorNamaKepala').html('');
                    }

                    //Provinsi
                    if (response.error.provinsi) {
                        $('#provinsi').addClass('is-invalid');
                        $('.errorProvinsi').html(response.error.provinsi);
                    } else {
                        $('#provinsi').removeClass('is-invalid');
                        $('.errorProvinsi').html('');
                    }

                    //Kabupaten
                    if (response.error.kabupaten) {
                        $('#kabupaten').addClass('is-invalid');
                        $('.errorKabupaten').html(response.error.kabupaten);
                    } else {
                        $('#kabupaten').removeClass('is-invalid');
                        $('.errorKabupaten').html('');
                    }

                    //Kecamatan
                    if (response.error.kecamatan) {
                        $('#kecamatan').addClass('is-invalid');
                        $('.errorKecamatan').html(response.error.kecamatan);
                    } else {
                        $('#kecamatan').removeClass('is-invalid');
                        $('.errorKecamatan').html('');
                    }

                    //Kelurahan
                    if (response.error.kelurahan) {
                        $('#kelurahan').addClass('is-invalid');
                        $('.errorKelurahan').html(response.error.kelurahan);
                    } else {
                        $('#kelurahan').removeClass('is-invalid');
                        $('.errorKelurahan').html('');
                    }

                    //RW
                    if (response.error.rw) {
                        $('#rw').addClass('is-invalid');
                        $('.errorRw').html(response.error.rw);
                    } else {
                        $('#rw').removeClass('is-invalid');
                        $('.errorRw').html('');
                    }

                    //RT
                    if (response.error.rt) {
                        $('#rt').addClass('is-invalid');
                        $('.errorRt').html(response.error.rt);
                    } else {
                        $('#rt').removeClass('is-invalid');
                        $('.errorRt').html('');
                    }

                    //Alamat
                    if (response.error.alamat) {
                        $('#alamat').addClass('is-invalid');
                        $('.errorAlamat').html(response.error.alamat);
                    } else {
                        $('#alamat').removeClass('is-invalid');
                        $('.errorAlamat').html('');
                    }

                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: response.success,
                    })
                    $('#editModal').modal('hide');
                    dataKartuKeluarga();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        })
        return false
    })
</script>
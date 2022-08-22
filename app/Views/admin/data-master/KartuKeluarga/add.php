<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('admin/kartu-keluarga/create', ['class' => 'formKartuKeluarga']); ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Nomor Kartu Keluarga <span class="text-danger">*</span></label>
                            <input name="no_kk" id="no_kk" type="number" class="form-control" value="<?= old('no_kk') ?>" placeholder="Nomor Kartu Keluarga">
                            <div class="invalid-feedback errorNoKK">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Kepala <span class="text-danger">*</span></label>
                            <input name="nama_kepala" id="nama_kepala" type="text" class="form-control" value="<?= old('nama_kepala') ?>" placeholder="Nama Lengkap">
                            <div class="invalid-feedback errorNamaKepala">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Provinsi <span class="text-danger">*</span></label>
                            <select name="provinsi" id="provinsi" class="form-control">
                                <option value="">-- Pilih Provinsi --</option>
                                <option value="Jawa Barat">Jawa Barat</option>
                                <option value="Jawa Tengah">Jawa Tengah</option>
                                <option value="Jawa Timur">Jawa Timur</option>
                            </select>
                            <div class="invalid-feedback errorProvinsi">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kabupaten <span class="text-danger">*</span></label>
                            <select name="kabupaten" id="kabupaten" class="form-control">
                                <option value="">-- Pilih Kabupaten --</option>
                                <option value="Cirebon">Cirebon</option>
                                <option value="Indramayu">Indramayu</option>
                                <option value="Kuningan">Kuningan</option>
                                <option value="Majalengka">Majalengka</option>
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
                                <option value="Ciawigebang">Ciawigebang</option>
                                <option value="Cibeureum">Cibeureum</option>
                                <option value="Cibingbin">Cibingbin</option>
                                <option value="Cigugur">Cigugur</option>
                                <option value="Kuningan">Kuningan</option>
                            </select>
                            <div class="invalid-feedback errorKecamatan">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kelurahan <span class="text-danger">*</span></label>
                            <select name="kelurahan" id="kelurahan" class="form-control">
                                <option value="">-- Pilih Kelurahan --</option>
                                <option value="Cibeurem">Cibeurem</option>
                                <option value="Ancaran">Ancaran</option>
                                <option value="Cibinuang">Cibinuang</option>
                                <option value="Karangtawang">Karangtawang</option>
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
                                            <option value="<?= $rt->id ?>"><?= $rt->number ?> - <?= $rt->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback errorRt">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <select name="rw" id="rw" class="form-control">
                                        <option value="">-- Pilih RW --</option>
                                        <?php foreach ($rws as $rw) : ?>
                                            <option value="<?= $rw->id ?>"><?= $rw->number ?> - <?= $rw->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback errorRw">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat <span class="text-danger">*</span></label>
                            <textarea name="alamat" id="alamat" rows="1" class="form-control" placeholder="Alamat"></textarea>
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
                    //NIK
                    if (response.error.nik) {
                        $('#nik').addClass('is-invalid');
                        $('.errorNik').html(response.error.nik);
                    } else {
                        $('#nik').removeClass('is-invalid');
                        $('.errorNik').html('');
                    }

                    //name
                    if (response.error.name) {
                        $('#name').addClass('is-invalid');
                        $('.errorName').html(response.error.name);
                    } else {
                        $('#name').removeClass('is-invalid');
                        $('.errorName').html('');
                    }

                    //Jenis kelamin
                    if (response.error.jenis_kelamin) {
                        $('#jenis_kelamin').addClass('is-invalid');
                        $('.errorJenisKelamin').html(response.error.jenis_kelamin);
                    } else {
                        $('#jenis_kelamin').removeClass('is-invalid');
                        $('.errorJenisKelamin').html('');
                    }

                    //Tempat lahir
                    if (response.error.tempat_lahir) {
                        $('#tempat_lahir').addClass('is-invalid');
                        $('.errorTempatLahir').html(response.error.tempat_lahir);
                    } else {
                        $('#tempat_lahir').removeClass('is-invalid');
                        $('.errorTempatLahir').html('');
                    }

                    //Tanggal Lahir
                    if (response.error.tgl_lahir) {
                        $('#tgl_lahir').addClass('is-invalid');
                        $('.errorTanggalLahir').html(response.error.tgl_lahir);
                    } else {
                        $('#tgl_lahir').removeClass('is-invalid');
                        $('.errorTanggalLahir').html('');
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

                    //Gol Darah
                    if (response.error.gol_darah) {
                        $('#gol_darah').addClass('is-invalid');
                        $('.errorGolDarah').html(response.error.gol_darah);
                    } else {
                        $('#gol_darah').removeClass('is-invalid');
                        $('.errorGolDarah').html('');
                    }

                    //Gol Darah
                    if (response.error.agama) {
                        $('#agama').addClass('is-invalid');
                        $('.errorAgama').html(response.error.agama);
                    } else {
                        $('#agama').removeClass('is-invalid');
                        $('.errorAgama').html('');
                    }

                    //Status Kawin
                    if (response.error.status_kawin) {
                        $('#status_kawin').addClass('is-invalid');
                        $('.errorStatusKawin').html(response.error.status_kawin);
                    } else {
                        $('#status_kawin').removeClass('is-invalid');
                        $('.errorStatusKawin').html('');
                    }

                    //Pendidikan Terakhir
                    if (response.error.pendidikan_terakhir) {
                        $('#pendidikan_terakhir').addClass('is-invalid');
                        $('.errorPendidikanTerakhir').html(response.error.pendidikan_terakhir);
                    } else {
                        $('#pendidikan_terakhir').removeClass('is-invalid');
                        $('.errorPendidikanTerakhir').html('');
                    }

                    //Pekerjaan
                    if (response.error.pekerjaan) {
                        $('#pekerjaan').addClass('is-invalid');
                        $('.errorPekerjaan').html(response.error.pekerjaan);
                    } else {
                        $('#pekerjaan').removeClass('is-invalid');
                        $('.errorPekerjaan').html('');
                    }

                    //Nama Ayah
                    if (response.error.nama_ayah) {
                        $('#nama_ayah').addClass('is-invalid');
                        $('.errorNamaAyah').html(response.error.nama_ayah);
                    } else {
                        $('#nama_ayah').removeClass('is-invalid');
                        $('.errorNamaAyah').html('');
                    }

                    //Nama Ibu
                    if (response.error.nama_ibu) {
                        $('#nama_ibu').addClass('is-invalid');
                        $('.errorNamaIbu').html(response.error.nama_ibu);
                    } else {
                        $('#nama_ibu').removeClass('is-invalid');
                        $('.errorNamaIbu').html('');
                    }
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: response.success,
                    })
                    $('#addModal').modal('hide');
                    dataJabatan();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        })
        return false
    })
</script>
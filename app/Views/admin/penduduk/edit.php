<!-- Add Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('admin/penduduk/update', ['class' => 'formPenduduk']); ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label">Nomor Induk Kependudukan <span class="text-danger">*</span></label>
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <input name="nik" id="nik" type="number" class="form-control" value="<?= $nik ?>" placeholder="Nomor Induk Kependudukan">
                            <div class="invalid-feedback errorNik">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                            <input name="name" id="name" type="text" class="form-control" value="<?= $name ?>" placeholder="Nama Lengkap">
                            <div class="invalid-feedback errorName">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="L" <?= $jenis_kelamin == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                                <option value="P" <?= $jenis_kelamin == 'P' ? 'selected' : '' ?>>Perempuan</option>
                            </select>
                            <div class="invalid-feedback errorJenisKelamin">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                            <input name="tempat_lahir" id="tempat_lahir" type="text" class="form-control" value="<?= $tempat_lahir ?>" placeholder="Tempat Lahir">
                            <div class="invalid-feedback errorTempatLahir">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                            <input name="tgl_lahir" id="tgl_lahir" type="date" class="form-control" value="<?= $tgl_lahir ?>" placeholder="Tanggal Lahir">
                            <div class="invalid-feedback errorTanggalLahir">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Provinsi <span class="text-danger">*</span></label>
                            <select name="provinsi" id="provinsi" class="form-control">
                                <option value="">-- Pilih Provinsi --</option>
                                <option value="Jawa Barat" <?= $provinsi == 'Jawa Barat' ? 'selected' : '' ?>>Jawa Barat</option>
                                <option value="Jawa Tengah" <?= $provinsi == 'Jawa Tengah' ? 'selected' : '' ?>>Jawa Tengah</option>
                                <option value="Jawa Timur" <?= $provinsi == 'Jawa Timur' ? 'selected' : '' ?>>Jawa Timur</option>
                            </select>
                            <div class="invalid-feedback errorProvinsi">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kabupaten <span class="text-danger">*</span></label>
                            <select name="kabupaten" id="kabupaten" class="form-control">
                                <option value="">-- Pilih Kabupaten --</option>
                                <option value="Cirebon" <?= $kabupaten == 'Cirebon' ? 'selected' : '' ?>>Cirebon</option>
                                <option value="Indramayu" <?= $kabupaten == 'Indramayu' ? 'selected' : '' ?>>Indramayu</option>
                                <option value="Kuningan" <?= $kabupaten == 'Kuningan' ? 'selected' : '' ?>>Kuningan</option>
                                <option value="Majalengka" <?= $kabupaten == 'Majalengka' ? 'selected' : '' ?>>Majalengka</option>
                            </select>
                            <div class="invalid-feedback errorKabupaten">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label">Kecamatan <span class="text-danger">*</span></label>
                            <select name="kecamatan" id="kecamatan" class="form-control">
                                <option value="">-- Pilih Kecamatan --</option>
                                <option value="Ciawigebang" <?= $kecamatan == 'Ciawigebang' ? 'selected' : '' ?>>Ciawigebang</option>
                                <option value="Cibeureum" <?= $kecamatan == 'Cibeureum' ? 'selected' : '' ?>>Cibeureum</option>
                                <option value="Cibingbin" <?= $kecamatan == 'Cibingbin' ? 'selected' : '' ?>>Cibingbin</option>
                                <option value="Cigugur" <?= $kecamatan == 'Cigugur' ? 'selected' : '' ?>>Cigugur</option>
                                <option value="Kuningan" <?= $kecamatan == 'Kuningan' ? 'selected' : '' ?>>Kuningan</option>
                            </select>
                            <div class="invalid-feedback errorKecamatan">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Desa <span class="text-danger">*</span></label>
                            <select name="desa" id="desa" class="form-control">
                                <option value="">-- Pilih Desa --</option>
                                <option value="Cibeurem" <?= $desa == 'Cibeurem' ? 'selected' : '' ?>>Cibeurem</option>
                                <option value="Ancaran" <?= $desa == 'Ancaran' ? 'selected' : '' ?>>Ancaran</option>
                                <option value="Cibinuang" <?= $desa == 'Cibinuang' ? 'selected' : '' ?>>Cibinuang</option>
                                <option value="Karangtawang" <?= $desa == 'Karangtawang' ? 'selected' : '' ?>>Karangtawang</option>
                            </select>
                            <div class="invalid-feedback errorDesa">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Dusun <span class="text-danger">*</span></label>
                            <select name="dusun" id="dusun" class="form-control">
                                <option value="">-- Pilih Dusun --</option>
                                <?php foreach ($dusuns as $dusun) : ?>
                                    <option value="<?= $dusun->id ?>" <?= $dusun->id == $dusun_id ? 'selected' : '' ?>><?= $dusun->name ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback errorDesa">
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
                        <div class="mb-3">
                            <label class="form-label">Golongan Darah <span class="text-danger">*</span></label>
                            <select name="gol_darah" id="gol_darah" class="form-control">
                                <option value="">-- Pilih Golongan Darah --</option>
                                <option value="A" <?= $gol_darah == 'A' ? 'selected' : '' ?>>A</option>
                                <option value="B" <?= $gol_darah == 'B' ? 'selected' : '' ?>>B</option>
                                <option value="AB" <?= $gol_darah == 'AB' ? 'selected' : '' ?>>AB</option>
                                <option value="O" <?= $gol_darah == 'O' ? 'selected' : '' ?>>O</option>
                            </select>
                            <div class="invalid-feedback errorGolDarah">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Agama <span class="text-danger">*</span></label>
                            <select name="agama" id="agama" class="form-control">
                                <option value="">-- Pilih Agama --</option>
                                <option value="Islam" <?= $agama == 'Islam' ? 'selected' : '' ?>>Islam</option>
                                <option value="Kristen Protestan" <?= $agama == 'Kristen Protestan' ? 'selected' : '' ?>>Kristen Protestan</option>
                                <option value="Katolik" <?= $agama == 'Katolik' ? 'selected' : '' ?>>Katolik</option>
                                <option value="Hindu" <?= $agama == 'Hindu' ? 'selected' : '' ?>>Hindu</option>
                                <option value="Buddha" <?= $agama == 'Buddha' ? 'selected' : '' ?>>Buddha</option>
                                <option value="Konghucu" <?= $agama == 'Konghucu' ? 'selected' : '' ?>>Konghucu</option>
                            </select>
                            <div class="invalid-feedback errorAgama">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label">Status Kawin <span class="text-danger">*</span></label>
                            <select name="status_kawin" id="status_kawin" class="form-control">
                                <option value="">-- Pilih Status Kawin --</option>
                                <option value="Sudah" <?= $status_kawin == 'Sudah' ? 'selected' : '' ?>>Sudah Menikah</option>
                                <option value="Belum" <?= $status_kawin == 'Belum' ? 'selected' : '' ?>>Belum Menikah</option>
                                <option value="Cerai Hidup" <?= $status_kawin == 'Cerai Hidup' ? 'selected' : '' ?>>Cerai Hidup</option>
                                <option value="Cerai Mati" <?= $status_kawin == '"Cerai Mati' ? 'selected' : '' ?>>Cerai Mati</option>
                            </select>
                            <div class="invalid-feedback errorStatusKawin">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pendidikan Terakhir <span class="text-danger">*</span></label>
                            <select name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-control">
                                <option value="">-- Pilih Pendidikan Terakhir --</option>
                                <option value="SD" <?= $pendidikan_terakhir == 'SD' ? 'selected' : '' ?>>SD</option>
                                <option value="SMP" <?= $pendidikan_terakhir == 'SMP' ? 'selected' : '' ?>>SMP</option>
                                <option value="SMA" <?= $pendidikan_terakhir == 'SMA' ? 'selected' : '' ?>>SMA</option>
                                <option value="D3" <?= $pendidikan_terakhir == 'D3' ? 'selected' : '' ?>>D3</option>
                                <option value="S1" <?= $pendidikan_terakhir == 'S1' ? 'selected' : '' ?>>S1</option>
                                <option value="S2" <?= $pendidikan_terakhir == 'S2' ? 'selected' : '' ?>>S2</option>
                            </select>
                            <div class="invalid-feedback errorPendidikanTerakhir">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pekerjaan <span class="text-danger">*</span></label>
                            <select name="pekerjaan" id="pekerjaan" class="form-control">
                                <option value="">-- Pilih Pekerjaan --</option>
                                <option value="Petani" <?= $pekerjaan == 'Petani' ? 'selected' : '' ?>>Petani</option>
                                <option value="Nelayan" <?= $pekerjaan == 'Nelayan' ? 'selected' : '' ?>>Nelayan</option>
                                <option value="Guru" <?= $pekerjaan == 'Guru' ? 'selected' : '' ?>>Guru</option>
                                <option value="Pedagang" <?= $pekerjaan == 'Pedagang' ? 'selected' : '' ?>>Pedagang</option>
                                <option value="PNS" <?= $pekerjaan == 'PNS' ? 'selected' : '' ?>>PNS</option>
                            </select>
                            <div class="invalid-feedback errorPekerjaan">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Ayah <span class="text-danger">*</span></label>
                            <input name="nama_ayah" id="nama_ayah" type="text" class="form-control" value="<?= $nama_ayah ?>" placeholder="Nama Ayah">
                            <div class="invalid-feedback errorNamaAyah">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Ibu <span class="text-danger">*</span></label>
                            <input name="nama_ibu" id="nama_ibu" type="text" class="form-control" value="<?= $nama_ibu ?>" placeholder="Nama Ibu">
                            <div class="invalid-feedback errorNamaIbu">
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
    $('.formPenduduk').submit(function(e) {
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

                    //Desa
                    if (response.error.desa) {
                        $('#desa').addClass('is-invalid');
                        $('.errorDesa').html(response.error.desa);
                    } else {
                        $('#desa').removeClass('is-invalid');
                        $('.errorDesa').html('');
                    }

                    //Dusun
                    if (response.error.dusun) {
                        $('#dusun').addClass('is-invalid');
                        $('.errorDusun').html(response.error.dusun);
                    } else {
                        $('#dusun').removeClass('is-invalid');
                        $('.errorDusun').html('');
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
                    $('#editModal').modal('hide');
                    dataPenduduk();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        })
        return false
    })
</script>
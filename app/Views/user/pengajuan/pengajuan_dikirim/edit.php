<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('user/pengajuan_dikirim/update', ['class' => 'formPengajuanDikirim']); ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" name="id" value="<?= $pd->id?>">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">No Kartu Keluarga <span class="text-danger">*</span></label>
                            <div class="form-icon position-relative">
                                <input name="no_kk" id="no_kk" type="number" class="form-control" value="<?= $pd->no_kk ?>" placeholder="No Kartu Keluarga :" readonly>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">NIK <span class="text-danger">*</span></label>
                            <div class="form-icon position-relative">
                                <input name="nik" id="nik" type="number" class="form-control" value="<?= $pd->nik ?>" placeholder="NIK :" readonly>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                            <div class="form-icon position-relative">
                                <input name="name" id="name" type="text" class="form-control" value="<?= $pd->nama ?>" placeholder="Nama Lengkap :" readonly>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">No Whatsapp <span class="text-danger">*</span></label>
                            <div class="form-icon position-relative">
                                <input name="telepon" id="telepon" type="number" class="form-control" value="<?= $pd->telepon ?>" placeholder="No Whatsapp : contoh 628****">
                                <small>Gunakan no whatsapp di awali dengan 62 seperti contoh : 6281234***</small>
                                <div class="invalid-feedback errorTelepon"></div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Jenis Pengajuan Surat <span class="text-danger">*</span></label>
                            <select class="form-select form-control" id="jenis" name="jenis" aria-label="Default select example">
                                <option selected>Pilih Jenis Pengajuan Surat</option>
                                <option value="Keterangan Nama" <?= $pd->jenis == 'Keterangan Nama' ? 'selected' : '' ?>>Keterangan Nama</option>
                                <option value="Keterangan Domisli" <?= $pd->jenis == 'Keterangan Domisli' ? 'selected' : '' ?>>Keterangan Domisli</option>
                                <option value="Keterangan Belum Nikah" <?= $pd->jenis == 'Keterangan Belum Nikah' ? 'selected' : '' ?>>Keterangan Belum Nikah</option>
                                <option value="Keterangan Lahir" <?= $pd->jenis == 'Keterangan Lahir' ? 'selected' : '' ?>>Keterangan Lahir</option>
                                <option value="Keterangan Penghasilan" <?= $pd->jenis == 'Keterangan Penghasilan' ? 'selected' : '' ?>>Keterangan Penghasilan</option>
                                <option value="Keterangan Pindah KK" <?= $pd->jenis == 'Keterangan Pindah KK' ? 'selected' : '' ?>>Keterangan Pindah KK</option>
                                <option value="Keterangan Rame-rame" <?= $pd->jenis == 'Keterangan Rame-rame' ? 'selected' : '' ?>>Keterangan Rame-rame</option>
                                <option value="Keterangan SKU" <?= $pd->jenis == 'Keterangan SKU' ? 'selected' : '' ?>>Keterangan SKU</option>
                                <option value="Keterangan SKTM" <?= $pd->jenis == 'Keterangan SKTM' ? 'selected' : '' ?>>Keterangan SKTM</option>
                                <option value="Keterangan SKCK" <?= $pd->jenis == 'Keterangan SKCK' ? 'selected' : '' ?>>Keterangan SKCK</option>
                                <option value="Keterangan Kematian" <?= $pd->jenis == 'Keterangan Kematian' ? 'selected' : '' ?>>Keterangan Kematian</option>
                            </select>
                            <div class="invalid-feedback errorJenis"></div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Keterangan <span class="text-danger">*</span></label>
                            <div class="form-icon position-relative">
                                <textarea name="keterangan" id="keterangan" rows="4" class="form-control" placeholder="Keterangan :"><?= $pd->keterangan ?></textarea>
                                <div class="invalid-feedback errorKeterangan"></div>
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
    $('.formPengajuanDikirim').submit(function(e) {
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
                    if (response.error.telepon) {
                        $('#telepon').addClass('is-invalid');
                        $('.errorTelepon').html(response.error.telepon);
                    } else {
                        $('#telepon').removeClass('is-invalid');
                        $('.errorTelepon').html('');
                    }
                    
                    if (response.error.jenis) {
                        $('#jenis').addClass('is-invalid');
                        $('.errorJenis').html(response.error.jenis);
                    } else {
                        $('#jenis').removeClass('is-invalid');
                        $('.errorJenis').html('');
                    }
                    
                    if (response.error.keterangan) {
                        $('#keterangan').addClass('is-invalid');
                        $('.errorKeterangan').html(response.error.keterangan);
                    } else {
                        $('#keterangan').removeClass('is-invalid');
                        $('.errorKeterangan').html('');
                    }

                } else {
                    if (response.error_message) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: response.error_message,
                        })
                        $('#editModal').modal('hide');
                        pengajuanDikirim();
                        
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: response.success,
                        })
                        $('#editModal').modal('hide');
                        pengajuanDikirim();
                    }
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        })

        return false
    })
</script>
<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('admin/data_pengajuan_masuk/create', ['class' => 'formPengajuanMasuk']); ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" name="id" value="<?= $pd->id?>">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">No Whatsapp <span class="text-danger">*</span></label>
                            <div class="form-icon position-relative">
                                <input name="telepon" id="telepon" type="number" class="form-control" value="<?= $pd->telepon ?>" placeholder="No Whatsapp : contoh 628****" readonly>
                                <small>Gunakan no whatsapp di awali dengan 62 seperti contoh : 6281234***</small>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Informasi <span class="text-danger">*</span></label>
                            <div class="form-icon position-relative">
                                <textarea name="informasi" id="informasi" rows="4" class="form-control" placeholder="Informasi :"></textarea>
                                <div class="invalid-feedback errorInformasi"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" id="send">Kirim</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<script>
    $('.formPengajuanMasuk').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: 'json',
            beforeSend: function() {
                $('#send').attr('disable', 'disabled');
                $('#send').html('<i class="fa-solid fa-spin fa-spinner"></i>');
            },
            complete: function() {
                $('#send').removeAttr('disable');
                $('#send').html('Simpan');
            },
            success: function(response) {
                if (response.error) {
                    if (response.error.informasi) {
                        $('#informasi').addClass('is-invalid');
                        $('.errorInformasi').html(response.error.informasi);
                    } else {
                        $('#informasi').removeClass('is-invalid');
                        $('.errorInformasi').html('');
                    }
                } else {
                    if (response.error_message) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: response.error_message,
                        })
                        $('#editModal').modal('hide');
                        pengajuanMasuk();
                        
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: response.success,
                        })
                        $('#editModal').modal('hide');
                        pengajuanMasuk();
                    }
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        })

        return false
    })
</script>
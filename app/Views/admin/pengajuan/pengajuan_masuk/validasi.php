<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open_multipart('', ['class' => 'formPengajuanMasuk']); ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" name="id" value="<?= $pd->id ?>">
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
                            <label class="form-label">Upload File Surat <span class="text-danger">*</span></label>
                            <div class="form-icon position-relative">
                                <input name="file" id="file" type="file" class="form-control" placeholder="Upload File Surat : ">
                                <div class="invalid-feedback errorFile"></div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
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
    $("#send").click(function(e) {
        e.preventDefault();
        let form = $('.formPengajuanMasuk')[0];
        let data = new FormData(form);

        $.ajax({
            type: "post",
            url: "<?= site_url('admin/data_pengajuan_masuk/create') ?>",
            data: data,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
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

                    if (response.error.file) {
                        $('#file').addClass('is-invalid');
                        $('.errorFile').html(response.error.file);
                    } else {
                        $('#file').removeClass('is-invalid');
                        $('.errorFile').html('');
                    }
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: response.success,
                    })
                    $('#editModal').modal('hide');
                    pengajuanMasuk();
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
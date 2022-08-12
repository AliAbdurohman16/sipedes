<!-- Add Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('admin/data_rw/update', ['class' => 'formRw']); ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <input type="hidden" name="id" value="<?= $id ?>">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Nama Ketua RW <span class="text-danger">*</span></label>
                            <input name="name" id="name" type="text" class="form-control" value="<?= $name ?>" placeholder="Nama Ketua RW">
                            <div class="invalid-feedback errorName">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Nomor RW <span class="text-danger">*</span></label>
                            <input name="number" id="number" type="number" class="form-control" value="<?= $number ?>" placeholder="No RW">
                            <div class="invalid-feedback errorName">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Nama Dusun <span class="text-danger">*</span></label>
                            <select class="form-control" id="inputNamaDusun" name="dusun_id">
                                <option value="" selected disabled>-- Pilih --</option>
                                <?php foreach ($dusuns as $dusun) : ?>
                                    <option value="<?= $dusun->id ?>" <?= $dusun->id == $dusun_id ? 'selected' : '' ?>><?= $dusun->name ?></option>
                                <?php endforeach ?>
                            </select>
                            <div class="invalid-feedback errorName">
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
    $('.formRw').submit(function(e) {
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
                    if (response.error.name) {
                        $('#name').addClass('is-invalid');
                        $('#number').addClass('is-invalid');
                        $('#dusun_id').addClass('is-invalid');
                        $('.errorName').html(response.error.name);
                        $('.errorNumber').html(response.error.number);
                        $('.errorDusunId').html(response.error.dusun_id);
                    } else {
                        $('#name').removeClass('is-invalid');
                        $('#number').removeClass('is-invalid');
                        $('#dusun_id').removeClass('is-invalid');
                        $('.errorName').html('');
                        $('.errorNumber').html('');
                        $('.errorDusunId').html('');
                    }
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: response.success,
                    })
                    $('#editModal').modal('hide');
                    dataRw();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        })

        return false;
    })
</script>
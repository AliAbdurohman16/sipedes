<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('admin/data_rw/create', ['class' => 'formRw']); ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Nama Ketua RW <span class="text-danger">*</span></label>
                            <input name="name" id="name" type="text" class="form-control" value="<?= old('name') ?>" placeholder="Nama Ketua RW">
                            <div class="invalid-feedback errorName">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Nomor RW <span class="text-danger">*</span></label>
                            <input name="number" id="number" type="number" class="form-control" value="<?= old('number') ?>" placeholder="No RW">
                            <div class="invalid-feedback errorNumber">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Nama Dusun <span class="text-danger">*</span></label>
                            <select class="form-control" id="dusun_id" name="dusun_id">
                                <option value="" selected disabled>-- Pilih --</option>
                                <?php foreach ($dusuns as $dusun) : ?>
                                    <option value="<?= $dusun->id ?>" <?= $dusun->id == old('dusun_id') ? 'selected' : '' ?>><?= $dusun->name ?></option>
                                <?php endforeach ?>
                            </select>
                            <div class="invalid-feedback errorDusunId">
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
                        $('.errorName').html(response.error.name);
                    } else {
                        $('#name').removeClass('is-invalid');
                        $('.errorName').html('');
                    }

                    if (response.error.number) {
                        $('#number').addClass('is-invalid');
                        $('.errorNumber').html(response.error.number);
                    } else {
                        $('#number').removeClass('is-invalid');
                        $('.errorNumber').html('');
                    }

                    if (response.error.dusun_id) {
                        $('#dusun_id').addClass('is-invalid');
                        $('.errorDusunId').html(response.error.dusun_id);
                    } else {
                        $('#dusun_id').removeClass('is-invalid');
                        $('.errorDusunId').html('');
                    }
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: response.success,
                    })
                    $('#addModal').modal('hide');
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
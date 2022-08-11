<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= site_url('rt/update/' . $rt->id) ?>" method="post" class="needs-validation" id="update" novalidate>
                <div class="modal-body">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="PUT">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Nama <span class="text-danger">*</span></label>
                                <input name="name" id="nama" type="text" class="form-control" value="<?= $rt->name ?? old('name') ?>" placeholder="Nama Lengkap :" required>
                                <div class="invalid-feedback">
                                    Nama tidak boleh kosong
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">No RT <span class="text-danger">*</span></label>
                                <input name="no_rt" id="no_rt" type="number" class="form-control" value="<?= $rt->number ?? old('no_rt') ?>" placeholder="No RT :" required>
                                <div class="invalid-feedback">
                                    No RT tidak boleh kosong
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">No RW <span class="text-danger">*</span></label>
                                <select name="no_rw" class="form-control" required>
                                    <option value="">-- Pilih --</option>
                                    <?php foreach ($rw as $r) { ?>
                                        <option value="<?= $r->id; ?>" <?= $r->id == ($rt->rw_id ?? old('rw_id')) ? 'selected' : '' ?>>RW <?= $r->number; ?></option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    No RW tidak boleh kosong
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" id="buttonUpdate">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()

    // $(document).ready(function() {
    //     $('#update').submit(function(e) {
    //         e.preventDefault();
    //         $.ajax({
    //             type: "post",
    //             url: $(this).attr('action'),
    //             data: $(this).serialize(),
    //             dataType: "json",
    //             beforeSend: function() {
    //                 $('#buttonUpdate').prop('disabled', true);
    //                 $('#buttonUpdate').html('<i class="fa fa-spin fa-spinner"></i>');
    //             },
    //             success: function(response) {
    //                 if (response.success) {
    //                     Swal.fire(
    //                         'Berhasil!',
    //                         response.success,
    //                         'success'
    //                     ).then((result) => {
    //                         if (result.isConfirmed) {
    //                             location.reload();
    //                         }
    //                     });
    //                 }
    //             },
    //             error: function(xhr, thrownError) {
    //                 alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
    //             }
    //         });
    //     });
    // });
</script>
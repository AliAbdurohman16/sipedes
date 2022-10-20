<!-- Edit Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Detail Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" name="id" value="<?= $pd->id ?>">
                    <div class="row">
                        <input type="hidden" name="id" value="<?= $pd->id ?>">
                        <div class="col-md-5 mb-3">
                            <label class="form-label">No Kartu Keluarga : </label>
                        </div>
                        <div class="col-md-7 mb-3">
                            <?= $pd->no_kk ?>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label class="form-label">NIK : </label>
                        </div>
                        <div class="col-md-7 mb-3">
                            <?= $pd->nik ?>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label class="form-label">Nama Lengkap : </label>
                        </div>
                        <div class="col-md-7 mb-3">
                            <?= $pd->nama ?>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label class="form-label">No Whatsapp : </label>
                        </div>
                        <div class="col-md-7 mb-3">
                            <?= $pd->telepon ?>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label class="form-label">Jenis Pengajuan Surat : </label>
                        </div>
                        <div class="col-md-7 mb-3">
                            <?= $pd->jenis ?>
                        </div>
                    </div>
                    <!--end col-->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
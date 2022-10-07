<!-- Edit Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Detail Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" value="<?= $pd->id ?>">
                <div class="row mb-5">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label">No Kartu Keluarga : </label>
                            </div>
                            <div class="col-md-8">
                                <?= $kk->no_kk ?>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label">Kepala Keluarga : </label>
                            </div>
                            <div class="col-md-8">
                                <?= $kk->nama_kepala ?>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label">NIK : </label>
                            </div>
                            <div class="col-md-8">
                                <?= $pddk->nik ?>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label">No Whatsapp : </label>
                            </div>
                            <div class="col-md-8">
                                <?= $pd->telepon ?>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label">Jenis Pengajuan Surat : </label>
                            </div>
                            <div class="col-md-8">
                                <?= $pd->jenis ?>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label">Keterangan : </label>
                            </div>
                            <div class="col-md-8">
                                <?= $pd->keterangan ?>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label class="form-label">Nama : </label>
                            </div>
                            <div class="col-md-7 mb-3">
                                <?= $pddk->name ?>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label class="form-label">Jenis Kelamin : </label>
                            </div>
                            <div class="col-md-7 mb-3">
                                <?= $pddk->jenis_kelamin ?>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label class="form-label">Tempat Lahir : </label>
                            </div>
                            <div class="col-md-7 mb-3">
                                <?= $pddk->tempat_lahir ?>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label class="form-label">Tanggal Lahir : </label>
                            </div>
                            <div class="col-md-7 mb-3">
                                <?= date('d-m-Y', strtotime($pddk->tgl_lahir)) ?>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label class="form-label">Agama : </label>
                            </div>
                            <div class="col-md-7 mb-3">
                                <?= $pddk->agama ?>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label class="form-label">Golongan Darah : </label>
                            </div>
                            <div class="col-md-7 mb-3">
                                <?= $pddk->gol_darah ?>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label class="form-label">RT : </label>
                            </div>
                            <div class="col-md-7 mb-3">
                                <?= $pddk->no_rt ?>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label class="form-label">RW : </label>
                            </div>
                            <div class="col-md-7 mb-3">
                                <?= $pddk->no_rw ?>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label class="form-label">Dusun : </label>
                            </div>
                            <div class="col-md-7 mb-3">
                                <?= $pddk->dusun ?>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label class="form-label">Desa : </label>
                            </div>
                            <div class="col-md-7 mb-3">
                                <?= $pddk->desa ?>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label class="form-label">Kecamatan : </label>
                            </div>
                            <div class="col-md-7 mb-3">
                                <?= $pddk->kecamatan ?>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label class="form-label">Kabupaten : </label>
                            </div>
                            <div class="col-md-7 mb-3">
                                <?= $pddk->kabupaten ?>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label class="form-label">Provinsi : </label>
                            </div>
                            <div class="col-md-7 mb-3">
                                <?= $pddk->provinsi ?>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label class="form-label">Alamat : </label>
                            </div>
                            <div class="col-md-7 mb-3">
                                <?= $pddk->alamat ?>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label class="form-label">Status Kawin : </label>
                            </div>
                            <div class="col-md-7 mb-3">
                                <?= $pddk->status_kawin ?>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label class="form-label">Pend Terakhir : </label>
                            </div>
                            <div class="col-md-7 mb-3">
                                <?= $pddk->pendidikan_terakhir ?>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label class="form-label">Pekerjaan : </label>
                            </div>
                            <div class="col-md-7 mb-3">
                                <?= $pddk->pekerjaan ?>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label class="form-label">Nama Ayah : </label>
                            </div>
                            <div class="col-md-7 mb-3">
                                <?= $pddk->nama_ayah ?>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label class="form-label">Nama Ibu : </label>
                            </div>
                            <div class="col-md-7 mb-3">
                                <?= $pddk->nama_ibu ?>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
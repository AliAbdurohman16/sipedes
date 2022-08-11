<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="layout-specing">
        <div class="d-md-flex justify-content-between align-items-center">
            <h5 class="mb-0">Jabatan</h5>

            <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
                <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                    <li class="breadcrumb-item text-capitalize"><a href="index.html">Data Master</a></li>
                    <li class="breadcrumb-item text-capitalize active" aria-current="page">Jabatan</li>
                </ul>
            </nav>
        </div>

        <div class="row">
            <div class="col-12 mt-4">
                <button type="button" class="btn btn-primary btn-sm mb-3" style="float: right;" data-bs-toggle="modal" data-bs-target="#modalData">
                    Tambah Data
                </button>
                <div class="table-responsive shadow rounded">
                    <!-- Button trigger modal -->
                    <table class="table table-center bg-white mb-0" id="table">
                        <thead>
                            <tr>
                                <th class="text-center border-bottom p-3">#</th>
                                <th class="border-bottom p-3">Jabatan</th>
                                <th class="border-bottom p-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Start -->
                            <?php
                            $no = 1;
                            foreach ($jabatans as $jabatan) { ?>
                                <tr>
                                    <th class="text-center p-3" style="width: 2%;"><?= $no++; ?></th>
                                    </td>
                                    <td class="p-3"><?= $jabatan->name ?></td>
                                    <td class="p-3" style="width: 25%;">
                                        <a href="#" class="btn btn-warning btn-sm ms-2"><i class="fa-solid fa-pen"></i> Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm ms-2"><i class="fa-solid fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                            <?php } ?>
                            <!-- End -->
                        </tbody>
                    </table>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
</div>
<!--end container-->

<!-- Modal -->
<div class="modal fade" id="modalData" tabindex="-1" aria-labelledby="modalDataLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDataLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="rt/save" method="post">
                <div class="modal-body">
                    <?= csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Nama <span class="text-danger">*</span></label>
                                <input name="name" id="nama" type="text" class="form-control" placeholder="Nama Lengkap :">
                                <span class="text text-danger text-sm error" style="display: none;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">No RT <span class="text-danger">*</span></label>
                                <input name="name" id="no_rt" type="number" class="form-control" placeholder="No RT :">
                                <span class="text text-danger text-sm error" style="display: none;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">No RW <span class="text-danger">*</span></label>
                                <input name="name" id="no_rw" type="number" class="form-control" placeholder="No RW :">
                                <span class="text text-danger text-sm error" style="display: none;"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" id="save">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
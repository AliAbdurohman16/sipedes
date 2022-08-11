<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="layout-specing">
        <div class="d-md-flex justify-content-between align-items-center">
            <h5 class="mb-0">Data RW</h5>

            <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
                <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                    <li class="breadcrumb-item text-capitalize"><a href="index.html">Data Master</a></li>
                    <li class="breadcrumb-item text-capitalize active" aria-current="page">Data RW</li>
                </ul>
            </nav>
        </div>

        <div class="row">
            <div class="col-12 mt-4">
                <?php if (session('error') !== null) : ?>
                    <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
                <?php endif ?>

                <?php if (session('message') !== null) : ?>
                    <div class="alert alert-success" role="alert"><?= session('message') ?></div>
                <?php endif ?>
                <div class="card">
                    <div class="card-body">

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-primary btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
                                Tambah Data +
                            </button>
                        </div>
                        <div class="table-responsive shadow rounded">
                            <!-- Button trigger modal -->
                            <table class="table table-center bg-white mb-0" id="table">
                                <thead>
                                    <tr>
                                        <th class="text-center border-bottom p-3">No</th>
                                        <th class="border-bottom p-3">Nama Ketua RW</th>
                                        <th class="text-center border-bottom p-3">No RW</th>
                                        <th class="text-center border-bottom p-3">Dusun</th>
                                        <th class="border-bottom p-3">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Start -->
                                    <?php
                                    $no = 1;
                                    foreach ($rws as $rw) { ?>
                                        <tr>
                                            <th class="text-center p-3"><?= $no++; ?></th>
                                            <td class="text-center p-3">
                                                <a href="#" class="text-primary">
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?= base_url('assets/images/client/01.jpg') ?>" class="avatar avatar-ex-small rounded-circle shadow" alt="">
                                                        <span class="ms-2"><?= $rw->name ?></span>
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="text-center p-3"><?= $rw->number ?></td>
                                            <td class="text-center p-3"><?= $rw->dusun_name ?></td>
                                            <td class="p-3">
                                                <a href="#" class="btn btn-warning btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#editModal<?= $rw->id ?>"><i class="fa-solid fa-pen"></i> Edit</a>
                                                <button type="button" class="btn btn-danger btn-sm ms-2 delete-confirm" data-action="<?= site_url('admin/data_rw/' . $rw->id) ?>"><i class="fa-solid fa-trash"></i> Hapus</button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <!-- End -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
</div>
<!--end container-->

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= site_url('admin/data_rw') ?>" method="POST">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label" for="inputNamaKetuaRW">Nama Ketua RW <span class="text-danger">*</span></label>
                                <input name="name" id="inputNamaKetuaRW" type="text" class="form-control" placeholder="Nama Lengkap" value="<?= old('name') ?>">
                                <span class="text text-danger text-sm error" style="display: none;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label" for="inputNomorRW">Nomor RW <span class="text-danger">*</span></label>
                                <input name="number" id="inputNomorRW" type="number" class="form-control" placeholder="No RW" value="<?= old('number') ?>">
                                <span class="text text-danger text-sm error" style="display: none;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label" for="inputNamaDusun">Dusun <span class="text-danger">*</span></label>
                                <select class="form-control" id="inputNamaDusun" name="dusun_id">
                                    <option value="" selected disabled>-- Pilih --</option>
                                    <?php foreach ($dusun as $item) : ?>
                                        <option value="<?= $item->id ?>" <?= $item->id == old('dusun_id') ? 'selected' : '' ?>><?= $item->name ?></option>
                                    <?php endforeach ?>
                                </select>
                                <span class="text text-danger text-sm error" style="display: none;"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" id="save">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($rws as $rw) : ?>
    <div class="modal fade" id="editModal<?= $rw->id ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data <?= $rw->name ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= site_url('admin/data_rw/' . $rw->id) ?>" method="POST">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT" />
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="inputNamaKetuaRW">Nama Ketua RW <span class="text-danger">*</span></label>
                                    <input name="name" id="inputNamaKetuaRW" type="text" class="form-control" placeholder="Nama Lengkap" value="<?= $rw->name ?? old('name') ?>">
                                    <span class="text text-danger text-sm error" style="display: none;"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="inputNomorRW">Nomor RW <span class="text-danger">*</span></label>
                                    <input name="number" id="inputNomorRW" type="number" class="form-control" placeholder="No RW" value="<?= $rw->number ?? old('number') ?>">
                                    <span class="text text-danger text-sm error" style="display: none;"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="inputNamaDusun">Dusun <span class="text-danger">*</span></label>
                                    <select class="form-control" id="inputNamaDusun" name="dusun_id">
                                        <option value="" selected disabled>-- Pilih --</option>
                                        <?php foreach ($dusun as $item) : ?>
                                            <option value="<?= $item->id ?>" <?= $item->id == ($rw->dusun_id ?? old('dusun_id')) ? 'selected' : '' ?>><?= $item->name ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <span class="text text-danger text-sm error" style="display: none;"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" id="edit">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>
<?= $this->endSection(); ?>
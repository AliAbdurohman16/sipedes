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
                <?php if (session('error') !== null) : ?>
                    <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
                <?php endif ?>

                <?php if (session('message') !== null) : ?>
                    <div class="alert alert-success" role="alert"><?= session('message') ?></div>
                <?php endif ?>
                <div class="card">
                    <div class="card-body">

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-primary mb-3 btn-sm" data-bs-toggle="modal" data-bs-target="#addModal">
                                Tambah Data +
                            </button>
                        </div>
                        <div class="table-responsive shadow rounded">
                            <!-- Button trigger modal -->
                            <table class="table table-center bg-white mb-0" id="table">
                                <thead>
                                    <tr>
                                        <th class="text-center border-bottom p-3">No</th>
                                        <th class="border-bottom p-3">Jabatan</th>
                                        <th class="border-bottom p-3">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Start -->
                                    <?php
                                    $no = 1;
                                    foreach ($jabatans as $jabatan) :
                                    ?>
                                        <tr>
                                            <th class="text-center p-3" style="width: 5%;"><?= $no++; ?></th>
                                            <td class="p-3"><?= $jabatan->name; ?></td>
                                            <td style="width: 25%;">
                                                <a href="#" class="btn btn-warning btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#editModal<?= $jabatan->id ?>"><i class="fa-solid fa-pen"></i> Edit</a>
                                                <form action="/data_jabatan/<?= $jabatan->id ?>" method="post" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?')"><i class="fa-solid fa-trash"></i> Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
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

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= site_url('data_jabatan/create') ?>" method="post">
                <div class="modal-body">
                    <?= csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Nama Jabatan <span class="text-danger">*</span></label>
                                <input name="name" id="nama" type="text" class="form-control" value="<?= old('name') ?>" placeholder="Nama Jabatan :">
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

<!-- Edit Modal -->
<?php
foreach ($jabatans as $jabatan) :
?>
    <div class="modal fade" id="editModal<?= $jabatan->id ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= site_url('data_jabatan/update/' . $jabatan->id) ?>" method="post">
                    <div class="modal-body">
                        <?= csrf_field(); ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Nama Jabatan <span class="text-danger">*</span></label>
                                    <input name="name" id="name" type="text" class="form-control" value="<?= $jabatan->name ?? old('name') ?>" placeholder="Nama Jabatan :">
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
<?php endforeach; ?>
<?= $this->endSection(); ?>
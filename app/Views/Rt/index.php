<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="layout-specing">
        <div class="d-md-flex justify-content-between align-items-center">
            <h5 class="mb-0">RT</h5>

            <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
                <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                    <li class="breadcrumb-item text-capitalize"><a href="index.html">Data Master</a></li>
                    <li class="breadcrumb-item text-capitalize active" aria-current="page">Data RT</li>
                </ul>
            </nav>
        </div>

        <div class="row">
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-body">

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-primary btn-sm mb-3" data-action="<?= site_url('rt/add') ?>" id="buttonAdd">
                                Tambah Data <i class="fas fa-plus"></i>
                            </button>
                        </div>
                        <div class="table-responsive shadow rounded">
                            <!-- Button trigger modal -->
                            <table class="table table-center bg-white mb-0" id="table">
                                <thead>
                                    <tr>
                                        <th class="text-center border-bottom p-3">#</th>
                                        <th class="border-bottom p-3">Nama Ketua RT</th>
                                        <th class="text-center border-bottom p-3">No RT</th>
                                        <th class="text-center border-bottom p-3">No RW</th>
                                        <th class="border-bottom p-3">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Start -->
                                    <?php
                                    $no = 1;
                                    foreach ($rts as $rt) { ?>
                                        <tr>
                                            <th class="text-center p-3"><?= $no++; ?></th>
                                            <td class="p-3"><?= $rt->name ?></td>
                                            <td class="text-center p-3"><?= $rt->number ?></td>
                                            <td class="text-center p-3"><?= $rt->number_rw ?></td>
                                            <td class="p-3">
                                                <button type="button" class="btn btn-warning btn-sm ms-2 button-edit" data-action="<?= site_url('rt/edit/' . $rt->id) ?>"><i class="fa-solid fa-pen"></i> Edit</button>
                                                <button type="button" class="btn btn-danger btn-sm ms-2 button-delete" data-action="<?= site_url('rt/destroy/' . $rt->id) ?>"><i class="fa-solid fa-trash"></i> Hapus</button>
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
<div class="viewmodal" style="display: none;"></div>

<?= $this->endSection(); ?>
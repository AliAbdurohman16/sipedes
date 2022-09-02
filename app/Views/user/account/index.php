<?= $this->extend('template/user/index'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="layout-specing">
        <div class="d-md-flex justify-content-between align-items-center">
            <h5 class="mb-0"><?= $title ?></h5>

            <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
                <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                    <li class="breadcrumb-item text-capitalize active" aria-current="page"><?= $title ?></li>
                </ul>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-6 mt-4">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <h5 class="text-md-start text-center mb-0">Personal Detail :</h5>
                        <div class="mt-4 mb-3">
                            <center>
                                <img src="<?= site_url('images/avatar/Avatar.png') ?>" class="avatar avatar-medium rounded-circle shadow me-md-4" id="chosen-image" alt="">
                            </center>
                        </div>
                        <div class="container row">
                            <table>
                                <tr>
                                    <td>No Kartu Keluarga</td>
                                    <td>:</td>
                                    <td><?= session()->get('penduduk')->no_kk ?></td>
                                </tr>
                                <tr>
                                    <td>NIK</td>
                                    <td>:</td>
                                    <td><?= session()->get('penduduk')->nik ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td>:</td>
                                    <td><?= session()->get('penduduk')->name ?></td>
                                </tr>
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
<?= $this->endSection(); ?>
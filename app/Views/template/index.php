<!doctype html>
<html lang="id" dir="ltr">

<head>
    <meta charset="utf-8" />
    <title><?= $title ?> - Sistem Pelayanan Desa Cibinuang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SIPEDES (Sistem Pelayanan Desa Cibinuang) merupakan aplikasi berbasis website untuk menyediakan pelayanan pengajuan tentang surat menyurat kepada masyarakat khususnya masyarakat Desa Cibinuang, Kec.Kuningan, Kab.Kuningan" />
    <meta name="keywords" content="kabupaten kuningan, kuningan, kuninganmass, kab.kuningan, desa, desa kuningan, jawa barat, jabar juara" />
    <meta name="author" content="PPK PBK FKOM UNIKU 2022" />
    <meta name="email" content="pbk@uniku.ac.id" />
    <meta name="website" content="https://uniku.ac.id" />
    <meta name="Version" content="v1.0.0" />

    <!-- favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>/images/logo/logo_sipedes.png" />
    <!-- Css -->
    <link href="<?= base_url() ?>/assets/libs/simplebar/simplebar.min.css" rel="stylesheet">
    <!-- Bootstrap Css -->
    <link href="<?= base_url() ?>/assets/css/bootstrap.min.css" class="theme-opt" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url() ?>/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/libs/@iconscout/unicons/css/line.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <!-- Style Css-->
    <link href="<?= base_url() ?>/assets/css/style.min.css" class="theme-opt" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
    <style>
        div.dataTables_filter,
        div.dataTables_length,
        div.dataTables_info,
        div.dataTables_paginate {
            padding: 15px;
        }
    </style>
    <script src="<?= base_url() ?>/assets/js/jquery.min.js"></script>
</head>

<body>
    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div>
    <!-- Loader -->
    <?php
    $uri = new \CodeIgniter\HTTP\URI();
    $uri = service('uri');
    ?>
    <div class="page-wrapper <?= ($uri->getSegment(2) == 'penduduk' || $uri->getSegment(2) == 'kartu-keluarga' ? '' : 'toggled') ?>">
        <?= $this->include('template/sidebar'); ?>

        <!-- Start Page Content -->
        <main class="page-content bg-light">
            <?= $this->include('template/topbar'); ?>

            <?= $this->renderSection('content'); ?>

            <!-- Footer Start -->
            <footer class="shadow py-3">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-sm-start text-center mx-md-2">
                                <p class="mb-0 text-muted">© <script>
                                        document.write(new Date().getFullYear())
                                    </script> Sistem Pelayanan Desa Cibinuang. Design with <i class="mdi mdi-heart text-danger"></i> by PPK ORMAWA PBK FKOM UNIKU.</p>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end container-->
            </footer>
            <!--end footer-->
            <!-- End -->
        </main>
        <!--End page-content" -->
    </div>
    <!-- page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="<?= base_url() ?>/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/feather-icons/feather.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/simplebar/simplebar.min.js"></script>
    <!-- Main Js -->
    <script src="<?= base_url() ?>/assets/js/plugins.init.js"></script>
    <script src="<?= base_url() ?>/assets/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>
</body>

</html>
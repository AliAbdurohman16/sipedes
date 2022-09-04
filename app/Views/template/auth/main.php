<!doctype html>
<html lang="id" dir="ltr">

<head>
    <meta charset="utf-8" />
    <title><?= $title ?> - Sistem Pelayanan Desa Cibinuang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SIPEDE (Sistem Pelayanan Desa Cibinuang) merupakan aplikasi berbasis website untuk menyediakan pelayanan pengajuan tentang surat menyurat kepada masyarakat khususnya masyarakat Desa Cibinuang, Kec.Kuningan, Kab.Kuningan" />
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
    <!-- Style Css-->
    <link href="<?= base_url() ?>/assets/css/style.min.css" class="theme-opt" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">

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

    <!-- Hero Start -->
    <?= $this->renderSection('content'); ?>
    <!-- Hero End -->

    <!-- javascript -->
    <!-- JAVASCRIPT -->
    <script src="<?= base_url() ?>/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/feather-icons/feather.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/simplebar/simplebar.min.js"></script>
    <!-- Main Js -->
    <script src="<?= base_url() ?>/assets/js/plugins.init.js"></script>
    <script src="<?= base_url() ?>/assets/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

    <?php if (session()->has("error_message")) { ?>
        <script>
            $(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '<?= session("error_message") ?>'
                })
            });
        </script>
    <?php } else if (session()->has("success")) { ?>
        <script>
            $(function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Selamat!',
                    text: '<?= session("success") ?>'
                })
            });
        </script>
    <?php } ?>
</body>

</html>
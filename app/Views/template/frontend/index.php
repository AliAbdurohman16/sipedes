<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SIPEDES (Sistem Pengajuan Desa Cibinuang) merupakan aplikasi berbasis website untuk menyediakan pengajuan tentang surat menyurat kepada masyarakat khususnya masyarakat Desa Cibinuang, Kec.Kuningan, Kab.Kuningan">
    <meta name="keywords" content="kabupaten kuningan, kuningan, kuninganmass, kab.kuningan, desa, desa kuningan, jawa barat, jabar juara">
    <meta name="author" content="PPK PBK FKOM UNIKU 2022" />
    <meta name="email" content="pbk@uniku.ac.id" />
    <meta name="website" content="https://uniku.ac.id" />
    <meta name="Version" content="v1.0.0" />
    <title>Sistem Pengajuan Desa Cibinuang</title>
    <!-- Favicon -->
    <link href="<?= base_url() ?>/images/logo/logo_sipedes.png" rel="shortcut icon">
    <!-- CSS -->
    <link href="<?= base_url() ?>/assets/frontend/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/frontend/plugins/owl-carousel/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/frontend/plugins/owl-carousel/owl.theme.default.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/frontend/plugins/magnific-popup/magnific-popup.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/frontend/plugins/sal/sal.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/frontend/css/theme.css" rel="stylesheet">
    <!-- Fonts/Icons -->
    <link href="<?= base_url() ?>/assets/frontend/plugins/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/frontend/plugins/font-awesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
</head>

<body data-preloader="1">
    <!-- Header -->
    <?php
    $uri = new \CodeIgniter\HTTP\URI();
    $uri = service('uri');
    ?>
    <div class="header right sticky-autohide <?= ($uri->getSegment(1) == 'tulis_pengajuan' ? 'absolute-dark' : 'absolute-light') ?>">
        <div class="container">
            <!-- Logo -->
            <div class="header-logo">
                <a href="<?= base_url() ?>"><img src="images/logo/logo.png" alt="logo"></a>
            </div>
            <!-- Menu -->
            <div class="header-menu">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url() ?>">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#tentang">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#faq">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tutorial">Tutorial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>/tulis_pengajuan">Buat Pengajuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                        <ul class="nav-dropdown">
                            <li class="nav-dropdown-item"><a class="nav-dropdown-link" href="<?= base_url() ?>/login">Pengajuan</a></li>
                            <li class="nav-dropdown-item"><a class="nav-dropdown-link" href="<?= base_url() ?>/admin/login">Aparat Desa</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <button class="header-toggle">
                <span></span>
            </button>
        </div><!-- end container -->
    </div>
    <!-- end Header -->

    <?= $this->renderSection('content') ?>

    <footer>
        <div class="section-sm section-divider-wavesOpacity-top text-white-08" style="background-color: #8aa7b4;">
            <div class="container">
                <div class="row g-3 mt-3">
                    <div class="col-12 col-sm-12 col-lg-6">
                        <img src="<?= base_url() ?>/images/logo/logo_sipedes.png" style="width: 50px;" alt="">
                        <h4 class="text-white-09 fw-bold font-family-secondary">SIPEDES</h4>
                        <p class="font-family-tertiary">SIPEDES (Sistem Pengajuan Desa Cibinuang) merupakan aplikasi berbasis website untuk menyediakan pengajuan tentang surat menyurat kepada masyarakat khususnya masyarakat Desa Cibinuang, Kec.Kuningan, Kab.Kuningan.</p>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-3">
                        <h6 class="font-small fw-bold fs-5 text-white-09 font-family-secondary">Akses Cepat</h6>
                        <ul class="list-dash font-family-tertiary">
                            <li><a href="#beranda" class="text-white-08">Beranda</a></li>
                            <li><a href="#buat-surat" class="text-white-08">Surat</a></li>
                            <li><a href="#faq" class="text-white-08">FAQ</a></li>
                            <li><a href="#syarat" class="text-white-08">Syarat Dan Ketentuan</a></li>
                            <li><a href="#tutorial" class="text-white-08">Tutorial</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-3">
                        <h6 class="font-small fw-bold fs-5 text-white-09 font-family-secondary">Kontak Info</h6>
                        <ul class="list-unstyled font-family-tertiary">
                            <li>Pemerintah Desa Cibinuang</li>
                            <li>Jl, Cibinuang, Kec. Kuningan, Kabupaten Kuningan, Jawa Barat</li>
                            <li>Kode Pos : 45511</li>
                            <li>info@desa-cibinuang.kuningankab.go.id</li>
                            <li>Telp / HP : 0232-8880775 - 081144336654</li>
                        </ul>
                    </div>
                </div><!-- end row(1) -->

                <hr class="margin-top-30 margin-bottom-30">
                <div class="row g-2">
                    <div class="col-12 col-md-6 text-center text-md-start">
                        <p class="font-family-tertiary fw-medium">&copy; <script>
                                document.write(new Date().getFullYear())
                            </script> Sistem Pengajuan Desa Cibinuang.</p>
                    </div>
                    <div class="col-12 col-md-6 text-center text-md-end">
                    <p class="font-family-tertiary fw-medium">PPK ORMAWA PBK FKOM UNIKU 2022.</p>
                    </div>
                </div><!-- end row(2) -->
            </div><!-- end container -->
        </div>
    </footer>

    <!-- Scroll to top button -->
    <div class="scrolltotop">
        <a class="button-circle button-circle-sm button-circle-dark" href="#"><i class="bi bi-arrow-up"></i></a>
    </div>
    <!-- end Scroll to top button -->

    <!-- ***** JAVASCRIPTS ***** -->
    <script src="<?= base_url() ?>/assets/frontend/plugins/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/frontend/plugins/plugins.js"></script>
    <script src="<?= base_url() ?>/assets/frontend/js/functions.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>

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
    <?php } else if (session()->has("success_message")) { ?>
    <script>
        $(function() {
            Swal.fire({
                icon: 'success',
                title: 'Selamat!',
                text: '<?= session("success_message") ?>'
            })
        });
    </script>
    <?php } ?>
</body>

</html>
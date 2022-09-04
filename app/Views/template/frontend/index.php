<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>SIPEDES - Desa Cibinuang</title>
    <!-- Favicon -->
    <link href="images/logo/logoSaja.png" rel="shortcut icon">
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
</head>

<body data-preloader="1">
    <!-- Header -->
    <div class="header right absolute-light sticky-autohide">
        <div class="container">
            <!-- Logo -->
            <div class="header-logo">
                <h3><a href="<?= base_url() ?>"><img src="images/logo/Sipedes.png" alt="logo"></a></h3>
            </div>
            <!-- Menu -->
            <div class="header-menu">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#beranda">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#faq">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#syarat">Syarat Dan Ketentuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tutorial">Tutorial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Akun</a>
                        <ul class="nav-dropdown">
                            <li class="nav-dropdown-item"><a class="nav-dropdown-link" href="<?= base_url() ?>/login">Login</a></li>
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
        <div class="section-sm bg-dark">
            <div class="container">
                <div class="row g-3">
                    <div class="col-6 col-sm-6 col-lg-6">
                        <h3>SIPEDES</h3>
                    </div>
                    <div class="col-6 col-sm-6 col-lg-3">
                        <ul class="list-dash">
                            <li><a href="#beranda">Beranda</a></li>
                            <li><a href="#buat-surat">Surat</a></li>
                            <li><a href="#faq">FAQ</a></li>
                            <li><a href="#syarat">Syarat Dan Ketentuan</a></li>
                            <li><a href="#tutorial">Tutorial</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-sm-6 col-lg-3">
                        <h6 class="font-small fw-normal uppercase">Kontak Info</h6>
                        <ul class="list-unstyled">
                            <li>Jalan Siliwangi No.88 Kuningan</li>
                            <li>Kode Pos : 45511</li>
                            <li>contact@example.com</li>
                            <li>Telp / HP : 0232-8880775 - 081144336654</li>
                        </ul>
                    </div>
                </div><!-- end row(1) -->

                <hr class="margin-top-30 margin-bottom-30">

                <div class="row g-2">
                    <div class="col-12 col-md-6 text-center text-md-start">
                        <p>&copy; <script>
                                document.write(new Date().getFullYear())
                            </script> SIPEDES. Design with by PPK ORMAWA PBK FKOM UNIKU.</p>
                    </div>
                    <div class="col-12 col-md-6 text-center text-md-end">
                        <ul class="list-inline">
                            <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                            <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                            <li><a href="#"><i class="bi bi-pinterest"></i></a></li>
                            <li><a href="#"><i class="bi bi-instagram"></i></a></li>
                        </ul>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=IntersectionObserver"></script>
    <script src="<?= base_url() ?>/assets/frontend/plugins/plugins.js"></script>
    <script src="<?= base_url() ?>/assets/frontend/js/functions.js"></script>
</body>

</html>
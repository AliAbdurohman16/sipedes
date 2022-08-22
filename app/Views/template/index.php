<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Premium Bootstrap 5 Landing Page Template" />
    <meta name="keywords" content="Saas, Software, multi-uses, HTML, Clean, Modern" />
    <meta name="author" content="Shreethemes" />
    <meta name="email" content="support@shreethemes.in" />
    <meta name="website" content="https://shreethemes.in" />
    <meta name="Version" content="v4.2.0" />

    <!-- favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/images/favicon.ico" />
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
                                    </script> Landrick. Design with <i class="mdi mdi-heart text-danger"></i> by <a href="https://shreethemes.in/" target="_blank" class="text-reset">Shreethemes</a>.</p>
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

    <!-- Offcanvas Start -->
    <div class="offcanvas offcanvas-end shadow" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header p-4 border-bottom">
            <h5 id="offcanvasLeftLabel" class="mb-0">
                <img src="<?= base_url() ?>/assets/images/logo-dark.png" height="24" class="light-version" alt="">
                <img src="<?= base_url() ?>/assets/images/logo-light.png" height="24" class="dark-version" alt="">
            </h5>
            <button type="button" class="btn-close d-flex align-items-center text-dark" data-bs-dismiss="offcanvas" aria-label="Close"><i class="uil uil-times fs-4"></i></button>
        </div>
        <div class="offcanvas-body p-4">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h6 class="fw-bold">Theme Options</h6>

                        <ul class="text-center style-switcher list-unstyled mt-4">
                            <li class="d-grid"><a href="javascript:void(0)" class="rtl-version t-rtl-light" onclick="setTheme('style-rtl')"><img src="<?= base_url() ?>/assets/images/demos/rtl.png" class="img-fluid rounded-md shadow-md d-block mx-auto" style="width: 270px;" alt=""><span class="text-dark fw-medium mt-3 d-block">RTL Version</span></a></li>
                            <li class="d-grid"><a href="javascript:void(0)" class="ltr-version t-ltr-light" onclick="setTheme('style')"><img src="<?= base_url() ?>/assets/images/demos/ltr.png" class="img-fluid rounded-md shadow-md d-block mx-auto" style="width: 270px;" alt=""><span class="text-dark fw-medium mt-3 d-block">LTR Version</span></a></li>
                            <li class="d-grid"><a href="javascript:void(0)" class="dark-rtl-version t-rtl-dark" onclick="setTheme('style-dark-rtl')"><img src="<?= base_url() ?>/assets/images/demos/dark-rtl.png" class="img-fluid rounded-md shadow-md d-block mx-auto" style="width: 270px;" alt=""><span class="text-dark fw-medium mt-3 d-block">RTL Version</span></a></li>
                            <li class="d-grid"><a href="javascript:void(0)" class="dark-ltr-version t-ltr-dark" onclick="setTheme('style-dark')"><img src="<?= base_url() ?>/assets/images/demos/dark.png" class="img-fluid rounded-md shadow-md d-block mx-auto" style="width: 270px;" alt=""><span class="text-dark fw-medium mt-3 d-block">LTR Version</span></a></li>
                            <li class="d-grid"><a href="javascript:void(0)" class="dark-version t-dark mt-4" onclick="setTheme('style-dark')"><img src="<?= base_url() ?>/assets/images/demos/dark.png" class="img-fluid rounded-md shadow-md d-block mx-auto" style="width: 270px;" alt=""><span class="text-dark fw-medium mt-3 d-block">Dark Version</span></a></li>
                            <li class="d-grid"><a href="javascript:void(0)" class="light-version t-light mt-4" onclick="setTheme('style')"><img src="<?= base_url() ?>/assets/images/demos/ltr.png" class="img-fluid rounded-md shadow-md d-block mx-auto" style="width: 270px;" alt=""><span class="text-dark fw-medium mt-3 d-block">Light Version</span></a></li>
                            <li class="d-grid"><a href="../../landing/dist/index.html" target="_blank" class="mt-4"><img src="<?= base_url() ?>/assets/images/demos/landing.png" class="img-fluid rounded-md shadow-md d-block mx-auto" style="width: 270px;" alt=""><span class="text-dark fw-medium mt-3 d-block">Landing</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="offcanvas-footer p-4 border-top text-center">
            <ul class="list-unstyled social-icon social mb-0">
                <li class="list-inline-item mb-0"><a href="https://1.envato.market/landrick" target="_blank" class="rounded"><i class="uil uil-shopping-cart align-middle" title="Buy Now"></i></a></li>
                <li class="list-inline-item mb-0"><a href="https://dribbble.com/shreethemes" target="_blank" class="rounded"><i class="uil uil-dribbble align-middle" title="dribbble"></i></a></li>
                <li class="list-inline-item mb-0"><a href="https://www.behance.net/shreethemes" target="_blank" class="rounded"><i class="uil uil-behance align-middle" title="behance"></i></a></li>
                <li class="list-inline-item mb-0"><a href="https://www.facebook.com/shreethemes" target="_blank" class="rounded"><i class="uil uil-facebook-f align-middle" title="facebook"></i></a></li>
                <li class="list-inline-item mb-0"><a href="https://www.instagram.com/shreethemes/" target="_blank" class="rounded"><i class="uil uil-instagram align-middle" title="instagram"></i></a></li>
                <li class="list-inline-item mb-0"><a href="https://twitter.com/shreethemes" target="_blank" class="rounded"><i class="uil uil-twitter align-middle" title="twitter"></i></a></li>
                <li class="list-inline-item mb-0"><a href="mailto:support@shreethemes.in" class="rounded"><i class="uil uil-envelope align-middle" title="email"></i></a></li>
                <li class="list-inline-item mb-0"><a href="https://shreethemes.in" target="_blank" class="rounded"><i class="uil uil-globe align-middle" title="website"></i></a></li>
            </ul>
            <!--end icon-->
        </div>
    </div>
    <!-- Offcanvas End -->

    <!-- javascript -->
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
    <?= $this->renderSection('javascript'); ?>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
</body>

</html>
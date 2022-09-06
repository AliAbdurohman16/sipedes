<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <title><?= $title ?> - Sistem Pengajuan Desa Cibinuang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Premium Bootstrap 5 Landing Page Template" />
    <meta name="keywords" content="Saas, Software, multi-uses, HTML, Clean, Modern" />
    <meta name="author" content="Shreethemes" />
    <meta name="email" content="support@shreethemes.in" />
    <meta name="website" content="https://shreethemes.in" />
    <meta name="Version" content="v4.2.0" />

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

    <div class="pt-5">
        <center>
            <h1>Laporan Pengajuan</h1>
            <p>Periode <?= $start ?> - <?= $end ?></p>

            <div class="col-lg-12">
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped bg-white mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center border-bottom">No</th>
                                            <th class="border-bottom">No Kartu Keluarga</th>
                                            <th class="border-bottom">NIK</th>
                                            <th class="border-bottom">Nama Lengkap</th>
                                            <th class="border-bottom">Jenis Pengajuan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Start -->
                                        <?php
                                        $no = 1;
                                        foreach ($report as $r) :
                                        ?>
                                            <tr>
                                                <th class="text-center" style="width: 5%;"><?= $no++; ?></th>
                                                <td><?= $r->no_kk; ?></td>
                                                <td><?= $r->nik; ?></td>
                                                <td><?= $r->nama; ?></td>
                                                <td><?= $r->jenis; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <!-- End -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </center>
    </div>

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
    <script>
        window.print();
    </script>
</body>

</html>
<?= $this->extend('template/index'); ?>

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

        <div class="row row-cols-xl-4 row-cols-md-2 row-cols-1">
            <?php if (session()->get('role')->id == 1 || session()->get('role')->id == 4) : ?>
                <div class="col mt-4">
                    <a href="#!" class="features feature-primary d-flex justify-content-between align-items-center rounded shadow p-3">
                        <div class="d-flex align-items-center">
                            <div class="icon text-center rounded-pill">
                                <i class="fa-solid fa-users fs-4 mb-0"></i>
                            </div>
                            <div class="flex-1 ms-3">
                                <h6 class="mb-0 text-muted">Data Penduduk</h6>
                                <p class="fs-5 text-dark fw-bold mb-0"><span class="counter-value" data-target="<?= $penduduk ?>">0</span></p>
                            </div>
                        </div>
                    </a>
                </div>
                <?php if (session()->get('role')->id == 1) : ?>
                    <!--end col-->
                    <div class="col mt-4">
                        <a href="#!" class="features feature-primary d-flex justify-content-between align-items-center rounded shadow p-3">
                            <div class="d-flex align-items-center">
                                <div class="icon text-center rounded-pill">
                                    <i class="fa-solid fa-users-between-lines fs-4 mb-0"></i>
                                </div>
                                <div class="flex-1 ms-3">
                                    <h6 class="mb-0 text-muted">Data RT</h6>
                                    <p class="fs-5 text-dark fw-bold mb-0"><span class="counter-value" data-target="<?= $rt ?>">0</span></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!--end col-->
                    <div class="col mt-4">
                        <a href="#!" class="features feature-primary d-flex justify-content-between align-items-center rounded shadow p-3">
                            <div class="d-flex align-items-center">
                                <div class="icon text-center rounded-pill">
                                    <i class="fa-solid fa-users-line fs-4 mb-0"></i>
                                </div>
                                <div class="flex-1 ms-3">
                                    <h6 class="mb-0 text-muted">Data RW</h6>
                                    <p class="fs-5 text-dark fw-bold mb-0"><span class="counter-value" data-target="<?= $rw ?>">0</span></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!--end col-->
                    <div class="col mt-4">
                        <a href="#!" class="features feature-primary d-flex justify-content-between align-items-center rounded shadow p-3">
                            <div class="d-flex align-items-center">
                                <div class="icon text-center rounded-pill">
                                    <i class="fa-solid fa-user-tie fs-4 mb-0"></i>
                                </div>
                                <div class="flex-1 ms-3">
                                    <h6 class="mb-0 text-muted">Data Aparat</h6>
                                    <p class="fs-5 text-dark fw-bold mb-0"><span class="counter-value" data-target="<?= $aparat ?>">0</span></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!--end col-->
                <?php endif; ?>
                <div class="col mt-4">
                    <a href="#!" class="features feature-primary d-flex justify-content-between align-items-center rounded shadow p-3">
                        <div class="d-flex align-items-center">
                            <div class="icon text-center rounded-pill">
                                <i class="fa-solid fa-person fs-4 mb-0"></i>
                            </div>
                            <div class="flex-1 ms-3">
                                <h6 class="mb-0 text-muted">Data Penduduk Laki-laki</h6>
                                <p class="fs-5 text-dark fw-bold mb-0"><span class="counter-value" data-target="<?= $pddk_laki ?>">0</span></p>
                            </div>
                        </div>
                    </a>
                </div>
                <!--end col-->
                <div class="col mt-4">
                    <a href="#!" class="features feature-primary d-flex justify-content-between align-items-center rounded shadow p-3">
                        <div class="d-flex align-items-center">
                            <div class="icon text-center rounded-pill">
                                <i class="fa-solid fa-person fs-4 mb-0"></i>
                            </div>
                            <div class="flex-1 ms-3">
                                <h6 class="mb-0 text-muted">Data Penduduk Perempuan</h6>
                                <p class="fs-5 text-dark fw-bold mb-0"><span class="counter-value" data-target="<?= $pddk_pr ?>">0</span></p>
                            </div>
                        </div>
                    </a>
                </div>
                <!--end col-->
            <?php endif; ?>
            <?php if (session()->get('role')->id == 1 || session()->get('role')->id == 3) : ?>
                <div class="col mt-4">
                    <a href="#!" class="features feature-primary d-flex justify-content-between align-items-center rounded shadow p-3">
                        <div class="d-flex align-items-center">
                            <div class="icon text-center rounded-pill">
                                <i class="fa-solid fa-envelope-open-text fs-4 mb-0"></i>
                            </div>
                            <div class="flex-1 ms-3">
                                <h6 class="mb-0 text-muted">Data Pengajuan Belum Dibuat</h6>
                                <p class="fs-5 text-dark fw-bold mb-0"><span class="counter-value" data-target="<?= $blm_dibuat ?>">0</span></p>
                            </div>
                        </div>
                    </a>
                </div>
                <!--end col-->
                <div class="col mt-4">
                    <a href="#!" class="features feature-primary d-flex justify-content-between align-items-center rounded shadow p-3">
                        <div class="d-flex align-items-center">
                            <div class="icon text-center rounded-pill">
                                <i class="fa-solid fa-envelope-circle-check fs-4 mb-0"></i>
                            </div>
                            <div class="flex-1 ms-3">
                                <h6 class="mb-0 text-muted">Data Pengajuan Sudah Dibuat</h6>
                                <p class="fs-5 text-dark fw-bold mb-0"><span class="counter-value" data-target="<?= $sdh_dibuat ?>">0</span></p>
                            </div>
                        </div>
                    </a>
                </div>
                <!--end col-->
            <?php endif; ?>
        </div>
        <!--end row-->
        <?php if (session()->get('role')->id == 1 || session()->get('role')->id == 3) : ?>
            <div class="row">
                <div class="col-xl-8 col-lg-7 mt-4">
                    <div class="card shadow border-0 p-4 pb-0 rounded">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-0 fw-bold">Statistik Pengajuan</h6>
                        </div>
                        <canvas id="myChart" style="width: 100%; height: 390px;"></canvas>
                    </div>
                </div>
                <!--end col-->

                <div class="col-xl-4 col-lg-5 mt-4 rounded">
                    <div class="card shadow border-0">
                        <div class="p-4 border-bottom">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-0 fw-bold">Users Online</h6>
                            </div>
                        </div>

                        <div class="p-4" data-simplebar style="height: 365px;">
                            <?php foreach ($users as $user) : ?>
                                <a href="javascript:void(0)" class="features feature-primary key-feature d-flex align-items-center justify-content-between mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <img src="<?= base_url('images/avatar/' . $user->image) ?>" class="avatar avatar-ex-small rounded-circle shadow" alt="avatar">
                                        </div>
                                        <div class="flex-1">
                                            <h6 class="mb-0 text-dark"><?= $user->name ?></h6>
                                            <small class="<?= $user->status == 'Online' ? 'text-success' : 'text-muted' ?>">
                                                <i class="fa-solid fa-circle <?= $user->status == 'Online' ? 'text-success' : 'text-muted' ?>"></i>&nbsp;
                                                <?= $user->status ?>
                                            </small>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
            <div class="row">
                <div class="col-xl-12 mt-4">
                    <div class="card border-0">
                        <div class="d-flex justify-content-between p-4 shadow rounded-top">
                            <h6 class="fw-bold mb-0">Log Activity</h6>
                        </div>
                        <div class="table-responsive shadow rounded-bottom">
                            <table class="table table-center bg-white mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center border-bottom p-3">No</th>
                                        <th class="border-bottom p-3">Nama Pengguna</th>
                                        <th class="border-bottom p-3">Aktivitas</th>
                                        <th class="border-bottom p-3">Tanggal dan Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Start -->
                                    <?php
                                    $no = 1;
                                    foreach ($logs as $log) :
                                    ?>
                                        <tr>
                                            <th class="text-center p-3" style="width: 5%;"><?= $no++; ?></th>
                                            <td class="p-3"><?= $log->name; ?></td>
                                            <td class="p-3"><?= $log->activities; ?></td>
                                            <td class="p-3"><?= $log->created_at; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <!-- End -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        <?php endif; ?>
        <?php if (session()->get('role')->id == 4) : ?>
            <div class="row">
                <div class="col-xl-8 mt-4">
                    <div class="card border-0">
                        <div class="d-flex justify-content-between p-4 shadow rounded-top">
                            <h6 class="fw-bold mb-0">Log Activity</h6>
                        </div>
                        <div class="table-responsive shadow rounded-bottom">
                            <table class="table table-center bg-white mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center border-bottom p-3">No</th>
                                        <th class="border-bottom p-3">Nama Pengguna</th>
                                        <th class="border-bottom p-3">Aktivitas</th>
                                        <th class="border-bottom p-3">Tanggal dan Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Start -->
                                    <?php
                                    $no = 1;
                                    foreach ($logs as $log) :
                                    ?>
                                        <tr>
                                            <th class="text-center p-3" style="width: 5%;"><?= $no++; ?></th>
                                            <td class="p-3"><?= $log->name; ?></td>
                                            <td class="p-3"><?= $log->activities; ?></td>
                                            <td class="p-3"><?= $log->created_at; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <!-- End -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--end col-->

                <div class="col-xl-4 col-lg-5 mt-4 rounded">
                    <div class="card shadow border-0">
                        <div class="p-4 border-bottom">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-0 fw-bold">Users Online</h6>
                            </div>
                        </div>

                        <div class="p-4" data-simplebar style="height: 365px;">
                            <?php foreach ($users as $user) : ?>
                                <a href="javascript:void(0)" class="features feature-primary key-feature d-flex align-items-center justify-content-between mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <img src="<?= base_url('images/avatar/' . $user->image) ?>" class="avatar avatar-ex-small rounded-circle shadow" alt="avatar">
                                        </div>
                                        <div class="flex-1">
                                            <h6 class="mb-0 text-dark"><?= $user->name ?></h6>
                                            <small class="<?= $user->status == 'Online' ? 'text-success' : 'text-muted' ?>">
                                                <i class="fa-solid fa-circle <?= $user->status == 'Online' ? 'text-success' : 'text-muted' ?>"></i>&nbsp;
                                                <?= $user->status ?>
                                            </small>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        <?php endif; ?>
    </div>
</div>
<!--end container-->

<?php if (session()->get('role')->id == 1 || session()->get('role')->id == 3) : ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" type="text/javascript"></script>
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    <?php foreach ($statistics as $row) : ?> 
                        '<?= $row->jenis; ?>',
                    <?php endforeach; ?>
                ],
                datasets: [{
                    label: 'Pengajuan',
                    data: [
                        <?php foreach ($statistics as $row) : ?> 
                            '<?= $row->jumlah; ?>',
                        <?php endforeach; ?>
                    ],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
<?php endif; ?>
<?= $this->endSection(); ?>
<?php

namespace Config;

use \App\Controllers\Admin;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/beranda', 'Frontend\BerandaController::index');
$routes->get('/tentang', 'Frontend\BerandaController::tentang');
$routes->get('/kontak', 'Frontend\BerandaController::kontak');

// Login Penduduk
$routes->group("", ["filter" => "authFilter:loginPenduduk"], function ($routes) {
    $routes->get('login', 'Auth\User\LoginController::index');
    $routes->post('login/valid_login', 'Auth\User\LoginController::valid_login');
});

// Login Pengurus
$routes->group("admin", ["filter" => "authFilter:loginAdmin"], function ($routes) {
    $routes->get('login', 'Auth\Login::index');
    $routes->post('login/valid_login', 'Auth\Login::valid_login');
});

// Forgot Password
$routes->group("admin", ["filter" => "authFilter:forgotPassword"], function ($routes) {
    $routes->get('forgot_password', 'Auth\ForgotPassword::index');
    $routes->post('forgot_password/send', 'Auth\ForgotPassword::send');
});

$routes->group("admin", ["filter" => "authFilter:loggedInAdmin"], function ($routes) {
    // Forgot Password -> Reset Password
    $routes->get('reset_password', 'Auth\ResetPassword::index');
    $routes->post('reset_password/send', 'Auth\ResetPassword::send');
});

$routes->group("user", ["filter" => "authFilter:loggedInPenduduk"], function ($routes) {
    // Dashboard
    $routes->get('dashboard', 'User\DashboardController::index');

    // Pengajuan -> Tulis Pengajuan
    $routes->get('tulis_pengajuan', 'User\TulisPengajuanController::index');
    $routes->post('tulis_pengajuan/create', 'User\TulisPengajuanController::create');

    // Pengajuan -> Pengajuan Dikirim
    $routes->get('pengajuan_dikirim', 'User\PengajuanDikirimController::index');
    $routes->post('pengajuan_dikirim/edit', 'User\PengajuanDikirimController::edit');
    $routes->post('pengajuan_dikirim/update', 'User\PengajuanDikirimController::update');
    $routes->post('pengajuan_dikirim/detail', 'User\PengajuanDikirimController::detail');
    $routes->post('pengajuan_dikirim/delete', 'User\PengajuanDikirimController::delete');

    // Pengajuan -> Pengajuan Sudah Dibuat
    $routes->get('pengajuan_sudah_dibuat', 'User\PengajuanDibuatController::index');
    $routes->post('pengajuan_sudah_dibuat/detail', 'User\PengajuanDibuatController::detail');
});

$routes->group("admin", ["filter" => "authFilter:loggedInAdmin"], function ($routes) {
    // Dashboard
    $routes->get('dashboard', 'Admin\DashboardController::index');

    // Log Activity
    $routes->get('log_activity', 'Admin\LogActivityController::index');

    // Account
    $routes->get('account', 'Admin\AccountController::index');
    $routes->post('account/update', 'Admin\AccountController::update');
    $routes->post('account/changePassword', 'Admin\AccountController::changePassword');

    // Route Data Master -> Data Dusun
    $routes->get('data_dusun', 'Admin\DusunController::index');
    $routes->get('data_dusun/new', 'Admin\DusunController::new');
    $routes->post('data_dusun/create', 'Admin\DusunController::create');
    $routes->post('data_dusun/edit', 'Admin\DusunController::edit');
    $routes->post('data_dusun/update', 'Admin\DusunController::update');
    $routes->post('data_dusun/delete', 'Admin\DusunController::delete');

    // Route Data Master -> Data RW
    $routes->get('data_rw', 'Admin\RwController::index');
    $routes->get('data_rw/new', 'Admin\RwController::new');
    $routes->post('data_rw/create', 'Admin\RwController::create');
    $routes->post('data_rw/edit', 'Admin\RwController::edit');
    $routes->post('data_rw/update', 'Admin\RwController::update');
    $routes->post('data_rw/delete', 'Admin\RwController::delete');

    // Route Data Master -> Jabatan
    $routes->get('data_jabatan', 'Admin\JabatanController::index');
    $routes->get('data_jabatan/new', 'Admin\JabatanController::new');
    $routes->post('data_jabatan/create', 'Admin\JabatanController::create');
    $routes->post('data_jabatan/edit', 'Admin\JabatanController::edit');
    $routes->post('data_jabatan/update', 'Admin\JabatanController::update');
    $routes->post('data_jabatan/delete', 'Admin\JabatanController::delete');

    // Route Data Master -> Data RT
    $routes->get('data_rt', 'Admin\RtController::index');
    $routes->get('data_rt/new', 'Admin\RtController::new');
    $routes->post('data_rt/create', 'Admin\RtController::create');
    $routes->post('data_rt/edit', 'Admin\RtController::edit');
    $routes->post('data_rt/update', 'Admin\RtController::update');
    $routes->post('data_rt/delete', 'Admin\RtController::delete');

    // Route Admin -> Data Users
    $routes->get('users', 'Admin\UserController::index');
    $routes->get('users/new', 'Admin\UserController::new');
    $routes->post('users/create', 'Admin\UserController::create');
    $routes->post('users/edit', 'Admin\UserController::edit');
    $routes->post('users/update', 'Admin\UserController::update');
    $routes->post('users/delete', 'Admin\UserController::delete');

    // Route Admin -> Data Penduduk
    $routes->get('penduduk', 'Admin\PendudukController::index');
    $routes->get('penduduk/new', 'Admin\PendudukController::new');
    $routes->post('penduduk/create', 'Admin\PendudukController::create');
    $routes->post('penduduk/edit', 'Admin\PendudukController::edit');
    $routes->post('penduduk/update', 'Admin\PendudukController::update');
    $routes->post('penduduk/delete', 'Admin\PendudukController::delete');
    $routes->post('penduduk/detail', 'Admin\PendudukController::detail');

    // Route Admin -> Data Kartu Keluarga
    $routes->get('kartu-keluarga', 'Admin\KartuKeluargaController::index');
    $routes->get('kartu-keluarga/new', 'Admin\KartuKeluargaController::new');
    $routes->post('kartu-keluarga/create', 'Admin\KartuKeluargaController::create');
    $routes->post('kartu-keluarga/edit', 'Admin\KartuKeluargaController::edit');
    $routes->post('kartu-keluarga/update', 'Admin\KartuKeluargaController::update');
    $routes->post('kartu-keluarga/delete', 'Admin\KartuKeluargaController::delete');
    $routes->post('kartu-keluarga/anggota-kk', 'Admin\KartuKeluargaController::anggota_kk');
    $routes->post('kartu-keluarga/create_anggota', 'Admin\KartuKeluargaController::create_anggota');
    $routes->post('kartu-keluarga/delete_anggota', 'Admin\KartuKeluargaController::delete_anggota');

    // Route Admin -> Aparat 
    $routes->get('aparat-desa', 'Admin\AparatDesaController::index');
    $routes->get('aparat-desa/new', 'Admin\AparatDesaController::new');
    $routes->post('aparat-desa/create', 'Admin\AparatDesaController::create');
    $routes->post('aparat-desa/edit', 'Admin\AparatDesaController::edit');
    $routes->post('aparat-desa/update', 'Admin\AparatDesaController::update');
    $routes->post('aparat-desa/delete', 'Admin\AparatDesaController::delete');
    $routes->post('aparat-desa/detail', 'Admin\AparatDesaController::detail');

    // Route Admin -> Data Pengajuan Masuk
    $routes->get('data_pengajuan_masuk', 'Admin\Pengajuan\MasukController::index');
    $routes->post('data_pengajuan_masuk/validasi', 'Admin\Pengajuan\MasukController::validasi');
    $routes->post('data_pengajuan_masuk/create', 'Admin\Pengajuan\MasukController::create');
    $routes->post('data_pengajuan_masuk/detail', 'Admin\Pengajuan\MasukController::detail');

    // Route Admin -> Data Pengajuan Sudah Dibuat
    $routes->get('data_pengajuan_sudah_dibuat', 'Admin\Pengajuan\DibuatController::index');
    $routes->post('data_pengajuan_sudah_dibuat/detail', 'Admin\Pengajuan\DibuatController::detail');

    // Route Admin -> Surat Keterangan Nama
    $routes->get('surat_keterangan_nama', 'Admin\Surat\KeteranganNamaController::index');
    $routes->post('surat_keterangan_nama/detail', 'Admin\Surat\KeteranganNamaController::detail');

    // Route Admin -> Surat Keterangan Domisli
    $routes->get('surat_keterangan_domisli', 'Admin\Surat\KeteranganDomisliController::index');
    $routes->post('surat_keterangan_domisli/detail', 'Admin\Surat\KeteranganDomisliController::detail');

    // Route Admin -> Surat Keterangan Belum Nikah
    $routes->get('surat_keterangan_belum_nikah', 'Admin\Surat\KeteranganBelumNikahController::index');
    $routes->post('surat_keterangan_belum_nikah/detail', 'Admin\Surat\KeteranganBelumNikahController::detail');

    // Route Admin -> Surat Keterangan Lahir
    $routes->get('surat_keterangan_lahir', 'Admin\Surat\KeteranganLahirController::index');
    $routes->post('surat_keterangan_lahir/detail', 'Admin\Surat\KeteranganLahirController::detail');

    // Route Admin -> Surat Keterangan Penghasilan
    $routes->get('surat_keterangan_penghasilan', 'Admin\Surat\KeteranganPenghasilanController::index');
    $routes->post('surat_keterangan_penghasilan/detail', 'Admin\Surat\KeteranganPenghasilanController::detail');

    // Route Admin -> Surat Keterangan Pindah KK
    $routes->get('surat_keterangan_pindah_kk', 'Admin\Surat\KeteranganPindahKKController::index');
    $routes->post('surat_keterangan_pindah_kk/detail', 'Admin\Surat\KeteranganPindahKKController::detail');

    // Route Admin -> Surat Keterangan Rame-rame
    $routes->get('surat_keterangan_rame_rame', 'Admin\Surat\KeteranganRameRameController::index');
    $routes->post('surat_keterangan_rame_rame/detail', 'Admin\Surat\KeteranganRameRameController::detail');

    // Route Admin -> Surat Keterangan SKU
    $routes->get('surat_keterangan_sku', 'Admin\Surat\KeteranganSKUController::index');
    $routes->post('surat_keterangan_sku/detail', 'Admin\Surat\KeteranganSKUController::detail');

    // Route Admin -> Surat Keterangan SKTM
    $routes->get('surat_keterangan_sktm', 'Admin\Surat\KeteranganSKTMController::index');
    $routes->post('surat_keterangan_sktm/detail', 'Admin\Surat\KeteranganSKTMController::detail');

    // Route Admin -> Surat Keterangan SKTM
    $routes->get('surat_keterangan_skck', 'Admin\Surat\KeteranganSKCKController::index');
    $routes->post('surat_keterangan_skck/detail', 'Admin\Surat\KeteranganSKCKController::detail');

    // Route Admin -> Surat Keterangan Kematian
    $routes->get('surat_keterangan_kematian', 'Admin\Surat\KeteranganKematianController::index');
    $routes->post('surat_keterangan_kematian/detail', 'Admin\Surat\KeteranganKematianController::detail');

    // Route Admin -> Laporan
    $routes->get('laporan', 'Admin\ReportController::index');
    $routes->post('laporan/print', 'Admin\ReportController::print');
});

$routes->group("user", ["filter" => "authFilter:logoutPenduduk"], function ($routes) {
    $routes->get('logout', 'Auth\User\LoginController::logout');
});

$routes->group("admin", ["filter" => "authFilter:logoutAdmin"], function ($routes) {
    $routes->get('logout', 'Auth\Login::logout');
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

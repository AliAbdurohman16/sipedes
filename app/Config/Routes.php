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
$routes->get('/', 'Home::index');

//login
$routes->group("", ["filter" => "authFilter:login"], function ($routes) {
    $routes->get('/login', 'Login::index');
    $routes->post('/login/valid_login', 'Login::valid_login');
});

$routes->group("", ["filter" => "authFilter:logout"], function ($routes) {
    $routes->get('/logout', 'Login::logout');
});

//dashboard
$routes->get('/dashboard', 'Dashboard::index');

$routes->group("admin", ["filter" => "authFilter:loggedIn"], function ($routes) {
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

    // Jabatan
    $routes->get('data_jabatan', 'JabatanController::index');
    $routes->get('data_jabatan/getData', 'JabatanController::getData');
    $routes->get('data_jabatan/new', 'JabatanController::new');
    $routes->post('data_jabatan/create', 'JabatanController::create');
    $routes->post('data_jabatan/edit', 'JabatanController::edit');
    $routes->post('data_jabatan/update', 'JabatanController::update');
    $routes->post('data_jabatan/delete', 'JabatanController::delete');

    // Route Data Master -> Data RT
    $routes->get('data_rt', 'Admin\RtController::index');
    $routes->get('data_rt/new', 'Admin\RtController::new');
    $routes->post('data_rt/create', 'Admin\RtController::create');
    $routes->post('data_rt/edit', 'Admin\RtController::edit');
    $routes->post('data_rt/update', 'Admin\RtController::update');
    $routes->post('data_rt/delete', 'Admin\RtController::delete');
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

<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

    $routes->get('/', 'HomeController::index', ['filter' => 'auth', 'as' => 'home.index']);

     $routes->group('penjualan', function($routes) {
        $routes->get('/', 'PenjualanController::index', ['as' => 'penjualan.index']);
        $routes->get('create', 'PenjualanController::create', ['as' => 'penjualan.create']);
        $routes->post('create', 'PenjualanController::store', ['as' => 'penjualan.store']);
        $routes->post('tambah-keranjang', 'PenjualanController::tambahKeranjang');
        $routes->get('lihat-keranjang', 'PenjualanController::lihatKeranjang');
        $routes->get('hapus-keranjang/(:any)', 'PenjualanController::hapusKeranjang/$1');
        $routes->post('cek-subtotal', 'PenjualanController::cekSubtotal');
        $routes->get('bill/(:any)', 'PenjualanController::bill/$1', ['as' => 'penjualan.bill']);
        $routes->get('detail/(:any)', 'PenjualanController::detail/$1', ['as' => 'penjualan.detail']);
        $routes->get('filter', 'PenjualanController::filter', ['as' => 'penjualan.filter']);
        $routes->post('report', 'PenjualanController::report', ['as' => 'penjualan.report']);
    });
    
    $routes->group('penerimaan', function($routes) {
        $routes->get('/', 'PenerimaanController::index', ['as' => 'penerimaan.index']);
        $routes->get('create', 'PenerimaanController::create', ['as' => 'penerimaan.create']);
        $routes->post('create', 'PenerimaanController::store', ['as' => 'penerimaan.store']);
        $routes->get('detail/(:any)', 'PenerimaanController::detail/$1', ['as' => 'penerimaan.detail']);
        $routes->get('bill/(:any)', 'PenerimaanController::bill/$1', ['as' => 'penerimaan.bill']);
        $routes->get('filter', 'PenerimaanController::filter', ['as' => 'penerimaan.filter']);
        $routes->post('report', 'PenerimaanController::report', ['as' => 'penerimaan.report']);
    });

    // Routes Pengguna
    $routes->group('pengguna', ['filter' => 'auth'], function($routes) {
        $routes->get('/', 'PenggunaController::index');
        $routes->post('create', 'PenggunaController::create');
        $routes->put('edit/(:any)', 'PenggunaController::edit/$1');
        $routes->delete('delete/(:any)', 'PenggunaController::delete/$1');
    });

    // Routes Obat
    $routes->group('obat', function($routes) {
        $routes->get('/', 'ObatController::index', ['as' => 'obat.index']);
        $routes->post('/', 'ObatController::store', ['as' =>'obat.store']);
        $routes->get('detail/(:any)', 'ObatController::detail/$1', ['as' => 'obat.detail']);
        $routes->get('edit/(:any)', 'ObatController::edit/$1', ['as' => 'obat.edit']);
        $routes->put('edit/(:any)', 'ObatController::update/$1', ['as' => 'obat.update']);
        $routes->delete('delete/(:any)', 'ObatController::delete/$1', ['as' => 'obat.delete']);
    });
    //Routes Jenis
    $routes->group('jenis', function($routes) {
        $routes->get('/', 'JenisController::index', ['as' => 'jenis.index']);
        $routes->post('create', 'JenisController::store', ['as' =>'jenis.store']);
        $routes->put('edit/(:any)', 'JenisController::edit/$1', ['as' => 'jenis.edit']);
        $routes->put('edit/(:any)', 'JenisController::update/$1', ['as' => 'jenis.update']);
        $routes->delete('delete/(:any)', 'JenisController::delete/$1', ['as' => 'jenis.delete']);
    });
    //Routes Golongan
    $routes->group('golongan', function($routes) {
        $routes->get('/', 'GolonganController::index', ['as' => 'golongan.index']);
        $routes->post('create', 'GolonganController::store', ['as' =>'golongan.store']);
        $routes->put('edit/(:any)', 'GolonganController::edit/$1', ['as' => 'golongan.edit']);
        $routes->put('edit/(:any)', 'GolonganController::update/$1', ['as' => 'golongan.update']);
        $routes->delete('delete/(:any)', 'GolonganController::delete/$1', ['as' => 'golongan.delete']);
    });
    //Routes Satuan
    $routes->group('satuan', function($routes) {
        $routes->get('/', 'SatuanController::index', ['as' => 'satuan.index']);
        $routes->post('create', 'SatuanController::store', ['as' =>'satuan.store']);
        $routes->put('edit/(:any)', 'SatuanController::edit/$1', ['as' => 'satuan.edit']);
        $routes->put('edit/(:any)', 'SatuanController::update/$1', ['as' => 'satuan.update']);
        $routes->delete('delete/(:any)', 'SatuanController::delete/$1', ['as' => 'satuan.delete']);
    });
    // Routes Kategori
    $routes->group('kategori', function($routes) {
        $routes->get('/', 'KategoriController::index', ['as' => 'kategori.index']);
        $routes->post('create', 'KategoriController::store', ['as' =>'kategori.store']);
        $routes->put('edit/(:any)', 'KategoriController::edit/$1', ['as' => 'kategori.edit']);
        $routes->put('edit/(:any)', 'KategoriController::update/$1', ['as' => 'kategori.update']);
        $routes->delete('delete/(:any)', 'KategoriController::delete/$1', ['as' => 'kategori.delete']);
    });
    // Routes Stock Opname
    $routes->group('opname', function($routes) {
        $routes->get('/', 'OpnameController::index', ['as' => 'opname.index']);
        $routes->post('/', 'OpnameController::store', ['as' => 'opname.store']);
    });
    
    $routes->group('edit-password', ['filter' => 'auth'], function($routes) {
        $routes->get('(:any)', 'AuthController::edit/$1');
        $routes->post('(:any)', 'AuthController::update/$1');
    });

    $routes->group('login', function($routes) {
        $routes->get('/', 'AuthController::index', ['as' => 'login.index']);
        $routes->post('/', 'AuthController::login', ['as' => 'login.store']);
    });

    $routes->group('riwayat', function($routes) {
        $routes->get('/', 'RiwayatController::index', ['as' => 'riwayat.index']);
    });

    $routes->group('darurat-stok', function($routes) {
        $routes->get('/', 'DaruratStokController::index', ['as' => 'darurat.index']);
    });

    $routes->group('instansi', function($routes) {
        $routes->get('/', 'InstansiController::index', ['as' => 'instansi.index']);
        $routes->post('/', 'InstansiController::update', ['as' => 'instansi.update']);
    });

    $routes->get('logout', 'AuthController::logout');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
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

    $routes->get('/', 'HomeController::index', ['filter' => 'auth']);

    // Routes Akun
    $routes->group('akun', ['filter' => 'auth'], function($routes){
        $routes->get('/', 'AkunController::index');
        $routes->post('create', 'AkunController::create');
        $routes->put('edit/(:any)', 'AkunController::edit/$1');
        $routes->delete('delete/(:any)', 'AkunController::delete/$1');
    });

    // Routes Pengguna
    $routes->group('pengguna', ['filter' => 'auth'], function($routes) {
        $routes->get('/', 'PenggunaController::index');
        $routes->post('create', 'PenggunaController::create');
        $routes->put('edit/(:any)', 'PenggunaController::edit/$1');
        $routes->delete('delete/(:any)', 'PenggunaController::delete/$1');
        $routes->get('reset-password/(:any)', 'PenggunaController::resetPassword/$1');
    });

    // Routes Barang
    $routes->group('barang', ['filter' => 'auth'],function($routes) {
        $routes->get('/', 'BarangController::index');
        $routes->post('create', 'BarangController::create');
        $routes->put('edit/(:any)', 'BarangController::edit/$1');
        $routes->delete('delete/(:any)', 'BarangController::delete/$1');
    });
    // Routes Pelanggan
    $routes->group('pelanggan', ['filter' => 'auth'],function($routes) {
        $routes->get('/', 'PelangganController::index');
        $routes->post('create', 'PelangganController::create');
        $routes->put('edit/(:any)', 'PelangganController::edit/$1');
        $routes->delete('delete/(:any)', 'PelangganController::delete/$1');
    });
    // Routes Transaksi Tunai
    $routes->group('transaksi-tunai', ['filter' => 'auth'],function($routes) {
        $routes->get('/', 'TransaksiTunaiController::index');
        $routes->post('create', 'TransaksiTunaiController::create');
        $routes->post('tambah-keranjang', 'TransaksiTunaiController::tambahKeranjang');
        $routes->get('lihat-keranjang', 'TransaksiTunaiController::lihatKeranjang');
        $routes->get('hapus-keranjang/(:any)', 'TransaksiTunaiController::hapusKeranjang/$1');
        $routes->post('cek-subtotal', 'TransaksiTunaiController::cekSubtotal');
    });
    // Routes Transaksi Kredit
    $routes->group('transaksi-kredit', ['filter' => 'auth'],function($routes) {
        $routes->get('/', 'TransaksiKreditController::index');
        $routes->post('create', 'TransaksiKreditController::create');
        $routes->post('tambah-keranjang', 'TransaksiKreditController::tambahKeranjang');
        $routes->get('lihat-keranjang', 'TransaksiKreditController::lihatKeranjang');
        $routes->get('hapus-keranjang/(:any)', 'TransaksiKreditController::hapusKeranjang/$1');
        $routes->post('cek-subtotal', 'TransaksiKreditController::cekSubtotal');
    });

    // Routes Angsuran
    $routes->group('angsuran', ['filter' => 'auth'],function($routes) {
        $routes->get('/', 'AngsuranController::index');
        $routes->get('detail/(:any)', 'AngsuranController::detail/$1');
        $routes->post('create/(:any)', 'AngsuranController::create/$1');

    });

    // Routes Laporan Penjualan
    $routes->group('laporan-penjualan', ['filter' => 'auth'],function($routes) {
        $routes->get('/', 'LaporanPenjualanController::index');
        $routes->post('/', 'LaporanPenjualanController::detail');
        $routes->post('cetak', 'LaporanPenjualanController::cetak');
    });

    // Routes Laporan Piutang
    $routes->group('laporan-piutang', ['filter' => 'auth'],function($routes) {
        $routes->get('/', 'LaporanPiutangController::index');
        $routes->post('/', 'LaporanPiutangController::detail');
        $routes->post('cetak', 'LaporanPiutangController::cetak');

    });

    $routes->group('jurnal-umum', ['filter' => 'auth'],function($routes) {
        $routes->get('/', 'JurnalUmumController::index');
        $routes->post('posting', 'JurnalUmumController::posting');
        $routes->get('cetak', 'JurnalUmumController::filter');
        $routes->post('cetak', 'JurnalUmumController::cetak');
    });

    $routes->group('buku-besar', ['filter' => 'auth'],function($routes) {
        $routes->get('/', 'BukuBesarController::index');
        $routes->post('/', 'BukuBesarController::detail');
        $routes->post('cetak', 'BukuBesarController::cetak');
    });

    $routes->group('neraca', ['filter' => 'auth'], function($routes) {
        $routes->get('/', 'NeracaController::index');
        $routes->post('/', 'NeracaController::detail');
        $routes->post('cetak', 'NeracaController::cetak');
    });
    
    $routes->group('edit-password', ['filter' => 'auth'], function($routes) {
        $routes->get('(:any)', 'AuthController::edit/$1');
        $routes->post('(:any)', 'AuthController::update/$1');
    });

    $routes->group('login', function($routes) {
        $routes->get('/', 'AuthController::index');
        $routes->post('/', 'AuthController::login');
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
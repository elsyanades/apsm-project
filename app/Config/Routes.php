<?php

namespace Config;

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
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Login::index');
$routes->post('login/cekuser', 'Login::cekuser');
$routes->get('login', 'Login::index');

$routes->get('home', 'Home::index', ['filter' => 'ceklogin']);
$routes->get('login/(:any)', 'Login::$1', ['filter' => 'ceklogin']);

$routes->get('customer', 'Customer::index', ['filter' => 'ceklogin']);
$routes->get('customer/(:any)', 'Customer::$1', ['filter' => 'ceklogin']);
$routes->post('customer/listdata', 'Customer::listdata');
$routes->get('customer/ambildata', 'Customer::ambildata');
$routes->post('customer/simpandata', 'Customer::simpandata');
$routes->post('customer/simpandatabanyak', 'Customer::simpandatabanyak');
$routes->get('customer/formtambah', 'Customer::formtambah');
$routes->post('customer/formupload', 'Customer::formupload');
$routes->get('customer/formtambahbanyak', 'Customer::formtambahbanyak');
$routes->post('customer/formedit', 'Customer::formedit/$1');
$routes->post('customer/hapus', 'Customer::hapus/$1');
$routes->post('customer/hapusbanyak', 'Customer::hapusbanyak/$1');
$routes->post('customer/updatedata', 'Customer::updatedata');

$routes->get('user', 'User::index', ['filter' => 'ceklogin']);
$routes->get('user/(:any)', 'User::$1', ['filter' => 'ceklogin']);
$routes->post('user/listdata', 'User::listdata');
$routes->get('user/ambildata', 'User::ambildata');
$routes->post('user/simpandata', 'User::simpandata');
$routes->get('user/formtambah', 'User::formtambah');
$routes->post('user/formupload', 'User::formupload');
$routes->post('user/formedit', 'User::formedit/$1');
$routes->post('user/hapus', 'User::hapus/$1');
$routes->post('user/updatedata', 'User::updatedata');

$routes->get('vendors', 'Vendor::index', ['filter' => 'ceklogin']);
$routes->get('vendors/(:any)', 'Vendor::$1', ['filter' => 'ceklogin']);
$routes->post('vendors/listdata', 'Vendor::listdata');
$routes->get('vendors/ambildata', 'Vendor::ambildata');
$routes->post('vendors/simpandata', 'Vendor::simpandata');
$routes->post('vendors/simpandatabanyak', 'Vendor::simpandatabanyak');
$routes->get('vendors/formtambah', 'Vendor::formtambah');
$routes->post('vendors/formupload', 'Vendor::formupload');
$routes->get('vendors/formtambahbanyak', 'Vendor::formtambahbanyak');
$routes->post('vendors/formedit', 'Vendor::formedit/$1');
$routes->post('vendors/hapus', 'Vendor::hapus/$1');
$routes->post('vendors/hapusbanyak', 'Vendor::hapusbanyak/$1');
$routes->post('vendors/updatedata', 'Vendor::updatedata');
$routes->post('vendors/doupload', 'Vendor::doupload');

$routes->get('marketing', 'Marketing::index', ['filter' => 'ceklogin']);
$routes->get('marketing/(:any)', 'Marketing::$1', ['filter' => 'ceklogin']);
$routes->post('marketing/listdata', 'Marketing::listdata');
$routes->get('marketing/ambildata', 'Marketing::ambildata');
$routes->post('marketing/simpandata', 'Marketing::simpandata');
$routes->get('marketing/formtambah', 'Marketing::formtambah');
$routes->post('marketing/formupload', 'Marketing::formupload');
$routes->post('marketing/formedit', 'Marketing::formedit/$1');
$routes->post('marketing/hapus', 'Marketing::hapus/$1');
$routes->post('marketing/updatedata', 'Marketing::updatedata');

$routes->get('marketingproject', 'Marketingproject::index', ['filter' => 'ceklogin']);
$routes->get('marketingproject/(:any)', 'Marketingproject::$1', ['filter' => 'ceklogin']);
$routes->post('marketingproject/listdata', 'Marketingproject::listdata');
$routes->get('marketingproject/ambildata', 'Marketingproject::ambildata');
$routes->post('marketingproject/simpandata', 'Marketingproject::simpandata');
$routes->get('marketingproject/formtambah', 'Marketingproject::formtambah');
$routes->post('marketingproject/formupload', 'Marketingproject::formupload');
$routes->post('marketingproject/formedit', 'Marketingproject::formedit/$1');
$routes->post('marketingproject/hapus', 'Marketingproject::hapus/$1');
$routes->post('marketingproject/updatedata', 'Marketingproject::updatedata');

$routes->get('kepalaops', 'Kepalaops::index', ['filter' => 'ceklogin']);
$routes->get('kepalaops/(:any)', 'Kepalaops::$1', ['filter' => 'ceklogin']);
$routes->post('kepalaops/listdata', 'Kepalaops::listdata');
$routes->get('kepalaops/ambildata', 'Kepalaops::ambildata');
$routes->post('kepalaops/simpandata', 'Kepalaops::simpandata');
$routes->get('kepalaops/formtambah', 'Kepalaops::formtambah');
$routes->post('kepalaops/formupload', 'Kepalaops::formupload');
$routes->post('kepalaops/formedit', 'Kepalaops::formedit/$1');
$routes->post('kepalaops/hapus', 'Kepalaops::hapus/$1');
$routes->post('kepalaops/updatedata', 'Kepalaops::updatedata');

$routes->get('admin', 'Admin::index', ['filter' => 'ceklogin']);
$routes->get('admin/(:any)', 'Admin::$1', ['filter' => 'ceklogin']);
$routes->post('admin/listdata', 'Admin::listdata');
$routes->get('admin/ambildata', 'Admin::ambildata');
$routes->post('admin/simpandata', 'Admin::simpandata');
$routes->get('admin/formtambah', 'Admin::formtambah');
$routes->post('admin/formupload', 'Admin::formupload');
$routes->post('admin/formedit', 'Admin::formedit/$1');
$routes->post('admin/hapus', 'Admin::hapus/$1');
$routes->post('admin/updatedata', 'Admin::updatedata');

$routes->get('monitoringcs', 'Monitoringcs::index', ['filter' => 'ceklogin']);
$routes->get('monitoringcs/(:any)', 'Monitoringcs::$1', ['filter' => 'ceklogin']);
$routes->post('monitoringcs/listdata', 'Monitoringcs::listdata');
$routes->get('monitoringcs/ambildata', 'Monitoringcs::ambildata');
$routes->post('monitoringcs/simpandata', 'Monitoringcs::simpandata');
$routes->get('monitoringcs/formtambah', 'Monitoringcs::formtambah');
$routes->post('monitoringcs/formupload', 'Monitoringcs::formupload');
$routes->post('monitoringcs/formedit', 'Monitoringcs::formedit/$1');
$routes->post('monitoringcs/hapus', 'Monitoringcs::hapus/$1');
$routes->post('monitoringcs/updatedata', 'Monitoringcs::updatedata');

$routes->get('staffops', 'Staffops::index', ['filter' => 'ceklogin']);
$routes->get('staffops/(:any)', 'Staffops::$1', ['filter' => 'ceklogin']);
$routes->post('staffops/listdata', 'Staffops::listdata');
$routes->get('staffops/ambildata', 'Staffops::ambildata');
$routes->post('staffops/simpandata', 'Staffops::simpandata');
$routes->get('staffops/formtambah', 'Staffops::formtambah');
$routes->post('staffops/formupload', 'Staffops::formupload');
$routes->post('staffops/formedit', 'Staffops::formedit/$1');
$routes->post('staffops/hapus', 'Staffops::hapus/$1');
$routes->post('staffops/updatedata', 'Staffops::updatedata');

$routes->get('laporan', 'Laporan::viewlaporan', ['filter' => 'ceklogin']);
$routes->post('/Laporan', 'Laporan::index', ['filter' => 'ceklogin']);
$routes->get('laporan/(:any)', 'Laporan::$1', ['filter' => 'ceklogin']);
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

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
$routes->get('/', 'Home::index');
$routes->get('home', 'Home::index');

$routes->get('customer', 'Customer::index');
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
$routes->post('customer/doupload', 'Customer::doupload');
$routes->get('customer/(:any)', 'Customer::$1');

$routes->get('user', 'User::index');
$routes->post('user/listdata', 'User::listdata');
$routes->get('user/ambildata', 'User::ambildata');
$routes->post('user/simpandata', 'User::simpandata');
$routes->get('user/formtambah', 'User::formtambah');
$routes->post('user/formupload', 'User::formupload');
$routes->post('user/formedit', 'User::formedit/$1');
$routes->post('user/hapus', 'User::hapus/$1');
$routes->post('user/updatedata', 'User::updatedata');
$routes->get('user/(:any)', 'User::$1');

$routes->get('vendors', 'Vendor::index');
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
$routes->get('vendors/(:any)', 'Vendor::$1');

$routes->get('marketing', 'Marketing::index');
$routes->post('marketing/listdata', 'Marketing::listdata');
$routes->get('marketing/ambildata', 'Marketing::ambildata');
$routes->post('marketing/simpandata', 'Marketing::simpandata');
$routes->post('marketing/simpandatabanyak', 'Marketing::simpandatabanyak');
$routes->get('marketing/formtambah', 'Marketing::formtambah');
$routes->post('marketing/formupload', 'Marketing::formupload');
$routes->get('marketing/formtambahbanyak', 'Marketing::formtambahbanyak');
$routes->post('marketing/formedit', 'Marketing::formedit/$1');
$routes->post('marketing/hapus', 'Marketing::hapus/$1');
$routes->post('marketing/hapusbanyak', 'Marketing::hapusbanyak/$1');
$routes->post('marketing/updatedata', 'Marketing::updatedata');
$routes->get('marketing/(:any)', 'Marketing::$1');

$routes->get('kepalaops', 'Kepalaops::index');
$routes->post('kepalaops/listdata', 'Kepalaops::listdata');
$routes->get('kepalaops/ambildata', 'Kepalaops::ambildata');
$routes->post('kepalaops/simpandata', 'Kepalaops::simpandata');
$routes->post('kepalaops/simpandatabanyak', 'Kepalaops::simpandatabanyak');
$routes->get('kepalaops/formtambah', 'Kepalaops::formtambah');
$routes->post('kepalaops/formupload', 'Kepalaops::formupload');
$routes->get('kepalaops/formtambahbanyak', 'Kepalaops::formtambahbanyak');
$routes->post('kepalaops/formedit', 'Kepalaops::formedit/$1');
$routes->post('kepalaops/hapus', 'Kepalaops::hapus/$1');
$routes->post('kepalaops/hapusbanyak', 'Kepalaops::hapusbanyak/$1');
$routes->post('kepalaops/updatedata', 'Kepalaops::updatedata');
$routes->get('kepalaops/(:any)', 'Kepalaops::$1');

$routes->get('admin', 'Admin::index');
$routes->post('admin/listdata', 'Admin::listdata');
$routes->get('admin/ambildata', 'Admin::ambildata');
$routes->post('admin/simpandata', 'Admin::simpandata');
$routes->post('admin/simpandatabanyak', 'Admin::simpandatabanyak');
$routes->get('admin/formtambah', 'Admin::formtambah');
$routes->post('admin/formupload', 'Admin::formupload');
$routes->get('admin/formtambahbanyak', 'Admin::formtambahbanyak');
$routes->post('admin/formedit', 'Admin::formedit/$1');
$routes->post('admin/hapus', 'Admin::hapus/$1');
$routes->post('admin/hapusbanyak', 'Admin::hapusbanyak/$1');
$routes->post('admin/updatedata', 'Admin::updatedata');
$routes->get('admin/(:any)', 'Admin::$1');

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

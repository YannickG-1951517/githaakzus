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
$routes->match(['get', 'post'], 'login/create_acc', 'Login::create');
$routes->get('home', 'Pages::view/$1');
$routes->get('/', 'Pages::view');

$routes->get('products', 'Products::index');
$routes->get('personalProducts', 'Products::personalProducts');
$routes->get('addProduct', 'Products::addProductPage');
$routes->get('products/(:segment)', 'Products::view/$1');

$routes->get('cart', 'cart::index');
$routes->get('addProduct/(:segment)', 'cart::addProduct/$1');

$routes->get('determineLoginStatus', 'Login::chooseLoginOrLogout');
$routes->get('login', 'Login::index');
$routes->get('createAcc', 'Login::create');

$routes->get('profile', 'Profile::index');
$routes->get('messages', 'Profile::messages');
$routes->get('newMessage', 'Profile::newMessagePage');
$routes->get('updateProfile', 'Profile::loadUpdatePage');


$routes->get('(:any)', 'Pages::view/$1');

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

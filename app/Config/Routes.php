<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('AuthController');
$routes->setDefaultMethod('register');
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

//Routes Login dan Register
$routes->get('register', 'AuthController::register');
$routes->post('register', 'AuthController::create');
$routes->post('register/create', 'AuthController::create');
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::authenticate');
$routes->post('/login/authenticate', 'AuthController::authenticate');

//Routes Home Penjual
$routes->get('penjualhome', 'Homepenjual::indexpenjual');
$routes->get('penjualhome/about', 'Homepenjual::about');
$routes->get('penjualhome/contact', 'Homepenjual::contact');
$routes->get('penjualhome/faq', 'Homepenjual::faq');

//Routes Home Pembeli
$routes->get('/', 'Home::index', ['as' => 'home']);
$routes->get('/about', 'Home::about');
$routes->get('/contact', 'Home::contact');
$routes->get('/faq', 'Home::faq');

//Routes Logout
$routes->get('logout', 'AuthController::logout');

//Routes Produk Penjual
$routes->get('produk', 'Produk::produk');
$routes->get('/produk/show', 'Produk::show');
$routes->get('/produk/addp', 'Produk::addp');
$routes->post('/produk/create', 'Produk::create');
$routes->get('produk/show/(:num)', 'Produk::show/$1');
$routes->get('produk/edit/(:num)', 'Produk::edit/$1');
$routes->post('produk/update/(:num)', 'Produk::update/$1');
$routes->get('produk/delete/(:num)', 'Produk::delete/$1');
$routes->post('produk/delete/(:num)', 'Produk::delete/$1');

//Routes Toko Pembeli
$routes->get('toko', 'Toko::toko');
$routes->get('/toko/show', 'Toko::show');
$routes->get('/toko/addp', 'Toko::addp');
$routes->post('/toko/create', 'Toko::create');
$routes->get('toko/show/(:num)', 'Toko::show/$1');
$routes->get('toko/edit/(:num)', 'Toko::edit/$1');
$routes->post('toko/update/(:num)', 'Toko::update/$1');
$routes->get('toko/delete/(:num)', 'Toko::delete/$1');
$routes->post('toko/delete/(:num)', 'Toko::delete/$1');
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

<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Front\FrontController');
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

// Front

$routes->get('/', 'Front\FrontController::index');

$routes->get('/sitara', 'Front\Sitara::index');

$routes->get('/wbs', 'Front\Wbs::index');

$routes->get('/yankum', 'Front\Yankum::index');

$routes->get('/home', 'Front\FrontController::index');

// Back

$routes->get('/Login', 'Back\Login::index');

$routes->get('/admin/users', 'Back\Users::index', ['filter' => 'auth']);

$routes->get('/admin/users/(:any)', 'Back\Users::$1', ['filter' => 'auth']);

$routes->get('/admin/sitara', 'Back\Sitara::index', ['filter' => 'auth']);

$routes->get('/admin/sitara/(:any)', 'Back\Sitara::$1', ['filter' => 'auth']);

$routes->get('/admin/tipikor', 'Back\Tipikor::index', ['filter' => 'auth']);

$routes->get('/admin/tipikor/(:any)', 'Back\Tipikor::$1', ['filter' => 'auth']);

$routes->get('/admin/wbs', 'Back\Wbs::index', ['filter' => 'auth']);

$routes->get('/admin/wbs/(:any)', 'Back\Wbs::$1', ['filter' => 'auth']);

$routes->get('/admin/yankum', 'Back\Yankum::index', ['filter' => 'auth']);

$routes->get('/admin/yankum/(:any)', 'Back\Yankum::$1', ['filter' => 'auth']);




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

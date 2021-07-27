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
$routes->group('admin', ['namespace' => 'App\Controllers\Back', 'filter' => 'auth'], function ($routes) {

	$routes->get('Login', 'Login::index');

	$routes->get('dashboard', 'Dashboard::index');

	$routes->get('dashboard/(:any)', 'Dashboard::$1');

	$routes->get('users', 'Users::index');

	$routes->get('users/(:any)', 'Users::$1');

	$routes->get('sitara', 'Sitara::index');

	$routes->get('sitara/(:any)', 'Sitara::$1');

	$routes->get('tipikor', 'Tipikor::index');

	$routes->get('tipikor/(:any)', 'Tipikor::$1');

	$routes->get('wbs', 'Wbs::index');

	$routes->get('wbs/(:any)', 'Wbs::$1');

	$routes->get('yankum', 'Yankum::index');

	$routes->get('yankum/(:any)', 'Yankum::$1');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

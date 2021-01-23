<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/Login', 'Login');
$routes->get('/Login/Logout', 'Login::logout');
$routes->get('/', 'Home::index');
$routes->get('/New', 'Home::newUser');
$routes->get('/Search-Name', 'Home::searchName');
$routes->get('/Insert-New', 'Home::insertNew');
$routes->get('/Insert', 'Home::insert');
$routes->get('/Report/Harian', 'Report::index');
$routes->get('/Report/Keseluruhan', 'Report::reportKeseluruhan');
$routes->add('/Pengguna/(:num)', 'Pengguna::index');
$routes->add('/Pengguna/New/(:num)', 'Pengguna::newForm');
$routes->add('/Pengguna/Insert/(:num)', 'Pengguna::insert');
$routes->add('/Pengguna/Delete/(:num)', 'Pengguna::deleteForm');
$routes->add('/Pengguna/Delete/Selected/(:num)', 'Pengguna::delete');
$routes->add('/Pengguna/Delete/(:num)/(:alphanum)', 'Pengguna::delete');
$routes->add('/Pengguna/(:num)/(:alphanum)', 'Pengguna::viewById');
$routes->add('/Pengguna/Update/(:num)/(:alphanum)', 'Pengguna::updateForm');
$routes->add('/Pengguna/Update/(:num)', 'Pengguna::update');

/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

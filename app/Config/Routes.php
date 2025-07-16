<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Testing
$routes->get('/supabase-test', 'SupabaseTest::index');

$routes->get('/', 'AuthController::index');
$routes->post('/login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');

$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('/dashboard', 'Dashboard::index');
    $routes->get('/balita', 'Toddler::index');
    $routes->get('/balita/(:num)', 'Toddler::detail/$1');
    $routes->post('/balita/tambah-balita', 'Toddler::AddToddler');
    $routes->put('/balita/edit-balita', 'Toddler::EditToddler');
    $routes->put('/balita/edit-ortu', 'Toddler::EditParent');
    $routes->post('/balita/tambah-pengukuran', 'Toddler::AddMeasurement');
    $routes->put('/balita/edit-pengukuran', 'Toddler::EditMeasurement');
$routes->delete('/balita/hapus-pengukuran', 'Toddler::DeleteMeasurement');
});

<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->get('/login', 'Login::index');
$routes->post('/login/auth', 'Login::auth');

$routes->get('/register', 'Register::index');
$routes->post('/register/save', 'Register::save');

$routes->get('dashboard', 'Dashboard::index');
$routes->post('lapor/kirim', 'Dashboard::kirim');

$routes->get('/laporan-keluhan', 'Dashboard::laporanKeluhan');





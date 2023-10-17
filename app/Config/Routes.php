<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);
$routes->get('/', 'Home::index');
$routes->get('/holaMundo', 'Home::holaMundo');
$routes->get('/login', 'Login::index');
$routes->get('/register', 'Login::register');
$routes->post('/registro-de-usuarios', 'Login::guardar');
$routes->post('/inicio-de-usuarios', 'Login::iniciar');
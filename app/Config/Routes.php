<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('/pengeluaran', 'Pengeluaran::index');
$routes->get('/pengeluaran/tambah', 'Pengeluaran::create');
$routes->post('/pengeluaran/simpan', 'Pengeluaran::save');
$routes->get('/pengeluaran/edit/(:num)', 'Pengeluaran::edit/$1');
$routes->post('/pengeluaran/update/(:num)', 'Pengeluaran::update/$1');
$routes->post('/pengeluaran/hapus/(:num)', 'Pengeluaran::delete/$1');
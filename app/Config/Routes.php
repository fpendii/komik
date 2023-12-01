<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');
$routes->get('/home', 'Pages::index');
$routes->get('pages/about', 'Pages::about');
$routes->get('komik', 'komik::index');
$routes->get('komik/(:segment)', 'komik::detail/$1');
$routes->get('komik/create', 'komik::create');
$routes->get('create', 'komik::create');
$routes->post('komik/save', 'komik::save');
$routes->post('save', 'komik::save');
$routes->delete('komik/delete-komik/(:num)', 'komik::deleteKomik/$1');
$routes->get('komik/edit/(:segment)','komik::editKomik/$1');
$routes->post('komik/edit/update/(:num)','komik::UpdateKomik/$1');


<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('tarefas', 'Tarefas::index');
$routes->get('tarefas/new', 'Tarefas::new');
$routes->post('tarefas/create', 'Tarefas::create');
$routes->get('tarefas/edit/(:num)', 'Tarefas::edit/$1');
$routes->post('tarefas/update/(:num)', 'Tarefas::update/$1');
$routes->post('tarefas/delete/(:num)', 'Tarefas::delete/$1');
$routes->get('tarefas/cronograma', 'Tarefas::cronograma');

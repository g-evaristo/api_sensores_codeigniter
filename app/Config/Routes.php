<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('/', 'Home::index');

// Rotas API Sensores
$routes->get('/api/sensores',              'Api\SensoresController::index');
$routes->get('/api/sensores/(:id)',       'Api\SensoresController::show/$1');
$routes->post('/api/sensores',             'Api\SensoresController::create');

// Rotas API Medidas Sensores
$routes->get('/api/medidas_sensores',              'Api\MedidasSensoresController::index');
$routes->get('/api/medidas_sensores/(:id)',       'Api\MedidasSensoresController::show/$1');
$routes->post('/api/medidas_sensores',             'Api\MedidasSensoresController::create');
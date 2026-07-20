<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('/', static function () {
    return redirect()->to('/swagger');
});

$routes->get('swagger', 'SwaggerController::index');

$routes->group('api', ['namespace' => 'App\Controllers\Api', 'filter' => 'cors',], static function ($routes) {
    // Rotas API Sensores
    $routes->get('sensores',              'SensoresController::index');
    $routes->get('sensores/(:id)',       'SensoresController::show/$1');
    $routes->post('sensores',             'SensoresController::create');

    // Rotas API Medidas Sensores
    $routes->get('medidas_sensores',              'MedidasSensoresController::index');
    $routes->get('medidas_sensores/(:id)',       'MedidasSensoresController::show/$1');
    $routes->post('medidas_sensores',             'MedidasSensoresController::create');
});
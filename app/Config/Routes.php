<?php

use App\Controllers\ReporteController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Reportes
$routes->get('reportes/r1', 'ReporteController::getReport1');
$routes->get('reportes/r2', 'ReporteController::getReport2');
$routes->get('reportes/r3', 'ReporteController::getReport3');
$routes->get('reportes/r4', 'ReporteController::getReport4');
$routes->get('reportes/showui', 'ReporteController::showUIReport');
$routes->get('reportes/publishers', 'ReporteController::getReportByPublisher');

$routes->get('reportes', 'ReporteController::showFilterForm');
$routes->post('reportes/filterSuperheroes', 'ReporteController::filterSuperheroes');

//Dashboard
$routes->get('/dashboard/informe1', 'DashboardController::getInforme1');
$routes->get('/dashboard/informe2', 'DashboardController::getInforme2');
$routes->get('/dashboard/informe3', 'DashboardController::getInforme3');
$routes->get('/dashboard/informe4', 'DashboardController::getInforme4');
$routes->get('public/api/getdatainforme5', 'DashboardController::getDataInforme5');
$routes->get('dashboard/getDataInforme5', 'DashboardController::getDataInforme5');



//API
$routes->get('/public/api/getdatainforme2','DashboardController::getDataInforme2');
$routes->get('/public/api/getdatainforme3','DashboardController::getDataInforme3');
$routes->get('/public/api/getdatainforme3cache','DashboardController::getDataInforme3Cache');
$routes->get('public/api/getdatainforme4', 'DashboardController::getDataInforme4');

//xlsx
$routes->get('/reportes/excel1',']ReporteController::getExcel1');
// Tarea
$routes->get('/generador', 'GerenadorController::index');

$routes->get('/actividad', 'GerenadorController::actividad');
$routes->post('/actividad/buscador', 'GerenadorController::buscador');
$routes->get('/actividad/poderes/(:num)', 'ReporteController::getReporte5/$1');

<?php

use App\Controllers\TurbinesController;
use App\Routing\RoutesCollector;

RoutesCollector::get('/turbines', [TurbinesController::class, 'getTurbines']);
RoutesCollector::get('/turbines/{id}', [TurbinesController::class, 'getTurbine']);
RoutesCollector::get('/turbines/{id}/address', [TurbinesController::class, 'getTurbineAddress']);
RoutesCollector::post('/turbines', [TurbinesController::class, 'createTurbine']);
RoutesCollector::put('/turbines/{id}', [TurbinesController::class, 'updateTurbine']);
RoutesCollector::delete('/turbines/{id}', [TurbinesController::class, 'deleteTurbine']);

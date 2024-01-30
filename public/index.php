<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../routes/api.php';
require_once __DIR__ . '/../helpers/helpers.php';

$databaseConfig = require __DIR__ . '/../config/database.php';
App\Services\Config::setConfig('database', $databaseConfig);

$requestUri = getRidOfQueryParams($_SERVER['REQUEST_URI']);
$requestMethod = $_SERVER['REQUEST_METHOD'];

$router = new App\Routing\Router($requestUri, $requestMethod);
$router->setRequestParams($_POST + $_GET);
$router->setRoutes(App\Routing\RoutesCollector::getRoutes());

try {
    echo $router->start();
} catch (App\Exceptions\ReportableException $exception) {
    http_response_code($exception->httpStatusCode());
    echo $exception->getMessage();
}


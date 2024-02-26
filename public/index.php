<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require __DIR__ . '/../vendor/autoload.php';

$routes = require __DIR__ . '/../config/routes.php';

if (array_key_exists($_GET['route'] ?? '', $routes)) {
    $route = $routes[$_GET['route']];

    $controller = new $route['controller']();
    $action     = $route['action'];

    $controller->$action();
} else {
    echo '<h1>404 - Not found</h1>';
}
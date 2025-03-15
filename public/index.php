<?php
require_once '../app/config/global.php';
require_once '../app/controllers/homeController.php';
require_once '../app/controllers/grupoController.php';

$url = $_SERVER['REQUEST_URI']; //lo que se ingresa en URL

$routes = include_once "../app/config/routes.php";

$matchedRoute = null;
foreach($routes as $route => $routeConfig){
    if (preg_match("#^$route$#", $url, $matches)) {
        $matchedRoute = $routeConfig;
        break;
    }
}

if ($matchedRoute) {
    $controllerName = $matchedRoute["controller"];
    $actionName = $matchedRoute["action"];
    if (class_exists($controllerName) && method_exists($controllerName, $actionName)) {
        //Obtener los parámetros capturados por la URL
        $parameters = array_slice($matches, 1);
        $controller = new $controllerName();
        $controller->$actionName(...$parameters);
        exit;
    }
}
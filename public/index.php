<?php
require_once '../app/config/global.php';
require_once '../app/controllers/homeController.php';
require_once '../app/controllers/loginController.php';
require_once '../app/controllers/administradorController.php';
require_once '../app/controllers/centroController.php';
require_once '../app/controllers/coordinadorController.php';
require_once '../app/controllers/programaController.php';
require_once '../app/controllers/ambienteController.php';
require_once '../app/controllers/fichaController.php';
require_once '../app/controllers/instructorController.php';
require_once '../app/controllers/competenciaController.php';
require_once '../app/controllers/asistenciaController.php';
require_once '../app/controllers/aprendizController.php';

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
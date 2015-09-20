<?php
ini_set('display_errors', 'On');
require('Core/Routing/Router.php');
include 'Core/Autoloader/Autoloader.php';

use Core\Routing;

$routeParameters = array_diff(explode('/', $_SERVER['REQUEST_URI']), array(''));
$router = new Routing\Router($routeParameters);

if($router->loadControllerIfExist()) {
    if($router->ifControllerHaveActionFromUrl()) {
        $router->getNumberOfActionArguments();
        $router->run();
    } else {
        throw new Exception('UNDEFINED ACTION!');
    }
} else {
    require 'Errors/404.php';
}
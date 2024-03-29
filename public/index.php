<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../vendor/autoload.php';
include '../config.php';

session_start();

if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] !== '/') {
    $requestUri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

    $path = trim($requestUri, '/');
    $path = explode('/', $path);

    $class = ucfirst($path[0]);
    if(isset($path[1])) {
        $method = $path[1];
    } else {
        $method = "index";
    }


    $class = 'Controller\\'.$class;
    if(class_exists($class)) {
        $object = new $class();

        if(method_exists($object, $method)) {
            if(isset($path[2])) {
                $object->$method($path[2]);
            }
            else {
                $object->$method();
            }

        }
        else {
            \Controller\Error::show(404);
        }

    }
    else {
        \Controller\Error::show(404);
    }

} else {
    $obj = new \Controller\Home();
    $obj->index();
}
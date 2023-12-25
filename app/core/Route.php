<?php


namespace app\core;


use app\exceptions\NotFoundException;
use http\Exception\InvalidArgumentException;

class Route
{
    /**
     * get uri and parse for controller and action
     * @throws NotFoundException
     */
    static public function init()
    {
        $urlPath = $_SERVER['REQUEST_URI'];
        $urlComponents = explode('/', $urlPath);
        $urlComponents = array_slice($urlComponents, 1);
        $controllerName = 'index';
        $action = 'index';
        if (count($urlComponents) > 2) {
            throw new NotFoundException();
        }
        if (!empty($urlComponents[0])) {
            $controllerName = $urlComponents[0];
        }
        if (!empty($urlComponents[1])) {
            $action = $urlComponents[1];
        }
        $controllerClass = 'app\controllers\\' . ucfirst($controllerName);
        if (!class_exists($controllerClass)) {
            throw new NotFoundException();
        }
        $controller = new $controllerClass();
        if (!($controller instanceof controllerable)) {
            throw new \InvalidArgumentException('excpected type ' . controllerable::class);
        }
        if (!method_exists($controller, $action)) {
            throw new NotFoundException();
        }
        $controller->$action();
    }

}
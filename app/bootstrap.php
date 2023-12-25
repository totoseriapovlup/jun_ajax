<?php

include_once '../app/core/App.php';

spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $path = \app\core\App::getRootPath() . $class . '.php';
    if (file_exists($path)) {
        include_once $path;
        return true;
    }
    return false;
});
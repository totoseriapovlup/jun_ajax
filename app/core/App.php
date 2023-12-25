<?php

namespace app\core;

class App
{
    /**
     * Real path of project directory at server
     * @var string|null
     */
    static protected ?string $rootPath = null;

    /**
     * getter method for $rootPth property
     * @return false|string|null
     */
    static public function getRootPath()
    {
        if (!self::$rootPath) {
            self::$rootPath = realpath($_SERVER['DOCUMENT_ROOT'] . '/..') . DIRECTORY_SEPARATOR;
        }
        return self::$rootPath;
    }
}
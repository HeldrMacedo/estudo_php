<?php

$al = new Application;
$al->register();

class Application
{
    public function register()
    {
        spl_autoload_register([$this, 'loadClass']);
    }
    public static function loadClass($class)
    {
        if (file_exists("App/{$class}.php")) {
            require_once "App/{$class}.php";
            return true;
        }
    }
}
<?php

define("FCPATH", __DIR__ . '/');
define("SYSPATH", FCPATH . 'system/');
define("APPPATH", FCPATH . 'application/');

require_once FCPATH . '/vendor/autoload.php';

$request = new \MVC\Core\Request();
$router  = new \MVC\Core\Router(function() use($request) {
    $registeredRoutesPath = FCPATH . 'application/config/routes.php';
    $registeredRoutes = [];
    if(is_readable($registeredRoutesPath)){
        $registeredRoutes = include $registeredRoutesPath;
    }
    $this->routes = $registeredRoutes;
    $this->allocateURI($request->uri());
    $this->parseRoutes();
});

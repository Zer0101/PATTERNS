<?php

namespace MVC\Core;

class Router
{

    private $routes = [];
    private $uri_string;
    private $uri_segments = [];

    public function __construct($routes){
        if(is_callable($routes)){
            $routes->call($this);
        } else {
            $this->routes = $routes;
        }
    }

    public function allocateURI($uri = ''){
        $uri = trim($uri, '/');
        if(empty($uri)){
            $uri = $this->routes['default'];
        }

        $this->uri_string = $uri;
        $this->uri_segments = explode('/', $uri);
    }

    public function parseRoutes(){
        $defaultMethod = 'index';

        $moduleName = ucfirst($this->uri_segments[0] ?? '');
        if(empty($moduleName) || !is_dir(APPPATH . 'modules/')){
            throw new \Exception ("This module doesn't exist");
        }

        $controllerName = "MVC\\Modules\\{$moduleName}\\Controller\\" . ucfirst($this->uri_segments[1] ?? '');
        if(!class_exists($controllerName)){
            throw new \Exception ("This class doesn't exist");
        }
        $controller = new $controllerName;

        $methodName = $this->uri_segments[2] ?? $defaultMethod;
        if(!method_exists($controller, $methodName)){
            throw new \Exception ("Method \"{$methodName}\" doesn't exist in class {$controllerName}");
        }

        $controller->$methodName();
    }
}
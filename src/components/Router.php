<?php

namespace Roma\MVC\components;

class Router
{

    private $routes;

    public function __construct(array $config)
    {
        $this->routes = $config;
    }

    private function getURI(){

        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run(){

        $uri = $this->getURI();

        foreach ($this->routes as $uriPattern => $path){

            if (preg_match("~$uriPattern~", $uri)) {

                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                $segments = explode('/', $internalRoute);

                $controllerName = array_shift($segments).'Controller';
                $controllerName = 'Roma\\MVC\\controllers\\'.ucfirst($controllerName);

                $actionName = 'action'.ucfirst(array_shift($segments));

                $parameters = $segments;

                $controllerObject = new $controllerName();

                $result = call_user_func_array(array($controllerObject, $actionName),$parameters);

                if ($result != null) {
                    break;
                }

            }
        }

    }
}
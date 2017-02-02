<?php
require_once '../vendor/autoload.php';

chdir(dirname(dirname(__FILE__)));

$router = new \Roma\MVC\components\Router(require 'config/routes.php');
$router->run();
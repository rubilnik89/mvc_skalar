<?php
require_once '../vendor/autoload.php';

ini_set('display_errors',1 );
error_reporting(E_ALL);

chdir(dirname(dirname(__FILE__)));

$router = new \Roma\MVC\components\Router();
$router->run();
<?php

namespace Roma\MVC\components;

class Db
{

    public static function getConnection()
    {
        $paramsPath = 'config/db_params.php';
        $params = include ($paramsPath);

        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new \PDO($dsn, $params['user'], $params['password']);

        return $db;
    }
}
<?php


namespace Roma\MVC\models;


class Emploee_hour implements Emploee
{

    public static function getCost($cost, $hours=1)
    {
        return ($cost * $hours);

    }
}
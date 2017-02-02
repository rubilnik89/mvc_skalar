<?php
/**
 * Created by PhpStorm.
 * User: Roma
 * Date: 02.02.2017
 * Time: 16:59
 */

namespace Roma\MVC\models;


class EmploeeHourly extends EmploeeBase
{
    public function cost($hours=1){return ($this->cost * $hours);}
}
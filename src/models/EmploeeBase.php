<?php
/**
 * Created by PhpStorm.
 * User: Roma
 * Date: 02.02.2017
 * Time: 15:17
 */

namespace Roma\MVC\models;


class EmploeeBase implements Emploee
{
    protected $id;
    protected $name;
    protected $birthday;
    protected $department;
    protected $position;
    protected $payment;
    protected $cost;

    public function __construct(
        $id,
        $name,
        $birthday,
        $department,
        $position,
        $payment,
        $cost
    )
    {
        $this->id=$id;
        $this->name=$name;
        $this->birthday=$birthday;
        $this->department=$department;
        $this->position=$position;
        $this->payment=$payment;
        $this->cost=$cost;
    }

    public function id(){return $this->id;}
    public function name(){return $this->name;}
    public function birthday(){return $this->birthday;}
    public function department(){return $this->department;}
    public function position(){return $this->position;}
    public function payment(){return $this->payment;}
    public function cost(){return $this->cost;}

}
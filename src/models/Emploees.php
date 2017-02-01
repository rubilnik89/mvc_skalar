<?php

namespace Roma\MVC\models;

use Roma\MVC\components\Db;

class Emploees
{

    public static function all($limit, $offset){
        $db = Db::getConnection();

        $result = $db->prepare('SELECT * FROM emploee LIMIT :limit OFFSET :offset');
        $result->bindValue(':limit', (int) $limit, \PDO::PARAM_INT);
        $result->bindValue(':offset', (int) $offset, \PDO::PARAM_INT);
        $result->execute();

        $i = 0;
        $emploeeList = [];
        while ($row = $result->fetch()){
            $emploeeList[$i]['id'] = $row['id'];
            $emploeeList[$i]['name'] = $row['name'];
            $emploeeList[$i]['birthday'] = $row['birthday'];
            $emploeeList[$i]['department'] = $row['department'];
            $emploeeList[$i]['position'] = $row['position'];
            $emploeeList[$i]['payment'] = $row['payment'];            
            if($emploeeList[$i]['payment'] == 0){
                $emploeeList[$i]['cost'] = Emploee_hour::getCost($row['cost'],$hour=1);
            }else{ $emploeeList[$i]['cost'] = Emploee_Month::getCost($row['cost']); }
            $i++;
        }

        return $emploeeList;
    }
    
    public static function department($department, $limit, $offset){
        $db = Db::getConnection();

        $result = $db->prepare('SELECT * FROM emploee WHERE department= :department LIMIT :limit OFFSET :offset');
        $result->bindValue(':department', (string) $department, \PDO::PARAM_STR);
        $result->bindValue(':limit', (int) $limit, \PDO::PARAM_INT);
        $result->bindValue(':offset', (int) $offset, \PDO::PARAM_INT);
        $result->execute();

        $i = 0;
        $emploeeList = [];
        while ($row = $result->fetch()){
            $emploeeList[$i]['id'] = $row['id'];
            $emploeeList[$i]['name'] = $row['name'];
            $emploeeList[$i]['birthday'] = $row['birthday'];
            $emploeeList[$i]['department'] = $row['department'];
            $emploeeList[$i]['position'] = $row['position'];
            $emploeeList[$i]['payment'] = $row['payment'];
            if($emploeeList[$i]['payment'] == 0){
                $emploeeList[$i]['cost'] = Emploee_hour::getCost($row['cost'],$hour=1);
            }else{ $emploeeList[$i]['cost'] = Emploee_Month::getCost($row['cost']); }
            $i++;
        }

        return $emploeeList;
    }
}
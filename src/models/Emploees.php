<?php

namespace Roma\MVC\models;

use Roma\MVC\components\Db;

class Emploees
{

    public static function all($limit, $offset)
    {
        $db = Db::getConnection();

        $result = $db->prepare('SELECT * FROM emploee LIMIT :limit OFFSET :offset');
        $result->bindValue(':limit', (int)$limit, \PDO::PARAM_INT);
        $result->bindValue(':offset', (int)$offset, \PDO::PARAM_INT);
        $result->execute();

        while ($row = $result->fetch()) {
            if($row['cost']==1){
                $emploeeList[] = new EmploeeBase(
                    $row['id'],
                    $row['name'],
                    $row['birthday'],
                    $row['department'],
                    $row['position'],
                    $row['payment'],
                    $row['cost']
                );}
            else{
                $emploeeList[] = new EmploeeHourly(
                    $row['id'],
                    $row['name'],
                    $row['birthday'],
                    $row['department'],
                    $row['position'],
                    $row['payment'],
                    $row['cost']
                );}
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

        while ($row = $result->fetch()) {
            if($row['cost']==1){
                $emploeeList[] = new EmploeeBase(
                    $row['id'],
                    $row['name'],
                    $row['birthday'],
                    $row['department'],
                    $row['position'],
                    $row['payment'],
                    $row['cost']
                );}
            else{
                $emploeeList[] = new EmploeeHourly(
                    $row['id'],
                    $row['name'],
                    $row['birthday'],
                    $row['department'],
                    $row['position'],
                    $row['payment'],
                    $row['cost']
                );}
        }
        return $emploeeList;
    }
}
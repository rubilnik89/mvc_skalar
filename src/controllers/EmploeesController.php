<?php

namespace Roma\MVC\controllers;

use Roma\MVC\components\Db;
use Roma\MVC\models\Emploees;


class EmploeesController
{
    public function actionAll($page=1, $limit = 5)
    {
        
        if(!empty($_POST['limit'])){
            $limit = $_POST['limit'];
        }
        $db=Db::getConnection();

        $count_show_pages=2;
        $result2=$db->query("SELECT COUNT(id) FROM emploee")->fetchColumn();
        $count_pages=ceil($result2/$limit);
        $count_pages++;
        if ($page>$count_pages) $page = 1;
        if (!isset($offset)) $offset=0;
        $offset=--$page*$limit;
        $this_page = $page+1;
        $start = $this_page-$count_show_pages;
        $end = $this_page+$count_show_pages;

        $emploeeList = array();
        $emploeeList = Emploees::all($limit, $offset);

        require_once ('views/emploees/index.php');

        return true;
    }

    public function actionDepartment($department, $page = 1, $limit = 5){


        if(!empty($_POST['limit'])){
            $limit = $_POST['limit'];
        }
        if(!empty($_POST['department'])){
            $department = $_POST['department'];
        }

        
        $db=Db::getConnection();
        $count_show_pages=2;
        $result2=$db->prepare("SELECT id FROM emploee WHERE department= :department");
        $result2->bindValue(':department', (string) $department, \PDO::PARAM_STR);
        $result2->execute();
        $num = $result2->rowCount();
        $count_pages=ceil($num/$limit);
        $count_pages++;
        if ($page>$count_pages) $page = 1;
        if (!isset($offset)) $offset=0;
        $offset=--$page*$limit;
        $this_page = $page+1;
        $start = $this_page-$count_show_pages;
        $end = $this_page+$count_show_pages;

        $emploeeList = array();
        $emploeeList = Emploees::department($department, $limit, $offset);


        require_once ('views/departments/index.php');
        return true;
    }

}
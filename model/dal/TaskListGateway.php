<?php

class ListGateway {
    private $connect;

    public function __construct(){
        $this->connect = new Connection(Config::$dsn, Config::$user, Config::$pwd);
    }

    public function insert(TaskList $list){
        $query="INSERT INTO List VALUES(:name, :privacy, :user)";
        $this->connect->executeQuery($query, array(
            ':name' => array($list->getName(), PDO::PARAM_STR),
            ':privacy' => array($list->isPrivate(), PDO::PARAM_BOOL),
            ':user' => array($list->getUser(), PDO::PARAM_INT),
        ));
    }

    public function delete(TaskList $list){
        $query="DELETE FROM List WHERE id_list=:id";
        $this->connect->executeQuery($query, array(
            ':id' => array($list->getId(), PDO::PARAM_INT)
        ));
    }

    public function findByName(string $name){
        $tab=array();
        $query="SELECT * FROM List WHERE name=:name";
        $this->connect->executeQuery($query, array(
            ':name'=> array($name, PDO::PARAM_STR)));
        $result=$this->connect->getResults();
        foreach($result as $value){
            $tab[]=new TaskList($value['id_list'], $value['name'], $value['privacy'], $value['user']);
        }
        return $tab;
    }

    public function findByPrivacy(int $privacy){
        $tab=array();
        $query="SELECT * FROM List WHERE privacy=:privacy";
        $this->connect->executeQuery($query, array(
            ':privacy'=> array($privacy, PDO::PARAM_BOOL)));
        $result=$this->connect->getResults();
        foreach($result as $value){
            $tab[]=new TaskList($value['id_list'], $value['name'], $value['privacy'], $value['user']);
        }
        return $tab;
    }
}
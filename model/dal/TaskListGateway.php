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

    public function findById(int $id_list) : TaskList{
        $query="SELECT * FROM List WHERE id_list=:id";
        $this->connect->executeQuery($query, array(
            ':id'=> array($id_list, PDO::PARAM_STR)));
        $result=$this->connect->getResults();
        return new TaskList($result['id_list'], $result['name'], $result['privacy'], $result['user']);
    }

    public function findByName(string $name) : TaskList{
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
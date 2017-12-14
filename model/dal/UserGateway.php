<?php

class UserGateway {

    private $connect;

    public function __construct(){
        $this->connect = new Connection(Config::$dsn, Config::$user, Config::$pwd);
    }

    public function insert(User $user){
        $query="INSERT INTO User VALUES(:nom, :pwd, :admin)";
        $this->connect->executeQuery($query, array(
            ':nom' => array($user->getLogin(), PDO::PARAM_STR),
            ':pwd' => array($user->getPwd(), PDO::PARAM_STR),
            ':admin' => array($user->isAdmin(), PDO::PARAM_BOOL),
        ));
    }

    public function findByName(string $login){
        $query='SELECT * FROM User WHERE login=:login';
        $this->connect->executeQuery($query, array(
            ':login'=>array($login, PDO::PARAM_STR)
        ));
        $result = $this->connect->getResults();
        return new User($result['id_user'], $result['login'], $result['pwd'], $result['admin']);
    }
}
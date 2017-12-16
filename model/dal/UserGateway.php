<?php

class UserGateway extends AbstractGateway {

    public function insert(User $user){
        try {
            $query = "INSERT INTO User VALUES(:nom, :pwd, :admin)";
            $this->connect->executeQuery($query, array(
                ':nom' => array($user->getLogin(), PDO::PARAM_STR),
                ':pwd' => array($user->getPwd(), PDO::PARAM_STR),
                ':admin' => array($user->isAdmin(), PDO::PARAM_BOOL),
            ));
        }
        catch (PDOException$e){
            throw new Exception("Impossible d'ajouter le user àla base de donnée");
        }
    }

    public function findByName(string $login) : User {
        try {
            $query = 'SELECT * FROM User WHERE login=:login';
            $this->connect->executeQuery($query, array(
                ':login' => array($login, PDO::PARAM_STR)
            ));
            $result = $this->connect->getResults();
            return new User($result['id_user'], $result['login'], $result['pwd'], $result['admin']);
        }
        catch (PDOException$e){
            throw new Exception("Impossible d'acceder à la base de donnée");
        }
    }
}
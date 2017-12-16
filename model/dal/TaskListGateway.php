<?php

class TaskListGateway extends AbstractGateway {

    public function insert(TaskList $list){
        $query="INSERT INTO List VALUES(NULL, :name, :privacy, :user)";
        try {
            $this->connect->executeQuery($query, array(
                ':name' => array($list->getName(), PDO::PARAM_STR),
                ':privacy' => array($list->isPrivate(), PDO::PARAM_BOOL),
                ':user' => array($list->getUser(), PDO::PARAM_INT),
            ));
        }
        catch(PDOException $e){
            throw new Exception("Impossible d'ajouter la liste à la base de donnée");
        }
    }

    public function delete($id_list){
        try {
            $query = "DELETE FROM List WHERE id_list=:id";
            $this->connect->executeQuery($query, array(
                ':id' => array($id_list, PDO::PARAM_INT)
            ));
        }
        catch(PDOException $e){
            throw new Exception("Impossible de supprimer la liste de la base de donnée");
        }
    }

    public function findById(int $id_list) : TaskList{
        try {
            $query = "SELECT * FROM List WHERE id_list=:id";
            $this->connect->executeQuery($query, array(
                ':id' => array($id_list, PDO::PARAM_STR)));
            $result = $this->connect->getResults();
            return new TaskList($result['id_list'], $result['name'], $result['privacy'], $result['user']);
        }
        catch (PDOException $e){
            throw new Exception("Impossible d'acceder à la base de donnée");
        }
    }

    public function findByName(string $name) : TaskList{
        $tab=array();
        try {
            $query = "SELECT * FROM List WHERE name=:name";
            $this->connect->executeQuery($query, array(
                ':name' => array($name, PDO::PARAM_STR)));
            $result = $this->connect->getResults();
            foreach ($result as $value) {
                $tab[] = new TaskList($value['id_list'], $value['name'], $value['privacy'], $value['user']);
            }
            return $tab;
        }
        catch (PDOException $e){
            throw new Exception("Impossible d'acceder à la base de donnée");
        }
    }

    public function findByPrivacy(int $privacy){
        $tab=array();
        try {
            $query = "SELECT * FROM List WHERE privacy=:privacy";
            $this->connect->executeQuery($query, array(
                ':privacy' => array($privacy, PDO::PARAM_BOOL)));
            $result = $this->connect->getResults();
            foreach ($result as $value) {
                $tab[] = new TaskList($value['id_list'], $value['name'], $value['privacy'], $value['user']);
            }
            return $tab;
        }
        catch (PDOException $e){
            throw new Exception("Impossible d'acceder à la base de donnée");
        }
    }

    public function selectAll(){
        $tab=array();
        try {
            $query = "SELECT * FROM List";
            $this->connect->executeQuery($query);
            $result = $this->connect->getResults();
            foreach ($result as $value) {
                $tab[] = new TaskList($value['id_list'], $value['name'], $value['privacy'], $value['user']);
            }
            return $tab;
        }
        catch (PDOException $e){
            throw new Exception("Impossible d'acceder à la base de donnée");
        }
    }
}
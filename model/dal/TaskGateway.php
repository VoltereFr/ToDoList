<?php

class TaskGateway extends AbstractGateway {

    public function insert(Task $t){
        $query="INSERT INTO Task VALUES(NULL, :name, :task, :id_list, :categ, :done)";

        try {
            $this->connect->executeQuery($query, array(
                ':name' => array($t->getName(), PDO::PARAM_STR),
                ':task' => array($t->getTask(), PDO::PARAM_STR),
                ':id_list' => array($t->getList(), PDO::PARAM_INT),
                ':categ' => array($t->getCateg(), PDO::PARAM_STR),
                ':done' => array($t->getDone(), PDO::PARAM_BOOL),
            ));
        }
        catch(PDOException $e){
            throw new Exception("Impossible d'ajouter la tâche à la base de donnée");
        }
    }

    public function delete(int $id, int $id_list){
        $query="DELETE FROM Task WHERE id=:id AND id_list=:id_list";
        try {
            $this->connect->executeQuery($query, array(
                ':id' => array($id, PDO::PARAM_INT),
                ':id_list' => array($id_list, PDO::PARAM_INT)
            ));
        }
        catch(PDOException $e){
            throw new Exception("Impossible de supprimer la tâche de la base de donnée");
        }
    }

    public function getTaskFromList(int $id_list){
        $tab=array();

        try {
            $query = 'SELECT * FROM Task WHERE id_list=:id_list';
            $this->connect->executeQuery($query, array(
                ':id_list' => array($id_list, PDO::PARAM_INT)
            ));
            $result = $this->connect->getResults();

            foreach ($result as $value) {
                $tab[] = new Task($value['id'], $value['name'], $value['task'], $value['id_list'], $value['categorie'], $value['done']);
            }
            return $tab;
        }
        catch (PDOException $e){
            throw new Exception("Impossible d'acceder à la base de donnée");
        }
    }

    public function findByCateg(string $categ) {
        $tab=array();
        try {
            $query = "SELECT * FROM Task WHERE categorie=:categ";
            $this->connect->executeQuery($query, array(
                ':categ' => array($categ, PDO::PARAM_STR)));
            $result = $this->connect->getResults();
            foreach ($result as $value) {
                $tab[] = new Task($value['id'], $value['name'], $value['task'], $value['id_list'], $value['categorie'], $value['done']);
            }
            return $tab;
        }
        catch (PDOException $e){
            throw new Exception("Impossible d'acceder à la base de donnée");
        }
    }
}
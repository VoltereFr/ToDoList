<?php

class ControllerVisitor
{
    private $taskModel;

    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
        $this->taskModel = new TaskModel();
    }

    public function connect() {
        $login = Sanitize::sanitize_string($_POST['username']);
        $pwd = Sanitize::sanitize_string($_POST['password']);
        if($this->userModel.connect($login, $pwd)){
            require_once(Config::$views['homepage']);
        }else{
            require_once(Config::$views['error']);
        }
    }

    public function createPublicList() {

    }

    public function insertTask() {
        if(count($_POST)>0) {
            $id = Sanitize::sanitize_string($_POST['id']);
            $name = Sanitize::sanitize_string($_POST['nom']);
            $task = Sanitize::sanitize_string($_POST['tache']);
            $idList= Sanitize::sanitize_string($_POST['id_list']);
            $categ = Sanitize::sanitize_string($_POST['categ']);
            $done = Sanitize::sanitize_string($_POST['done']);

            $task = new Task($id, $name, $task, $idList, $categ);
            $this->TaskModel->insertTask($task);
        }
    }

    public function deleteTask() {

    }

    public function consultPublicList() {

    }
}


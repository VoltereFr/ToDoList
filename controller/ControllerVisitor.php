<?php

class ControllerVisitor {

    private $listModel;

    private $taskModel;

    private $userModel;

    public function __construct() {
        $this->listModel = new ListModel();
        $this->userModel = new UserModel();
        $this->taskModel = new TaskModel();
    }

    public function connect() {
        try {
            $login = Sanitize::sanitize_string($_POST['username']);
            $pwd = Sanitize::sanitize_string($_POST['password']);
            if ($this->userModel->connect($login, $pwd)) {
                require_once(Config::$views['homepage']);
            } else {
                require_once(Config::$views['error']);
            }
        }
        catch (Exception $e) {
            $dVuesErreur[]= $e;
            require_once(Config::$views['error']);
        }
    }

    public function createPublicList() {
        if(count($_POST)>0) {
            $name = Sanitize::sanitize_string($_POST['name']);
            $list = new TaskList($name, false, NULL);
            $this->listModel->createPublicList($list);
        }
    }

    public function insertTask() {
        if(count($_POST)>0) {
            $name = Sanitize::sanitize_string($_POST['name']);
            $task = Sanitize::sanitize_string($_POST['tache']);
            $idList= Sanitize::sanitize_string($_POST['id_list']);
            $categ = Sanitize::sanitize_string($_POST['categ']);

            $task = new Task($name, $task, $idList, $categ);
            $this->taskModel->insertTask($task);
        }
    }

    public function deleteTask() {
        $id = Sanitize::sanitize_string($_POST['id']);

        $this->taskModel->deleteTask($id);
    }

    public function consultPublicList() {
        $id_list = Sanitize::sanitize_string($_POST['id']);
        $list = $this->listModel->findById($id_list);
        $this->taskModel->getTaskFromList($id_list);
    }
}


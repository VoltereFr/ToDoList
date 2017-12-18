<?php

class ControllerVisitor extends AbstractController {

    public function connect() {
        try {
            $login = Sanitize::sanitize_string($_POST['login']);
            $pwd = Sanitize::sanitize_string($_POST['pwd']);
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
        if(count($_REQUEST)>0) {
            $name = Sanitize::sanitize_string($_REQUEST['name']);

            $this->listModel->createList($name);
        }
        $res = $this->showPublicList();
        require_once(Config::$views['homepage']);
    }

	public function consultPublicList() {
        $id_list = Sanitize::sanitize_string($_GET['listId']);
        $list = $this->listModel->findById($id_list);
        $task_tab = $this->taskModel->getTaskFromList($id_list);
        require_once(Config::$views['showList']);
    }

    public function showPublicList(){
        return $this->listModel->showPublicList();
    }

    public function deleteList() {
        $id_list = Sanitize::sanitize_string($_GET['id_list']);

        $this->listModel->deleteList($id_list);
    }

    public function insertTask() {
        if(count($_POST)>0) {
            $name = Sanitize::sanitize_string($_POST['name']);
            $task = Sanitize::sanitize_string($_POST['tache']);
            $idList= Sanitize::sanitize_string($_GET['id_list']);
            $categ = Sanitize::sanitize_string($_POST['categ']);

            $this->taskModel->insertTask($name, $task, $idList, $categ);
        }
    }

    public function deleteTask() {
        $id = Sanitize::sanitize_string($_GET['id']);
        $id_list = Sanitize::sanitize_string($_GET['id_list']);

        $this->taskModel->deleteTask($id, $id_list);
    }

    public function addUser(){
        try {
            $login = Sanitize::sanitize_string($_POST['login']);
            $pwd = Sanitize::sanitize_string($_POST['pwd']);
            if($this->userModel->addUser($login, $pwd)) {
                require_once(Config::$views['homepage']);
            }
            else{
                require_once(Config::$views['inscription']);
            }
        }
        catch (Exception $e) {
            $error[]= $e->getMessage();
            require_once(Config::$views['error']);
        }
    }
}


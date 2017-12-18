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
        else {
            throw new Exception("Impossible de créer la liste, paramètres incorrects");
        }
        $res = $this->showPublicList();
        require_once(Config::$views['homepage']);
    }

	public function consultPublicList() {
        $id_list = Sanitize::sanitize_int($_GET['listId']);
        $list = $this->listModel->findById($id_list);
        $task_tab = $this->taskModel->getTaskFromList($id_list);
        require_once(Config::$views['showList']);
    }

    public function showPublicList(){
        return $this->listModel->showPublicList();
    }

    public function deleteList() {
        $id_list = Sanitize::sanitize_int($_GET['listId']);
        $this->listModel->deleteList($id_list);
        $task_tab = $this->taskModel->getTaskFromList($id_list);
        foreach ($task_tab as $value){
            $this->taskModel->deleteTask($value['id']);
        }
        $res = $this->showPublicList();
        require_once(Config::$views['homepage']);
    }

    public function insertTask() {
        if(count($_GET)>0) {
            $name = Sanitize::sanitize_string($_GET['name']);
            $task = Sanitize::sanitize_string($_GET['task']);
            $id_list= Sanitize::sanitize_int($_GET['id_list']);
            $categ = Sanitize::sanitize_string($_GET['categ']);

            $this->taskModel->insertTask($name, $task, $id_list, $categ);

            $list = $this->listModel->findById($id_list);
            $task_tab = $this->taskModel->getTaskFromList($id_list);
            require_once(Config::$views['showList']);
        }
    }

    public function deleteTask() {
        $id = Sanitize::sanitize_int($_GET['id']);
        $id_list = Sanitize::sanitize_int($_GET['listId']);

        $this->taskModel->deleteTask($id);

        $list = $this->listModel->findById($id_list);
        $task_tab = $this->taskModel->getTaskFromList($id_list);
        require_once(Config::$views['showList']);
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

    public function goToHome() {
        $res = $this->showPublicList();
        require_once(Config::$views['homepage']);
    }
}


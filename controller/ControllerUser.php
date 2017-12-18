<?php

class ControllerUser extends AbstractController {

    public function disconnect() {
        try {
            if ($this->userModel->disconnect()) {
                require_once(Config::$views['homepage']);
            }
            else {
                require_once(Config::$views['error']);
            }
        }
        catch (Exception $e) {
            $dVuesErreur[] = $e;
            require_once(Config::$views['error']);
        }
    }

    public function createPrivateList()
    {
        if (count($_REQUEST) > 0) {
            $name = Sanitize::sanitize_string($_REQUEST['name']);
            $list = new TaskList($name, true, Sanitize::sanitize_int($_SESSION['id']));
            $this->listModel->createList($list);
        } else {
            throw new Exception("Impossible de créer la liste, paramètres incorrects");
        }
        $res = $this->showPrivateList();
        require_once(Config::$views['privateList']);
    }

    public function deletePrivateList() {
        $id = Sanitize::sanitize_string($_REQUEST['id']);

        $this->taskModel->deleteTask($id);
    }

    public function consultPrivateList() {
        $id_list = Sanitize::sanitize_string($_REQUEST['id']);
        $list = $this->listModel->findById($id_list);
        if($list['user'] != Sanitize::sanitize_int($_SESSION['id'])) {
            $error[]= "Vous n'avez pas les droits d'accès à cette liste" ;
            require_once(Config::$views['privateList']);
        }
        else {
            $task_tab = $this->taskModel->getTaskFromList($id_list);
            require_once(Config::$views['privateList']);
        }
    }

	public function showPrivateList(){
        return $this->listModel->showPrivateList(Sanitize::sanitize_int($_SESSION['id']));
    }
}

<?php

class ControllerUser extends AbstractController {

    public function disconnect() {
        try {
            if ($this->userModel->disconnect()) {
                require_once(Config::$views['homepage']);
            } else {
                require_once(Config::$views['error']);
            }
        } catch (Exception $e) {
            $dVuesErreur[] = $e;
            require_once(Config::$views['error']);
        }
    }

    public function createPrivateList() {
        if (count($_POST) > 0) {
            $name = Sanitize::sanitize_string($_POST['name']);
            $list = new TaskList($name, true, $_SESSION['login']);
            $this->listModel->createPublicList($list);
        }
    }

    public function deletePrivateList() {
        $id = Sanitize::sanitize_string($_POST['id']);

        $this->taskModel->deleteTask($id);
    }

    public function consultPrivateList() {
        $id_list = Sanitize::sanitize_string($_POST['id']);
        $list = $this->listModel->findById($id_list);
        $task_tab = $this->taskModel->getTaskFromList($id_list);
        require_once(Config::$views['']);
    }
}
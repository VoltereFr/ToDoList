<?php

abstract class AbstractController {

    protected $listModel;

    protected $taskModel;

    protected $userModel;

    public function __construct() {
        $this->listModel = new ListModel();
        $this->userModel = new UserModel();
        $this->taskModel = new TaskModel();
    }

    public function goToInscription() {
        require_once(Config::$views['inscription']);
    }

    public function goToAddList() {
        require_once(Config::$views['addList']);
    }

    public function goToHome() {
        $res = $this->listModel->showPublicList();
        require_once(Config::$views['homepage']);
    }
}
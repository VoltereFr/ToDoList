<?php

abstract class AbstractController {

    protected $listModel;

    protected $taskModel;

    protected $userModel;

    public function __construct()
    {
        $this->listModel = new ListModel();
        $this->userModel = new UserModel();
        $this->taskModel = new TaskModel();
    }

    public function goToInscription(){
        require_once(Config::$views['inscription']);
    }

    public function goToHome(){
        require_once(Config::$views['homepage']);
    }

    public function goToAddList(){
        require_once(Config::$views['addList']);
    }

    public function goToAddTask(){
        require_once(Config::$views['addTask']);
    }
}
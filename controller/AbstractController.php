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
}
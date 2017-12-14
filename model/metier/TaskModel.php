<?php

class TaskModel {

    private $taskGw;

    public function __construct() {
        $this->taskGw = new TaskGateway();
    }

    public function insertTask($task) {
        $this->taskGw->insert($task);
    }

    public function deleteTask($id_task) {
        $this->taskGw->delete($id_task);
    }

    public function getTaskFromList($id_list) {
        return $this->taskGw->getTaskFromList($id_list);
    }
}
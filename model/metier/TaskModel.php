<?php

class TaskModel {

    private $taskGw;

    public function __construct() {
        $this->taskGw = new TaskGateway();
    }

    public function insertTask($name, $task, $idList, $categ) {
        $task = new Task($name, $task, $idList, $categ);
        $this->taskGw->insert($task);
    }

    public function deleteTask($id_task, $id_list) {
        $this->taskGw->delete($id_task, id_list);
    }

    public function getTaskFromList($id_list) {
        return $this->taskGw->getTaskFromList($id_list);
    }
}
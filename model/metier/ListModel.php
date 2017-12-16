<?php

class ListModel {

    private $listGw;

    public function __construct() {
        $this->listGw = new TaskListGateway();
    }

    public function createPublicList($login) {
        $list = new TaskList($login, false, NULL);
        $this->listGw->insert($list);
    }

    public function findById($id_list) {
        return $this->listGw->findById($id_list);
    }

    public function showPublicList() {
        return $this->listGw->selectAll();
    }

    public function deleteList($id_list){
        $this->listGw->delete($id_list);
    }
}
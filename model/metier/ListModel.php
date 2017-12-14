<?php

class ListModel {

    private $listGw;

    public function __construct() {
        $this->listGw = new ListGateway();
    }

    public function createPublicList($list) {
        $this->listGw->insert($list);
    }

    public function findById($id_list) {
        return $this->listGw->findById($id_list);
    }
}
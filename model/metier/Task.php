<?php

class Task {

    private $id;

    private $name;

    private $task;

    private $id_list;

    private $categ;

    private $done;

    public function __construct() {

        $cpt = func_num_args();
        $args = func_get_args();

        switch($cpt) {
            case '6':
                $this->constructWithId($args[0], $args[1], $args[2], $args[3], $args[4], $args[5]);
                break;
            default :
                $this->constructWithoutId($args[0], $args[1], $args[2], $args[3]);
                break;
        }
    }

    public function constructWithoutId($name, $task, $id_list, $categ){
        $this->name = $name;
        $this->task = $task;
        $this->id_list = $id_list;
        $this-> categ = $categ;
        $this->done = false;
    }

    public function constructWithId($id, $name, $task, $id_list, $categ, $done){
        $this->id=$id;
        $this->name = $name;
        $this->task = $task;
        $this->id_list = $id_list;
        $this->categ = $categ;
        $this->done = $done;
    }

    public static function taskWithId($id, $name, $task, $id_list, $categ, $done){
        $task=new Task($name, $task, $id_list, $categ);
        $task->id=$id;
        $task->done=$done;
        return $task;
    }

    function __toString(){
        if($this->done){
            return "(Effectué) ".$this->getName()." : ".$this->getTask()." /".$this->getCateg();
        }
        else {
            return $this->getName()." : ".$this->getTask()." /".$this->getCateg();
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getTask()
    {
        return $this->task;
    }

    public function getCateg()
    {
        return $this->categ;
    }

    public function getList()
    {
        return $this->id_list;
    }

    public function getDone()
    {
        return $this->done;
    }
}
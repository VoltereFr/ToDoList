<?php

class TaskList {

    private $id_list;

    private $name;

    private $privacy;

    private $user;

    public function __construct() {
        $cpt = func_num_args();
        $args = func_get_args();

        switch($cpt) {
            case '4':
                $this->constructWithId($args[0], $args[1], $args[2], $args[3]);
                break;
            default :
                $this->constructWithoutId($args[0], $args[1], $args[2]);
                break;
        }
    }

    private function constructWithoutId($name,$privacy,$user){
        $this->name = $name;
        $this->privacy = $privacy;
        if($privacy)
            $this->user = $user;
        else
            $this->user = NULL;
    }

    private function constructWithId($id_list, $name,$privacy,$user){
        $this->id_list=$id_list;
        $this->name = $name;
        $this->privacy = $privacy;
        if($privacy)
            $this->user = $user;
        else
            $this->user = NULL;
    }

    public function __toString():String{
        return $this->name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getId()
    {
        return $this->id_list;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function isPrivate() : bool{
        return $this->privacy;
    }
}
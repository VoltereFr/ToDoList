<?php

class User {

    private $id_user;

    private $login;

    private $pwd;

    private $admin;

    public function __construct() {

        $cpt = func_num_args();
        $args = func_get_args();

        switch($cpt) {
            case '4':
                $this->constructWithId($args[0], $args[1], $args[2], $args[3]);
                break;
            default :
                $this->constructWithoutId($args[0], $args[1]);
                break;
        }
    }

    private function constructWithoutId($login, $pwd){
        $this->login=$login;
        $this->pwd=$pwd;
        $this->admin=false;
    }

    private function constructWithId($id_user, $login, $pwd, $admin){
        $this->id_user=$id_user;
        $this->login = $login;
        $this->pwd = $pwd;
        $this->admin = $admin;
    }

    function __toString(){
        return $this->login;
    }

    function getLogin(){
        return $this->login;
    }

    function getPwd(){
        return $this->pwd;
    }

    function getId(){
        return $this->id_user;
    }

    function isAdmin(){
        return $this->admin;
    }
}

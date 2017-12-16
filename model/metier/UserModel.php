<?php

class UserModel {

    private $userGw;

    public function __construct() {
        $this->userGw = new UserGateway();
    }

    public function connect($login, $pwd): bool{
        $user= $this->userGw->findByName($login);
        if(!empty($user)) {
            if($user['pwd']!=$pwd) {
                $error[]="Le mot de passe est incorrect";
                return false;
            }
            else {
                $_SESSION['user']=$user['username'];
                return true;
            }
        }
        else {
            $error[]="Le nom d'utilisateur est incorrect";
            return false;
        }
    }

    public function addUser($login, $pwd) : bool{
        $user= $this->userGw->findByName($login);
        if(empty($user)) {
            $new_user = new User($login, $pwd, false);
            $this->userGw->insert($new_user);
            $_SESSION['user']=$new_user['login'];
            return true;
        }
        else {
            return false;
        }
    }

    public function disconnect() : bool {
        if(session_destroy()){
            return true;
        }
        return false;
    }
}
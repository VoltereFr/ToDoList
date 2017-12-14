<?php

class UserModel {

    private $userGw;

    public function __construct() {
        $this->userGw = new UserGateway();
    }

    public function connect($login, $pwd): bool{
        $user= $this->userGw->findByName($login);
        if(empty($user)) {
            $this->userGw->insert(new User($login, $pwd, false));
        }
        else {
            if($user['pwd']!=$pwd)
            {
                $dVuesErreur[]="Le mot de passe est incorrect";
                return false;
            }
            else
            {
                $_SESSION['user']=$user['username'];
                return true;
            }
        }
    }
}
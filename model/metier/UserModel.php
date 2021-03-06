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
                $_SESSION['login']=$user['login'];
                $_SESSION['id']=$user['id_user'];
                return true;
            }
        }
        else {
            $error[]="Le nom d'utilisateur est incorrect";
            return false;
        }
    }

	public function disconnect() : bool {
        if(session_destroy()) {
            return true;
        }
        return false;
    }

    public function addUser($login, $pwd) : bool{
        $user= $this->userGw->findByName($login);
        if(empty($user)) {
            $new_user = new User($login, $pwd, false);
            $this->userGw->insert($new_user);
            $new_user= $this->userGw->findByName($login);
            $_SESSION['login']=$new_user['login'];
            $_SESSION['id']=$new_user['id_user'];
            return true;
        }
        else {
            return false;
        }
    }
	
	public function findByName(string $login) : User{
		return $this->userGw->findByName($login);		
	}
}

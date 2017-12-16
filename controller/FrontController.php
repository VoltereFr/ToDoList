<?php

class FrontController {

    public function __construct() {

        $action_Visitor = array(
            'goToHome',
            'goToInscription',
            'goToAddList',
            'goToAddTask',
            'addUser',
            'connect',
            'createPublicList',
            'insertTask',
            'deleteList',
            'deleteTask',
            'consultPublicLists');

        $action_User = array(
            'disconnect',
            'createPrivateList',
            'consultPrivateLists',
            'deletePrivateList');

        try {

            $controlVisitor = new ControllerVisitor();

            if (isset($_REQUEST['action'])) {
                $action = Sanitize::sanitize_string($_REQUEST['action']);
            } else{
                $res = $controlVisitor->showPublicList();
                require_once(Config::$views['homepage']);
                return;
            }

            if (in_array($action, $action_User)) {
                if($_SESSION['login'] != NULL) {
                    $controllerUser = new ControllerUser();
                    if (method_exists($controllerUser, $action)) {
                        $controllerUser->$action();
                    } else {
                        throw new Exception("Action inexistante");
                    }
                }
                else {
                    require_once(Config::$views['homepage']);
                }
            }

            if (in_array($action, $action_Visitor)) {
                if(method_exists($controlVisitor,$action)) {
                    $controlVisitor->$action();
                }
                else{
                    throw new Exception("Action inexistante");
                }
            }
        }
        catch (Exception $e){
            $error[]= $e->getMessage() ;
            require_once(Config::$views['error']);
        }
    }
}
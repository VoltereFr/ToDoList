<?php

class FrontController {
    public function __construct() {

        $action_Visitor = array(
            'goToHome',
            'goToInscription',
            'goToAddList',
            'addUser',
            'connect',
            'createPublicList',
            'deleteList',
            'insertTask',
            'deleteTask',
            'consultPublicList'
        );

        $action_User = array(
            'disconnect',
            'showPrivateList',
            'createPrivateList',
            'consultPrivateLists',
            'deletePrivateList'
        );

        try {
            $controlVisitor = new ControllerVisitor();

            if(isset($_REQUEST['action'])) {
                $action = Sanitize::sanitize_string($_REQUEST['action']);
            }
            else {
                $res = $controlVisitor->showPublicList();
                require_once(Config::$views['homepage']);
            }

            if (in_array($action, $action_Visitor)) {
                $controlVisitor->$action();
            }

            if (in_array($action, $action_User)) {
                if(isset($_SESSION['login'])) {
                    $controllerUser = new ControllerUser();
                    $controllerUser->$action();
                }
                else {
                    require_once(Config::$views['inscription']);
                }
            }
        }
        catch (Exception $e){
            $error[]= $e->getMessage() ;
            require_once(Config::$views['error']);
        }
    }
}
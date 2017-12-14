<?php

class FrontController {

    public function __construct() {

        $action_Visitor = array(
            'connect',
            'createPublicList',
            'insertTask',
            'deleteTask',
            'consultPublicLists');

        $action_User = array(
            'disconnect',
            'createPrivateList',
            'consultPrivateLists',
            'deletePrivateList');

        try {
            if (isset($_REQUEST['action'])) {
                $action = Sanitize::sanitize_string($_REQUEST['action']);
            } else{
                require_once(Config::$views['homepage']);
                return;
            }

            if (in_array($action, $action_User)) {
                $controllerUser = new ControllerUser();
                if(method_exists($controllerUser,$action)){
                    $controllerUser->$action();
                }
                else{
                    throw new Exception("Action inexistante");
                }
            }

            if (in_array($action, $action_Visitor)) {

                $controlVisitor = new ControllerVisitor();
                if(method_exists($controlVisitor,$action)) {
                    $controlVisitor->$action();
                }
                else{
                    throw new Exception("Action inexistante");
                }
            }
        }
        catch (Exception $e){
            require_once(Config::$views['error']);
        }
    }
}
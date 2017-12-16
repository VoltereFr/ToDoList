<?php

/**
 * Created by PhpStorm.
 * User: gulivet1
 * Date: 02/12/17
 * Time: 08:49
 */

class Config
{
    public static $dsn = 'mysql:host=hina;dbname=dbgulivet1';
    public static $user = "gulivet1";
    public static $pwd = 'gulivet1';

    public static $views = array(
        'inscription' => 'view/inscription.php',
        'error' => 'view/error.php',
        'homepage' => 'view/homepage.php',
        'addList' => 'view/addList.php',
        'addTask' => 'view/addTask.php'
    );

    /*$views['inscription'] = 'View/inscription.php';
    $views['error'] = 'View/error.php';
    $views['homepage'] = 'View/homepage.php';
    $views['addList'] = 'View/addList.php';
    $views['addTask'] = 'View/addTask.php';
*/
}

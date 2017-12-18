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
        'showList' => 'view/showList.php',
        'privateList' => 'view/showPrivateList.php'
    );
}

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
        'error' => 'view/error.php',
        'homepage' => 'view/homepage.php'
    );

}

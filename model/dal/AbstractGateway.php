<?php
/**
 * Created by PhpStorm.
 * User: NEBOUT Cécile
 * Date: 16/12/2017
 * Time: 11:28
 */
abstract class AbstractGateway{

    protected $connect;

    public function __construct(){
        $this->connect = new Connection(Config::$dsn, Config::$user, Config::$pwd);
    }
}
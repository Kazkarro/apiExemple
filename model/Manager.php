<?php

abstract class Manager
{
    protected $cnx;
    protected $dbh;

    public function __construct(){
        $this->cnx = new PDO('mysql:host='.__DBHOST.';dbname='.__DBNAME.';charset=utf8',__DBUSER,__DBPASS , array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
}
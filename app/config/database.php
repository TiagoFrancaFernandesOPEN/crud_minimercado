<?php
class DB {
 
    public static $instance;
    public static $host     = 'localhost';
    public static $database = 'testesc';
    public static $user     = 'tiago';
    public static $pass     = '123';
 
    private function __construct() {
    }
 
    public static function getInstance() {
        if (!isset(self::$instance)) {
            // self::$instance = new PDO('mysql:host=localhost;dbname=testesc', 'root', '123');
            $_host = self::$host; $_database = self::$database; $_user = self::$user; $_pass = self::$pass;
            self::$instance = new PDO("mysql:host={$_host};dbname={$_database}", $_user, $_pass);
            self::$instance->setAttribute(
              PDO::ATTR_ERRMODE, 
              PDO::ERRMODE_EXCEPTION
            );
            self::$instance->setAttribute(
              PDO::ATTR_ORACLE_NULLS, 
              PDO::NULL_EMPTY_STRING
            );
        } 
        return self::$instance;
    }
 
}
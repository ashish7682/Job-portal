<?php

class Database
{

    private static $instance = null;

    private static $host = 'localhost';
    private static $user = 'root';
    private static $password = '';
    private static $db = 'jobportal';

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new mysqli(self::$host, self::$user, self::$password, self::$db);

            if (self::$instance->connect_error) {
                die("Could not connect to database -" . self::$instance->connect_error);
            }
        }
        return self::$instance;
    }
}

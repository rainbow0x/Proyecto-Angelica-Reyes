<?php

include 'config/config.php';

class DB
{
    public static function DBStart()
    {
        try {
            $pdo = new PDO('mysql:host=' . constant('DB_HOST') . ';dbname=' . constant('DB') . ';charset=utf8', '' . constant('DB_USER') . '', '' . constant('DB_PASS') . '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}

<?php

namespace Model;

class UserModel
{
    private static $db;
    public static function connectPDO()
    {
        self::$db = new \PDO('mysql:host=localhost;dbname=MVC_PiePHP;', 'root', '');
    }

    public static function readAll()
    {
        $req = self::$db->query('SELECT * FROM users');
        return $req->fetchAll(5);
    }
}

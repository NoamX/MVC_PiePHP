<?php

namespace Model;

class UserModel
{
    private static $db;
    public static function connectPDO()
    {
        return self::$db = new \PDO('mysql:host=localhost;dbname=MVC_PiePHP;', 'root', '');
    }

    public static function readAll()
    {

        $req = self::$db->query('SELECT * FROM users');
        $res = $req->fetchAll(5);
        foreach ($res as $value) {
            echo "$value->email<br>";
        }
    }
}

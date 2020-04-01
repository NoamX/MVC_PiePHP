<?php

namespace Model;

class UserModel
{
    private static $db;
    private $email;
    private $password;

    public function __construct($email, $password)
    {
        $this->email = htmlspecialchars($email);
        $this->password = htmlspecialchars($password);
    }

    public static function connectPDO()
    {
        self::$db = new \PDO('mysql:host=localhost;dbname=MVC_PiePHP;', 'root', '');
    }

    public static function readAll()
    {
        $req = self::$db->query('SELECT * FROM users');
        return $req->fetchAll(5);
    }

    public function save()
    {
        $req = 'INSERT INTO users(email, password) VALUES(:email, :password)';
        $exec = [
            'email' => $this->email,
            'password' => $this->password,
        ];
        $req = self::$db->prepare($req);
        $req->execute($exec);
    }
}

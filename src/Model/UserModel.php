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
        $reqCheck = 'SELECT * FROM users WHERE email = :email';
        $check = [
            'email' => $this->email,
        ];
        $insert = 'INSERT INTO users(email, password) VALUES(:email, :password)';
        $exec = [
            'email' => $this->email,
            'password' => password_hash($this->password, PASSWORD_BCRYPT),
        ];

        $r = self::$db->prepare($reqCheck);
        $r->execute($check);
        $res = $r->fetch(5);

        if (!$res || $res->email != $this->email) {
            $req = self::$db->prepare($insert);
            $req->execute($exec);
            echo '<p>Successfully registered !</p>';
        } else {
            echo '<p>Already used, <a href=http://localhost/First_Year/PHP/MVC_PiePHP/register>try another email.</a></p>';
        }
    }

    public function login()
    {
        $login = 'SELECT * FROM users WHERE email = :email';
        $exec = [
            'email' => $this->email,
        ];

        $r = self::$db->prepare($login);
        $r->execute($exec);
        $res = $r->fetch(5);
        
        if (!$res) {
            echo '<p>Wrong email or password ! <a href=http://localhost/First_Year/PHP/MVC_PiePHP/login>Try another email or password.</a></p>';
        } else {
            $checkPass = password_verify($this->password, $res->password);
            if ($checkPass) {
                echo $res->email;
                echo '<p>Successfully loged in !</p>';
            } else {
                echo '<p>Wrong email or password ! <a href=http://localhost/First_Year/PHP/MVC_PiePHP/login>Try another email or password.</a></p>';
            }
        }
    }
}

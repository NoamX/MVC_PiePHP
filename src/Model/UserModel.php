<?php

namespace Model;

use PDO;

class UserModel
{
    private static $db;
    private $email;
    private $password;
    public function __construct()
    {
        self::$db = new PDO('mysql:host=localhost;dbname=MVC_PiePHP;', 'root', '');
        if (isset($_POST['email'], $_POST['password'])) {
            $this->email = $_POST['email'];
            $this->password = $_POST['password'];
        }
    }

    public function save()
    {
        if (isset($_POST['email'], $_POST['password'])) {
            $email = htmlspecialchars($this->email);
            $password = htmlspecialchars($this->password);
            $password = password_hash($password, PASSWORD_BCRYPT);

            $check = self::$db->prepare('SELECT * FROM users WHERE email = :email');
            $check->execute([
                'email' => $email,
            ]);
            $resCheck = $check->fetch(PDO::FETCH_OBJ);

            if (!$resCheck || $resCheck->email != $email) {
                $req = self::$db->prepare('INSERT INTO users(email, password) VALUES(:email, :password)');
                $req->execute([
                    'email' => $email,
                    'password' => $password,
                ]);
                echo '<div class="alert alert-success">Successfully registered !</div>';
            } else {
                echo '<div class="alert alert-danger">Email already used !</div>';
            }
        }
    }

    public function login()
    {
        if (isset($_POST['email'], $_POST['password'])) {
            $email = htmlspecialchars($this->email);
            $password = htmlspecialchars($this->password);

            $check = self::$db->prepare('SELECT * FROM users WHERE email = :email');
            $check->execute([
                'email' => $email,
            ]);
            $resCheck = $check->fetch(PDO::FETCH_OBJ);

            if (!$resCheck) {
                echo '<div class="alert alert-danger">Wrong email or password</div>';
            } else {
                $passCheck = password_verify($password, $resCheck->password);
                if ($passCheck) {
                    echo '<div class="alert alert-success">Successfully loged in !</div>';
                } else {
                    echo '<div class="alert alert-danger">Wrong email or password</div>';
                }
            }
        }
    }

    public function create()
    {
    }

    public function read()
    {
    }

    public function update()
    {
    }

    public function delete()
    {
    }

    public function read_all()
    {
        $req = self::$db->prepare('SELECT * FROM users');
        $req->execute();
        return $res = $req->fetchAll(PDO::FETCH_OBJ);
    }
}

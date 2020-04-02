<?php

namespace Model;

use PDO;

class UserModel
{
    private static $db;
    public function __construct()
    {
        self::$db = new PDO('mysql:host=localhost;dbname=MVC_PiePHP;', 'root', '');
    }

    // Créé une nouvelle entrée en base avec les champs passés en paramètres et retourne son id
    public function create($email, $password)
    {
        $email = htmlspecialchars($email);
        $password = htmlspecialchars($password);
        $password = password_hash($password, PASSWORD_BCRYPT);
        $req = self::$db->prepare('INSERT INTO users(email, password) VALUES(:email, :password)');
        $req->execute([
            'email' => $email,
            'password' => $password,
        ]);
    }

    // Récupère une entrée en base suivant l’id de l’user
    public function read($id)
    {
        if (is_int($id)) {
            $req = self::$db->prepare('SELECT * FROM users WHERE id = :id');
            $req->execute([
                'id' => $id,
            ]);
            $res = $req->fetch(PDO::FETCH_OBJ);
            if ($res) {
                echo "<p>ID : $res->id | Email : $res->email</p>";
            }
        }
    }

    // Met à jour les champs d’une entrée en base suivant l’id de l’user
    public function update($field, $value, $id)
    {
        if (is_int($id)) {
            $check = self::$db->prepare('SELECT * FROM users WHERE id = :id');
            $check->execute([
                'id' => $id,
            ]);
            $res = $check->fetch(PDO::FETCH_OBJ);
            if ($res) {
                $field = htmlspecialchars($field);
                $value = htmlspecialchars($value);
                $req = self::$db->prepare("UPDATE users SET $field = '" . $value . "' WHERE id = $id");
                $req->execute();
            }
        }
    }

    // Supprime une entrée en base suivant l’id de l’user
    public function delete($id)
    {
        $check = self::$db->prepare('SELECT id FROM users WHERE id = :id');
        $check->execute([
            'id' => $id,
        ]);
        $res = $check->fetch(PDO::FETCH_OBJ);
        if ($res) {
            $req = self::$db->prepare('DELETE FROM users WHERE id = :id');
            $req->execute([
                'id' => $id,
            ]);
            echo '<p>User successfully deleted !</p>';
        } else {
            echo '<p>You can\'t delete an user that doesn\'t exist !</p>';
        }
    }

    // Récupère toutes les entrées de la table user
    public function read_all()
    {
        $req = self::$db->prepare('SELECT * FROM users');
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_OBJ);
        if ($res) {
            foreach ($res as $users) {
                echo "<p>ID : $users->id | Email : $users->email</p>";
            }
        }
    }




    // private static $db;
    // private $email;
    // private $password;

    // public function __construct($email, $password)
    // {
    //     $this->email = htmlspecialchars($email);
    //     $this->password = htmlspecialchars($password);
    // }

    // public static function connectPDO()
    // {
    //     self::$db = new \PDO('mysql:host=localhost;dbname=MVC_PiePHP;', 'root', '');
    // }

    // public static function readAll()
    // {
    //     $req = self::$db->query('SELECT * FROM users');
    //     return $req->fetchAll(5);
    // }

    // public function save()
    // {
    //     $reqCheck = 'SELECT * FROM users WHERE email = :email';
    //     $check = [
    //         'email' => $this->email,
    //     ];
    //     $insert = 'INSERT INTO users(email, password) VALUES(:email, :password)';
    //     $exec = [
    //         'email' => $this->email,
    //         'password' => password_hash($this->password, PASSWORD_BCRYPT),
    //     ];

    //     $r = self::$db->prepare($reqCheck);
    //     $r->execute($check);
    //     $res = $r->fetch(5);

    //     if (!$res || $res->email != $this->email) {
    //         $req = self::$db->prepare($insert);
    //         $req->execute($exec);
    //         echo '<p>Successfully registered !</p>';
    //     } else {
    //         echo '<p>Already used, <a href=http://localhost/First_Year/PHP/MVC_PiePHP/register>try another email.</a></p>';
    //     }
    // }

    // public function login()
    // {
    //     $login = 'SELECT * FROM users WHERE email = :email';
    //     $exec = [
    //         'email' => $this->email,
    //     ];

    //     $r = self::$db->prepare($login);
    //     $r->execute($exec);
    //     $res = $r->fetch(5);

    //     if (!$res) {
    //         echo '<p>Wrong email or password ! <a href=http://localhost/First_Year/PHP/MVC_PiePHP/login>Try another email or password.</a></p>';
    //     } else {
    //         $checkPass = password_verify($this->password, $res->password);
    //         if ($checkPass) {
    //             echo $res->email;
    //             echo '<p>Successfully loged in !</p>';
    //         } else {
    //             echo '<p>Wrong email or password ! <a href=http://localhost/First_Year/PHP/MVC_PiePHP/login>Try another email or password.</a></p>';
    //         }
    //     }
    // }
}

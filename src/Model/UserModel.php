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
            echo '<div class="alert alert-success" align="center">Successfully registered !</div>';
            $getId = self::$db->prepare('SELECT id FROM users WHERE email = :email');
            $getId->execute([
                'email' => $email,
            ]);
            $id = $getId->fetch(PDO::FETCH_OBJ);
            return $id->id;
        } else {
            echo '<div class="alert alert-danger" align="center">Email already used !</div>';
        }
    }

    // Récupère une entrée en base suivant l’id de l’user
    public function read($id)
    {
        $req = self::$db->prepare('SELECT * FROM users WHERE id = :id');
        $req->execute([
            'id' => $id,
        ]);
        $res = $req->fetch(PDO::FETCH_OBJ);
        if ($res) {
            return $res;
        } else {
            echo '<div class="alert alert-danger" align="center">No user associated with this id.</div>';
        }
    }

    // Met à jour les champs d’une entrée en base suivant l’id de l’user
    public function update($field, $value, $id)
    {
        if (is_int($id) && preg_match('%(email|password)%', $value)) {
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
            } else {
                echo '<div class="alert alert-danger" align="center">You can\'t update an user that doesn\'t exist !</div>';
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
        } else {
            echo '<div class="alert alert-danger" align="center">You can\'t delete an user that doesn\'t exist !</div>';
        }
    }

    // Récupère toutes les entrées de la table user
    public function read_all()
    {
        $req = self::$db->prepare('SELECT * FROM users');
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_OBJ);
        if ($res) {
            return $res;
        }
    }

    public function login($email, $password)
    {
        $req = self::$db->prepare('SELECT * FROM users WHERE email = :email');
        $req->execute([
            'email' => $email,
        ]);
        $res = $req->fetch(5);

        if (!$res) {
            echo '<div class="alert alert-danger" align="center">Wrong email or password !</div>';
        } else {
            $checkPass = password_verify($password, $res->password);
            if ($checkPass) {
                echo '<div class="alert alert-success" align="center">Successfully loged in !</div>';
            } else {
                echo '<div class="alert alert-danger" align="center">Wrong email or password !</div>';
            }
        }
    }
}

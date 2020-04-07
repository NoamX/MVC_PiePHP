<?php

namespace Core;

use PDO;

class ORM
{
    private static $db;

    public function __construct()
    {
        return self::$db = new PDO('mysql:host=localhost;dbname=MVC_PiePHP', 'root', '');
    }

    public function create($table, $field) // retourne un id
    {
        $f = [];
        $c = [];

        $content = null;

        foreach ($field as $key => $value) {
            array_push($f, $key);
            array_push($c, $value);
        }

        $fields = implode(", ", $f);
        $contents = implode("', '", $c);

        $content .= "'" . $contents . "'";

        $req = self::$db->prepare("INSERT INTO $table($fields) VALUES($content)");
        $req->execute();

        return self::$db->lastInsertId();
    }

    public function read($table, $id) // retourne un tableau associatif de l'enregistrement
    {
        $req = self::$db->prepare("SELECT * FROM $table WHERE id = $id");
        $req->execute();
        $res = $req->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    public function update($table, $id, $field) // retourne un booleen
    {
    }

    public function delete($table, $id) // retourne un booleen
    {
        $check = self::$db->prepare("SELECT id FROM $table WHERE id = $id");
        $check->execute();
        $res = $check->fetch(PDO::FETCH_OBJ);
        if ($res) {
            $req = self::$db->prepare("DELETE FROM $table WHERE id = $id");
            $req->execute();
            return true;
        } else {
            return false;
        }
    }

    public function find($table, $params = []) // retourne un tableau d'enregistrement
    {
    }
}
/*
Usage :
$orm = new ORM();
$orm->create('articles', [
    'title' => 'title',
    'content' => 'content',
    'author' => 'someone',
]);
$orm->update('articles', 1, [
    'title' => 'another title',
    'content' => 'another content',
    'author' => 'someone',
]);
$orm->delete(1);
*/

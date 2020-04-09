<?php

namespace Core;

use PDO;

class ORM
{
    private static $db;

    public function __construct()
    {
        self::$db = new PDO('mysql:host=localhost;dbname=MVC_PiePHP', 'root', '');
    }

    public function create($table, $field) // retourne un id
    {
        foreach ($field as $key => $value) {
            $f[] = $key;
            $c[] = $value;
        }

        $fields = implode(", ", $f);
        $contents = implode("', '", $c);

        $content = "'" . $contents . "'";

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
        $req = self::$db->prepare("SELECT id FROM $table WHERE id = $id");
        $req->execute();
        $res = $req->fetch(PDO::FETCH_OBJ);

        if ($res) {
            foreach ($field as $key => $value) {
                $u[] = $key . ' = ' . "'" . $value . "'";
            }
            $update =  implode(', ', $u);
            $req = self::$db->prepare("UPDATE $table SET $update WHERE id = $id");
            $req->execute();
            return true;
        } else {
            return false;
        }
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

    public function find($table, $params = [
        'WHERE' => '1',
        'ORDER BY' => 'id ASC',
        'LIMIT' => '',
    ]) // retourne un tableau d'enregistrement
    {
        if (!$params) {
            $r = "SELECT * FROM $table";
        } else {
            foreach ($params as $key => $value) {

                // if (!$params['LIMIT']) {
                //     $r = substr("SELECT * FROM $table " . implode(' ', $c), 0, -7);
                // } else {
                //     $r = "SELECT * FROM $table " . implode(' ', $c);
                // }
            }
            echo $r . '<br>';
        }
        $req = self::$db->prepare($r);
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_OBJ);
        print_r($params);
        return print_r($res);
    }
}

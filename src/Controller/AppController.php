<?php

namespace Controller;

use Core\Controller;
use Core\ORM;

class AppController extends Controller
{
    public function indexAction()
    {
        $this->render('index');
        // TEST ORM
        // $orm = new ORM();
        // $orm->create('users', [
        //     'email' => 'test@gmail.com',
        //     'password' => '1234',
        // ]);
        // $orm->update('users', 3, [
        //     'email' => 'new_email@gmail.com',
        //     'password' => '1234azerty',
        // ]);
        // $orm->read('users', 1);
        // $orm->delete('users', 1);
    }
}

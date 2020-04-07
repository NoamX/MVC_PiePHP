<?php

namespace Controller;

use Core\Controller;
use Core\ORM;

class AppController extends Controller
{
    public function indexAction()
    {
        // TEST ORM
        $this->render('index');
        $orm = new ORM();
        echo $orm->create('users', [
            'email' => 'email@gmail.com',
            'password' => '1234',
        ]);
        
    }
}

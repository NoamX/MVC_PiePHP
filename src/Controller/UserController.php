<?php

namespace Controller;

use Core\Controller;
use Model\UserModel;

class UserController extends Controller
{


    public function indexAction()
    {
        echo '<p>user/index</p>';
        $users = new UserModel();
        // $users->create('qwerty@gmail.com', 'qwerty');
        // $users->read(4);
        // $users->update('email', 'qwerty1@gmail.com', 1);
        // $users->delete(6);
        // $users->read_all();
    }


    public function addAction()
    {
        $this->render('register');
    }

    public function loginAction()
    {
        $this->render('login');
    }
}

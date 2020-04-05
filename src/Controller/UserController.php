<?php

namespace Controller;

use Core\Controller;
use Model\UserModel;

class UserController extends Controller
{
    public function indexAction()
    {

    }

    public function addAction()
    {
        $this->render('register');
        $user = new UserModel($_POST);
        $user->save();
        $this->render('register');
    }

    public function loginAction()
    {
        $this->render('login');
        $user = new UserModel($_POST);
        $user->login();
    }

    public function readallAction()
    {
        $users = new UserModel();
        $users = $users->read_all();
        $this->render('allUsers', ['users' => $users]);
    }
}

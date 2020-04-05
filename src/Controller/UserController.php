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
    }

    public function registerAction()
    {
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
}

<?php

namespace Controller;

use Core\Controller;
use Core\Request;
use Model\UserModel;

class UserController extends Controller
{
    public function __construct()
    {
        $request = new Request();
    }

    public function indexAction()
    {
        $this->render('index');
    }

    public function addAction()
    {
        $this->render('register');
        $user = new UserModel($_POST);
        $user->save();
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

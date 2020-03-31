<?php

namespace Controller;

use Core\Controller;
use Model\UserModel;

class UserController extends Controller
{
    public function __construct()
    {
        UserModel::connectPDO();
    }

    public function indexAction()
    {
        echo 'user/index<br>';
        $user = UserModel::readAll();
        // $test = new Controller;
        // $test->render($user);
    }

    public function addAction()
    {
        echo 'user/add<br>';
    }
}

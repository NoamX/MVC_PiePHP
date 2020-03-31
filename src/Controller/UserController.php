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
        echo '<p>user/index</p>';
        $user = UserModel::readAll();
        $test = new Controller;
        $test->render($user);
    }

    public function addAction()
    {
        echo '<p>user/add</p>';
    }
}

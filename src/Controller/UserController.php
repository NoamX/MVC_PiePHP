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
        foreach ($user as $email) {
            echo "<p>$email->email</p>";
        }
    }

    public function addAction()
    {
        $this->render('register');
    }

    public function registerAction()
    {
        echo '<p>user/register</p>';
        $model = new UserModel($_POST['email'], $_POST['password']);
        $model->save();
    }
}

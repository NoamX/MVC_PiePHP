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
        $test = new Controller();
        foreach ($user as $email) {
            echo "<p>$email->email</p>";
            echo $test->render($email->email);
        }
    }

    public function addAction()
    {
        echo '<p>user/add</p>';
    }
}

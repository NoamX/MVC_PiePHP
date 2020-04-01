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
<<<<<<< HEAD
        foreach ($user as $email) {
            echo "<p>$email->email</p>";
=======
        $test = new Controller();
        foreach ($user as $email) {
            echo "<p>$email->email</p>";
            echo $test->render($email->email);
>>>>>>> 086c5391f80deacad037b09aff6743bcb2bd54d6
        }
    }

    public function addAction()
    {
        echo '<p>user/add</p>';
        $this->render('login');
    }
}

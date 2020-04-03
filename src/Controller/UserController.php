<?php

namespace Controller;

use Core\Controller;
use Model\UserModel;

class UserController extends Controller
{
    public function indexAction()
    {
        // echo '<p>user/index</p>';
        // $users = new UserModel();
        // $users->create('qwerty@gmail.com', 'qwerty'); FORM
        // $users->read(3); URL
        // $users->update('email', 'qwerty1@gmail.com', 1); FORM FROM URL
        // $users->delete(6); URL
    }

    public function addAction()
    {
        $this->render('register');
        $user = new UserModel();
        if (isset($_POST['email'], $_POST['password'])) {
            $user->create($_POST['email'], $_POST['password']);
        }
    }

    public function loginAction()
    {
        $this->render('login');
        $user = new UserModel();
        if (isset($_POST['email'], $_POST['password'])) {
            $user->login($_POST['email'], $_POST['password']);
        }
    }

    public function allAction()
    {
        $users = new UserModel();
        $list = $users->read_all();
        $this->render('readAll', ['users' => $list]);
    }

    public function readAction()
    {
        $url = explode('/', $_SERVER['REDIRECT_URL']);
        $id = end($url);
        $user = new UserModel();
        $read =  $user->read($id);
        $this->render('readOne', ['user' => $read]);
    }

    public function deleteAction()
    {
        $url = explode('/', $_SERVER['REDIRECT_URL']);
        $id = end($url);
        $user = new UserModel();
        $user->delete($id);
        $this->render('delete');
    }

    public function updateAction()
    {
        
    }
}

<?php

namespace Controller;

use Model\UserModel;

class UserController
{
    public function indexAction()
    {
        echo 'user/index<br>';
        UserModel::readAll();
    }

    public function addAction()
    {
        echo 'user/add<br>';
    }
}
UserModel::connectPDO();
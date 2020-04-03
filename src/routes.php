<?php

use Core\Router;

Router::connect('/', ['controller' => 'app', 'action' => 'index']);
Router::connect('/register', ['controller' => 'user', 'action' => 'add']);
Router::connect('/login', ['controller' => 'user', 'action' => 'login']);
// Router::connect('read/{id}' . '', ['controller' => 'user', 'action' => 'read']);

<?php

define('BASE_URI', str_replace('\\', "/", substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT']))));
require_once(implode(DIRECTORY_SEPARATOR, ['Core', 'autoload.php']));

$app = new \Core\Core();
$app->run();
$app2 = new \Controller\UserController();
$app2->run();
$app3 = new \Model\UserModel();
$app3->run();

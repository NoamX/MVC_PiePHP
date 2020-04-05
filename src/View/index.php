<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/First_Year/PHP/MVC_PiePHP/webroot/css/bootstrap.css">
    <script src="http://localhost/First_Year/PHP/MVC_PiePHP/webroot/js/jquery-3.4.1.js"></script>
    <script src="http://localhost/First_Year/PHP/MVC_PiePHP/webroot/js/bootstrap.js"></script>
    <title>MVC_PiePHP</title>
</head>

<body>
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link" href="http://localhost/First_Year/PHP/MVC_PiePHP/">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="http://localhost/First_Year/PHP/MVC_PiePHP/list">See all users</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="http://localhost/First_Year/PHP/MVC_PiePHP/register">Register</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="http://localhost/First_Year/PHP/MVC_PiePHP/login">Login</a>
        </li>
    </ul>
    <?= $view ?>
</body>

</html>
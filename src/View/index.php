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
    <div class="container-fluid"">
        <div class="row">
            <div class="col-12">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <p><a href="http://localhost/First_Year/PHP/MVC_PiePHP/" class="nav-link">Main Page</a></p>
                    </li>
                    <li class="nav-item">
                        <p><a href="http://localhost/First_Year/PHP/MVC_PiePHP/register" class="nav-link">Register</a></p>
                    </li>
                    <li class="nav-item">
                        <p><a href="http://localhost/First_Year/PHP/MVC_PiePHP/login" class="nav-link">Login</a></p>
                    </li>
                    <li class="nav-item">
                        <p><a href="http://localhost/First_Year/PHP/MVC_PiePHP/user/all" class="nav-link">See all users</a></p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?= $view ?>
</body>

</html>
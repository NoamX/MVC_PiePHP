<ul class="list-group">
    <?php
    if ($user) {
        echo "<li class='list-group-item'>ID : $user->id<br>Email : $user->email<br><a href='http://localhost/First_Year/PHP/MVC_PiePHP/user/delete/" . $user->id . "'><button class='btn btn-primary'>Delete</button></a></li>";
    }
    ?>
</ul>
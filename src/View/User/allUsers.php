<ul class="list-group">
    <?php
    if ($users) {
        foreach ($users as $user) {
            echo "<li class='list-group-item'>ID : $user->id<br>Email : $user->email</li>";
        }
    }
    ?>
</ul>
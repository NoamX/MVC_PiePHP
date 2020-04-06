<?php

namespace Core;

class Request
{
    public function __construct()
    {
        foreach ($_POST as $value) {
            $value = trim(stripslashes(htmlspecialchars($value)));
        }

        foreach ($_GET as $value) {
            $value = trim(stripslashes(htmlspecialchars($value)));
        }
    }
}

<?php

namespace Core;

class Request
{
    private $request;
    public function __construct()
    {
        foreach ($_POST as $value) {
            $this->request = trim(stripslashes(htmlspecialchars($value)));
        }

        foreach ($_GET as $value) {
            $this->request = trim(stripslashes(htmlspecialchars($value)));
        }
        return $this->request;
    }
}

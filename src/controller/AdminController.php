<?php

namespace Project\controller;

require_once realpath("vendor/autoload.php");

class AdminController
{
    public function administration()
    {
        require('views/back/administration.php');
    }
}
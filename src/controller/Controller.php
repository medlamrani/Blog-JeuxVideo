<?php 
namespace Project\controller;

require_once realpath("vendor/autoload.php");

class Controller
{
    public function home()
    {
        require('views/front/home.php');
    }
}
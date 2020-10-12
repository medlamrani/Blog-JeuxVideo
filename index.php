<?php 

session_start();


require_once realpath("vendor/autoload.php");

use Project\Router;

new Router();

unset($_SESSION['message']);

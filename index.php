<?php 

require_once realpath("vendor/autoload.php");

use Project\controller;
$controller = new \Controller();

//use  Project\lib\model;
//$game = new model\GameManager(); 

try
{
    if (isset($_GET['action']))
    {
        if($_GET['action'] == 'home')
        {
            $controller->home();
        }
    }
    else
    {
        $controller->home();
    }

}
catch(Exception $e)
{
    echo 'Erreur : ' . $e->getMessage();
}


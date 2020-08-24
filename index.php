<?php 

require_once realpath("vendor/autoload.php");

use Project\controller\Controller;
$controller = new Controller();


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


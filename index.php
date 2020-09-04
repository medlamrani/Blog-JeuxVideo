<?php 

require_once realpath("vendor/autoload.php");

use Project\controller;
$controller = new controller\Controller();
$adminController = new controller\AdminController();



try
{
    if (isset($_GET['action']))
    {
        if($_GET['action'] == 'home')
        {
            $controller->home();
        }
        elseif($_GET['action'] == 'games')
        {
            $controller->listOfGames();
        }
        elseif($_GET['action'] == 'actualites')
        {
            $controller->listOfNews();
        }

        elseif($_GET['action'] == 'addAdmin')
        {
            $adminController->addAdmin();
        }

        elseif($_GET['action'] == 'administration')
        {
            $adminController->administration();
        }
        elseif($_GET['action'] == 'addGame')
        {
            $adminController->addGame();
        }
        elseif($_GET['action'] == 'addNews')
        {
            $adminController->addNews();

        elseif($_GET['action'] == 'addPlatform')
        {
            $adminController->addPlatform();

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


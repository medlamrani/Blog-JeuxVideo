<?php 

session_start();

var_dump($_SESSION);

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
        elseif($_GET['action'] == 'inscription')
        {
            $controller->inscription();
        }
        elseif($_GET['action'] == 'login')
        {
            $controller->connect();
        }
        elseif($_GET['action'] == 'logout')
        {
            $controller->logOut();
        }
        elseif($_GET['action'] == 'games')
        {
            $controller->listOfGames();
        }
        elseif($_GET['action'] == 'game')
        {
            if(isset($_GET['id']) && $_GET['id'] > 0)
            {
                $controller->game();
            }
            else 
            {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif($_GET['action'] == 'actualites')
        {
            $controller->listOfNews();
        }
        elseif($_GET['action'] == 'actu')
        {
            if(isset($_GET['id']) && $_GET['id'] > 0)
            {
                $controller->news();
            }
            else 
            {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
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
        } 
        elseif($_GET['action'] == 'addComment')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0) 
            {
                if (!empty($_POST['content'])) 
                {
                    $controller->addComment($_GET['id']);
                }
                else                 
                {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else 
            {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }  
        elseif($_GET['action'] == 'commentGame')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0) 
            {
                if (!empty($_POST['content'])) 
                {
                    $controller->commentGame($_GET['id']);
                }
                else                 
                {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else 
            {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }  
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


unset($_SESSION['message']);

<?php

namespace Project\controller;

use  Project\lib\model;
use  Project\lib\entity;

class AdminController
{

    public function sessionExists()
    {
        if (empty($_SESSION['id']))
        {
            header('Location: http://localhost/projet5/admin/adminConnect');
            exit(); 
        }
    }

    public function administration()
    {
        $this->sessionExists();

        $gameManager = new model\GameManager();
        $listOfGames = $gameManager->listOfGames();

        $newsManager = new model\NewsManager();
        $listOfNews = $newsManager->listOfNews();

        $commentGame = new model\CommentGameManager();
        $reportedCommentGame = $commentGame->reportedCommentGame();

        $commentNews = new model\CommentNewsManager();
        $reportedCommentNews = $commentNews->reportedCommentNews();



        require('src/views/back/administration.php');
    }

    public function adminConnect()
    {
        if(isset($_POST['username']))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $user = new model\UserManager();

            $result = $user->adminConnect($username, $password);

            if($result == true)
            {
                $newsManager = new model\NewsManager();
                $gameManager = new model\GameManager();

                $_SESSION['message'] = 'Vous etes connecte';
                $this->administration(); 
            }    
            else
            {
                $_SESSION['message'] = 'Mot de passe incorrect';
                require('src/views/back/adminConnect.php');   
            }    
        }
        else
        {              
            require('src/views/back/adminConnect.php');         
        }
    }

    public function addAdmin()
    {

        $userManager = new model\UserManager();

        if(isset($_POST['username']))
        {
            $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $user = new entity\User(
                [
                    'id' => 0,
                    'roleId' => 1,
                    'username' => $_POST['username'],
                    'name' => $_POST['name'],
                    'lastname' => $_POST['lastname'],
                    'email' => $_POST['email'],
                    'password' => $pass_hache
                ]
            );

            $userManager->addAdmin($user);
            require('src/views/back/adminConnect.php');                       
        }
        else
        {
            require('src/views/back/addAdmin.php');
        }
    }

    public function addNews()
    {
        $this->sessionExists();

        $newsManager = new model\NewsManager();

        if(isset($_POST['title']))
        {
            $news = new entity\News(
                [
                    'userId' => 1,
                    'title' => $_POST['title'],
                    'content' => $_POST['content']
                ]
            );

            $newsManager->addNews($news);
            $this->administration();
        }
        else
        {
            require('src/views/back/addNews.php');
        } 
    }

    public function updateNews()
    {
        $this->sessionExists();

        $newsManager = new model\NewsManager();

        if(isset($_POST['title']))
        {
            $news = new entity\News(
                [
                    'title' => $_POST['title'],
                    'content' => $_POST['content'],
                    'id' =>$_GET['id']
                ]
            );

            $newsManager->updateNews($news);
            $this->administration();
        }
        else
        {
            require('src/views/back/updateNews.php');
        }  
    }

    public function deleteNews()
    {
        $this->sessionExists();

        $newsManager = new model\NewsManager();
        $newsManager->deleteNews($_GET['id']);

        $_SESSION['message'] = 'L\'actu a ete supprimee';
        $this->administration();
    }

    public function addGame()
    {
        $this->sessionExists();

        $gameManager = new model\GameManager();
        
        if(isset($_POST['name']))
        {
            $game = new entity\Game(
                [
                    'name' => $_POST['name'],
                    'resume' => $_POST['resume'],                  
                    'platform' => new entity\Platform(['id' => $_POST['platform']]),
                    'editor' => new entity\Editor(['id' => $_POST['editor']]),
                    'releaseDate' => $_POST['releaseDate']
                ]
            );

            $gameManager->addGame($game);
            $this->administration();
        }
        else
        {
            $listPlatform = $gameManager->listPlatform(); 
            $listEditor = $gameManager->listEditor();

            require('src/views/back/addGame.php');
        }       
    }

    public function deleteGame()
    {
        $this->sessionExists();

        $gameManager = new model\GameManager();
        $gameManager->deleteGame($_GET['id']);

        $this->administration();
    }

    public function approveCommentGame()
    {
        $this->sessionExists();

        $commentGame = new model\CommentGameManager();
        $commentGame->noReport($_GET['id']);

        $this->administration();
    }

    public function approveCommentNews()
    {
        $this->sessionExists();

        $commentNews = new model\CommentNewsManager();
        $commentNews->noReport($_GET['id']);
        
        $this->administration();
    }

    public function deleteCommentGame()
    {
        $this->sessionExists();

        $commentGame = new model\CommentGameManager();
        $commentGame->delete($_GET['id']);

        $this->administration();
    }

    public function deleteCommentNews()
    {
        $this->sessionExists();

        $commentNews = new model\CommentNewsManager();
        $commentNews->delete($_GET['id']);
        
        $this->administration();
    }

    

    public function logOut()
    {
        session_destroy();
        header('Location: http://localhost/projet5/admin/administration');
    }
    
}
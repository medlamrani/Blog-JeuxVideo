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

                $this->administration(); 
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
                    'userId' => $_SESSION['id'],
                    'title' => $_POST['title'],
                    'content' => $_POST['content'],
                    'id' =>$id
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

    public function deleteNews($id)
    {
        $this->sessionExists();

        $newsManager = new model\NewsManager();
        $newsManager->deleteNews($id);

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
        $gameManager->deleteGame($id);

        $this->administration();
    }
}
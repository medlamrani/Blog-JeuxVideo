<?php 

namespace Project\controller;

use  Project\lib\model;
use  Project\lib\entity;

class Controller
{
    public function home()
    {
        $gameManager = new model\GameManager();
        require('src/views/front/home.php');
    }

    public function isUserConnected()
    {
        if (empty($_SESSION['id']))
        {
            header('Location: index.php?action=login');
            exit(); 
        }
    }

    public function connect()
    {
        if(isset($_POST['username']))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $user = new model\UserManager();

            $result = $user->userConnect($username, $password);

            if($result == true)
            {
                $newsManager = new model\NewsManager();
                $gameManager = new model\GameManager();

                require('src/views/front/home.php'); 
            }        
        }
        else
        {              
            require('src/views/front/userConnect.php');         
        }
    }

    public function inscription()
    {
        $userManager = new model\UserManager();

        if(isset($_POST['username']))
        {
            $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $user = new entity\User(
                [
                    'id' => 0,
                    'roleId' => 2,
                    'username' => $_POST['username'],
                    'name' => $_POST['name'],
                    'lastname' => $_POST['lastname'],
                    'email' => $_POST['email'],
                    'password' => $pass_hache
                ]
            );

            $userManager->userInscription($user);
            $this->home();                    
        }
        else
        {
            require('src/views/front/inscription.php');
        }
    }

    public function logOut()
    {
        session_destroy();
        header('Location: index.php');
    }

    public function listOfGames()
    {
        $gameManager = new model\GameManager();
        $listOfGames = $gameManager->listOfGames();

        require('src/views/front/games.php');
    }

    public function game()
    {
        $gameManager = new model\GameManager();
        $commentGame = new model\CommentGameManager();

        $game = $gameManager->game($_GET['id']);
        $listOfComments = $commentGame->listOfComment($_GET['id']);

        require('src/views/front/game.php');
    }

    public function listOfNews()
    {
        $newsManager = new model\NewsManager();
        $listOfNews = $newsManager->listOfNews(0 , 5);

        require('src/views/front/listNews.php');
    }

    public function news()
    {
        $newsManager = new model\NewsManager();
        $commentNews = new model\CommentNewsManager();

        $news = $newsManager->news($_GET['id']);
        $listOfComments = $commentNews->listOfComment($_GET['id']);

        require('src/views/front/news.php');
    }

   
    public function addComment($newsId)
    {
        $commentManager = new model\CommentNewsManager();

        if(!empty($_SESSION['id']))
        {           
            $commentNews = new entity\CommentNews(
                [
                    'newsId' => $_GET['id'],
                    'user' => new entity\User(
                        [
                            'id' => $_SESSION['id'], 
                            'username' => $_SESSION['username']
                        ]),
                    'content' => $_POST['content']
                ]
            );
            $commentManager->save($commentNews);

            
            $_SESSION['message'] = 'Commentaire ajoute';
            header("location:".  $_SERVER['HTTP_REFERER']); 
        }
        else
        {
            
            $_SESSION['message'] = 'Vous devez etre connecter pour laisser un commentaire';
            header("location:".  $_SERVER['HTTP_REFERER']); 
        }       
    }

    public function commentGame($gameId)
    {
        $commentManager = new model\CommentGameManager();

        if(!empty($_SESSION['id']))
        {           
            $commentGame = new entity\CommentGame(
                [
                    'gameId' => $_GET['id'],
                    'user' => new entity\User(
                        [
                            'id' => $_SESSION['id'], 
                            'username' => $_SESSION['username']
                        ]),
                    'content' => $_POST['content']
                ]
            );
            $commentManager->save($commentGame);  
        }
        else
        {          
            $_SESSION['message'] = 'Vous devez etre connecter pour laisser un commentaire';
            header("location:".  $_SERVER['HTTP_REFERER']); 
        }       
    }

    public function reportCommentGame($id)
    {
        $commentManager = new model\CommentGameManager();

        $reportComment = $commentManager->report($id);

        header("location:".  $_SERVER['HTTP_REFERER']); 
        
    }

}
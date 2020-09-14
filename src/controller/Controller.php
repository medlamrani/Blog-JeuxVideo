<?php 

namespace Project\controller;

use  Project\lib\model;
use  Project\lib\entity;

class Controller
{
    public function home()
    {
        require('src/views/front/home.php');
    }

    public function connect()
    {

    }

    public function inscription()
    {

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
        $commentGame = new model\CommentGame();

        $game = $gameManager->game($_GET['id']);
        $comment = $commentGame->listOfComment($_GET['id']);

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
        $commentNews = new model\CommentNews();

        $news = $newsManager->news($_GET['id']);
        $comment = $commentNews->listOfComment($_GET['id']);

        require('src/views/front/news.php');
    }
}
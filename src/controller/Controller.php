<?php 

namespace Project\controller;

class Controller
{
    public function home()
    {
        require('src/views/front/home.php');
    }

    public function listOfGames()
    {
        $gameManager = new GameManager();
        require('src/views/front/games.php');
    }

    public function game()
    {
        $gameManager = new GameManager();
        $commentGame = new CommentGame();

        $game = $gameManager->game($_GET['id']);
        $comment = $commentGame->listOfComment($_GET['id']);

        require('src/views/front/game.php');
    }

    public function listOfNews()
    {
        $newsManager = new NewsManager();
        require('src/views/front/listNews.php');
    }

    public function news()
    {
        $newsManager = new NewsManager();
        $commentNews = new CommentNews();

        $news = $newsManager->news($_GET['id']);
        $comment = $commentNews->listOfComment($_GET['id']);

        require('src/views/front/news.php');
    }
}
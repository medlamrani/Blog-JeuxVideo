<?php

namespace Project\controller;

use  Project\lib\model;

class AdminController
{

    public function sessionExists()
    {
        if (empty($_SESSION['id']))
        {
            header('Location: index.php?action=login');
            exit(); 
        }
    }

    public function administration()
    {
        require('views/back/administration.php');
    }

    public function addNews()
    {
        $this->sessionExists();

        $newsManager = new NewsManager();

        if(isset($_POST['title']))
        {
            $news = new News(
                [
                    'userId' => $_SESSION['id'],
                    'title' => $_POST['title'],
                    'content' => $_POST['content']
                ]
            );

            $newsManager->addNews($news);
            $this->administration();
        }
        else
        {
            require('views/back/addNews.php');
        }       
    }

    public function updateNews()
    {
        $this->sessionExists();

        $newsManager = new NewsManager();

        if(isset($_POST['title']))
        {
            $news = new News(
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
            require('views/back/updateNews.php');
        }  
    }

    public function deleteNews($id)
    {
        $this->sessionExists();

        $newsManager = new NewsManager();
        $newsManager->deleteNews($id);

        $this->administration();
    }
}
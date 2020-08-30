<?php

namespace Project\lib\model;

use  Project\lib\model;

class CommentNews extends DBConnect
{
    public function commentNews(CommentNews $commentNews)
    {
        // commenter un jeu
        $sql = "INSERT INTO comment_news
        SET news_id = :news_id, user_id = :user_id, content = :content, report = 0, commentDate = NOW()";

        $req = $this->connect()->prepare($sql);

        $req->bindValue(':news_id', $commentGame->newsId(), \PDO::PARAM_INT);
        $req->bindValue(':user_id', $commentGame->userId());
        $req->bindValue(':content', $commentGame->content());

        $req->execute();

        $_SESSIOn['message'] = 'Commentaire Ajoute !';
        
    }

    public function delete()
    {
        $sql = "DELETE FROM comment_news WHERE id = ".(int) $id;
        $req = $this->connect()->exec($sql);

        $_SESSION['message'] = 'Commentaire supprime avec succes !'; 
    }

    public function listOfComment($newsId)
    {
        $sql = 'SELECT id, news_id, user_id, content, report, commentDate FROM commentGame WHERE game_id = :game_id';
  
        $req = $this->connect()->prepare($sql);
        $req->bindValue(':news_id', $newsId, \PDO::PARAM_INT);
        $req->execute();
    
        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');
    
        $comments = $req->fetchAll();

        return $comments;
    }

    public function report($id)
    { 
        $sql = 'UPDATE comment_news SET report = 1 WHERE id = '.(int) $id;
        $req = $this->connect()->exec($sql);

        $_SESSION['message'] = 'Le commentaire a ete signaler';  
    }

    public function noReport($id)
    {
        $sql = 'UPDATE comment_news SET report = 0 WHERE id = '.(int) $id;
        $req = $this->connect()->exec($sql);

        $_SESSION['message'] = 'Le commentaire a ete approuver'; 
    }

    public function reportedComment()
    {
        $sql= "SELECT * FROM comment_news WHERE report = 1";
        $req = $this->connect()->query($sql);

        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, '\Entity\Comment');
        $listreport = $req->fetchAll();

        return $listreport;
    }
}
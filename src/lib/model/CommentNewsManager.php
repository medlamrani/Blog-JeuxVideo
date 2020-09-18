<?php

namespace Project\lib\model;

use  Project\lib\model;
use  Project\lib\entity\CommentNews;

class CommentNewsManager extends DBConnect
{
    public function commentNews(CommentNews $commentNews)
    {
        // commenter un jeu
        $sql = "INSERT INTO comment_news
        SET news_id = :news_id, user_id = :user_id, content = :content, report = 0, commentDate = NOW()";

        $req = $this->connect()->prepare($sql);

        $req->bindValue(':news_id', $commentNews->getNewsId(), \PDO::PARAM_INT);
        $req->bindValue(':user_id', $commentNews->getUser()->getId());
        $req->bindValue(':content', $commentNews->getContent());

        $req->execute();

        $_SESSION['message'] = 'Commentaire Ajoute !';
        
    }

    public function delete()
    {
        $sql = "DELETE FROM comment_news WHERE id = ".(int) $id;
        $req = $this->connect()->exec($sql);

        $_SESSION['message'] = 'Commentaire supprime avec succes !'; 
    }

    public function listOfComment($newsId)
    {
        $sql = 'SELECT * FROM comment_news INNER JOIN user ON user_id = user.id WHERE news_id = :news_id';
  
        $req = $this->connect()->prepare($sql);
        $req->bindValue(':news_id', $newsId, \PDO::PARAM_INT);
        $req->execute();
    
        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Project\lib\entity\CommentNews');
    
        $comments = $req->fetchAll();

        return $comments;
    }

    public function comment($id)
    {
        $sql = 'SELECT * FROM comment_news LEFT JOIN user ON user_id = user.id WHERE comment_news.id = :id';

        $req = $this->connect()->prepare($sql);

        $req->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $req->execute();

        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Project\lib\entity\CommentNews');

        $comment = $req->fetch();

        return $comment;
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

        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Project\lib\entity\Comment');
        $listreport = $req->fetchAll();

        return $listreport;
    }

    public function save(CommentNews $commentNews)
    {
        if($commentNews->isValid())
        {
            $this->commentNews($commentNews);
        }
        else
        {
            $_SESSION['message'] = 'Le commentaire doit etre valide pour etre enregistree'; 
        }
    }
}
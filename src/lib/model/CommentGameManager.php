<?php

namespace Project\lib\model;

use  Project\lib\model;
use  Project\lib\entity\CommentGame;

class CommentGameManager extends DBConnect
{
    public function commentGame(CommentGame $commentGame)
    {
        // commenter un jeu
        $sql = "INSERT INTO comment_game 
        SET game_id = :game_id, user_id = :user_id, content = :content, report = 0, commentDate = NOW()";

        $req = $this->connect()->prepare($sql);

        $req->bindValue(':game_id', $commentGame->getGameId(), \PDO::PARAM_INT);
        $req->bindValue(':user_id', $commentGame->getUser()->getId());
        $req->bindValue(':content', $commentGame->getContent());

        $req->execute();

        $_SESSION['message'] = 'Commentaire Ajoute !';
        
    }

    public function delete($id)
    {
        $sql = "DELETE FROM comment_game WHERE id = ".(int) $id;
        $req = $this->connect()->exec($sql);

        $_SESSION['message'] = 'Commentaire supprime avec succes !'; 
    }

    public function listOfComment($gameId)
    {
        $sql = 'SELECT comment_game.id, game_id as gameId, user.username as user, content, report, commentDate FROM comment_game 
                INNER JOIN user ON comment_game.user_id = user.id 
                WHERE game_id = :game_id';
  
        $req = $this->connect()->prepare($sql);
        $req->bindValue(':game_id', $gameId, \PDO::PARAM_INT);
        $req->execute();
    
        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Project\lib\entity\CommentGame');
    
        $comments = $req->fetchAll();

        return $comments;
    }

    public function report($id)
    { 
        $sql = 'UPDATE comment_game SET report = 1 WHERE id = '.(int) $id;
        $req = $this->connect()->exec($sql);

        $_SESSION['message'] = 'Le commentaire a ete signaler';  
    }

    public function noReport($id)
    {
        $sql = 'UPDATE comment_game SET report = 0 WHERE id = '.(int) $id;
        $req = $this->connect()->exec($sql);

        $_SESSION['message'] = 'Le commentaire a ete approuver'; 
    }

    public function reportedCommentGame()
    {
        $sql= "SELECT comment_game.id, game_id as gameId, user.username as user, content, report, commentDate FROM comment_game 
        INNER JOIN user ON comment_game.user_id = user.id 
        WHERE report = 1";
        $req = $this->connect()->query($sql);

        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Project\lib\entity\CommentGame');
        $listreport = $req->fetchAll();

        return $listreport;
    }

    public function save(CommentGame $commentGame)
    {
        if($commentGame->isValid())
        {
            $this->commentGame($commentGame);
        }
        else
        {
            $_SESSION['message'] = 'Le commentaire doit etre valide pour etre enregistree'; 
        }
    }
}
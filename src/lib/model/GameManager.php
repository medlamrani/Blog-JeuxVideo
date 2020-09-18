<?php 

namespace Project\lib\model;


use  Project\lib\model;
use  Project\lib\entity\Game;
use  Project\lib\entity\Platform;
use  PDO;


class GameManager extends DBConnect
{
    public function addGame(Game $game)
    {
        // Ajouter un jeu
        $sql = "INSERT INTO game(name, resume,  platform_id, editor_id, release_date)
        VALUES(:name, :resume, :platform_id, :editor_id, :release_date)";
        $req = $this->connect()->prepare($sql);

        $req->bindValue(':name', $game->getName());
        $req->bindValue(':resume', $game->getResume());
        $req->bindValue(':platform_id', $game->getPlatform()->getId());
        $req->bindValue(':editor_id', $game->getEditor()->getId());
        $req->bindValue(':release_date', $game->getReleaseDate());

        $req->execute();
        
        $_SESSION['message'] = 'Jeu ajoute avec succes !';
    }

    public function deleteGame($id)
    {
        // Supprimer le jeu
        $sql = "DELETE FROM game WHERE id = ".(int) $id;
        $req = $this->connect()->exec($sql);

        $_SESSION['message'] = 'Le jeu a ete supprimer !';
    }

    public function updateGame(Game $game)
    {
        //Modifier le jeu
        $sql = "UPDATE game SET name = :name, resume = :resume, platform_id = :platform_id, editor_id = :editor_id, release_date = :release_date";
        $req = $this->connect()->prepare($sql);

        $req->bindValue(':name', $game->getName());
        $req->bindValue(':resume', $game->getResume());
        $req->bindValue(':platform_id', $game->getPlatform()->getId());
        $req->bindValue(':editor_id', $game->getEditor()->getId());
        $req->bindValue(':release_date', $game->getReleaseDate());

        $req->bindValue(':id', $game->id(), PDO::PARAM_INT);
        
        $req->execute();

        $_SESSION['message'] = 'Jeu modifie avec succes !';
    }

    public function listPlatform()
    {
        $sql = "SELECT * FROM platform";
        $req = $this->connect()->query($sql);
        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Project\lib\entity\Platform');

        $listPlatform = $req->fetchAll();

        $req->closeCursor();

        return $listPlatform;
    }

    public function listEditor()
    {
        $sql = "SELECT * FROM editor";
        $req = $this->connect()->query($sql);
        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Project\lib\entity\Editor');

        $listEditor = $req->fetchAll();

        $req->closeCursor();

        return $listEditor;
    }

    public function listOfGames()
    {
        // La liste des jeux
        $sql = 'SELECT * FROM game
        LEFT JOIN platform ON platform_id = platform.id
        LEFT JOIN editor ON editor_id = editor.id
        ORDER BY game.id DESC';
        

        $req = $this->connect()->query($sql);  
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Project\lib\entity\Game');
        
        $listGames = $req->fetchAll();

        $req->closeCursor();

        return $listGames;
    }

    public function lastGame()
    {
        $sql = 'SELECT * FROM game ORDER BY id DESC LIMIT 1';

        $req = $this->connect()->query($sql);  
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Project\lib\entity\Game');
        
        $lastGame = $req->fetchAll();

        $req->closeCursor();

        return $lastGames;
    }

    public function game($id)
    {
        // afficher un jeu 
        $sql = "SELECT * FROM game 
        LEFT JOIN platform ON platform_id = platform.id
        LEFT JOIN editor ON editor_id = editor.id 
        WHERE game.id = :id";

        $req = $this->connect()->prepare($sql);

        $req->bindValue(':id', (int) $id, PDO::PARAM_INT);
        $req->execute();

        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Project\lib\entity\Game');

        $game = $req->fetch();

        $game->setReleaseDate(new \DateTime($game->getReleaseDate()));

        return $game;
    }

    public function rateGame()
    {
        // donner une note a une jeu
    }

    public function gameRating()
    {
        // la moyenne des notes attribuer au jeu
    }
}
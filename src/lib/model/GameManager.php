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
        var_dump($game);
        $sql = "INSERT INTO game(name, resume,  platform_id, editor_id, release_date)
        VALUES(:name, :resume, :platform_id, :editor_id, :release_date)";
        $req = $this->connect()->prepare($sql);

        $req->bindValue(':name', $game->getName());
        $req->bindValue(':resume', $game->getResume());
        $req->bindValue(':platform_id', $game->getPlatform()->getId());
        $req->bindValue(':editor_id', $game->getEditor()->getId());
        $req->bindValue(':release_date', $game->getReleaseDate());

        $req->execute();
 
    }

    public function deleteGame($id)
    {
        // Supprimer le jeu
        $sql = "DELETE FROM game WHERE id = ".(int) $id;
        $req = $this->connect()->exec($sql);
    }

    public function updateGame(Game $game)
    {
        //Modifier le jeu
        $sql = "UPDATE game SET name = :name, resume = :resume, platform_id = :platform_id, editor_id = :editor_id, release_date = :release_date";
        $req = $this->connect()->prepare($sql);

        $req->bindValue(':name', $game->name());
        $req->bindValue(':platform_id', $game->name());
        $req->bindValue(':editor_id', $game->name());
        $req->bindValue(':release_date', $game->name());
        $req->bindValue(':id', $game->id(), PDO::PARAM_INT);
        
        $req->execute();
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
        $sql = 'SELECT * FROM game ORDER BY id DESC';

        $req = $this->connect()->query($sql);  
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Project\lib\entity\Game');
        
        $listGames = $req->fetchAll();

        $req->closeCursor();

        return $listGames;
    }

    public function game()
    {
        // afficher un jeu 
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
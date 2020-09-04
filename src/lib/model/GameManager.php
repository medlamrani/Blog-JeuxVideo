<?php 

namespace Project\lib\model;


use  Project\lib\model;
use  Project\lib\entity\Game;
use  Project\lib\entity\Platform;


class GameManager extends DBConnect
{
    public function addGame(Game $game)
    {
        // Ajouter un jeu
        $sql = "INSERT INTO game(name, resume,  platform_id, editor_id, release_date)
        VALUES(:name, :resume, :platform_id, :editor_id, :release_date)";
        $req = $this->connect()->prepare($sql);

        $req->bindValue(':name', $game->name());
        $req->bindValue(':resume', $game->resume());
        $req->bindValue(':platform_id', $game->platformId());
        $req->bindValue(':editor_id', $game->editorId());
        $req->bindValue(':release_date', $game->releaseDate());

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
        $req = $this->connect()->prepare($sql);
        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Platform');
        $req->execute();

        $listPlatform = $req->fetchAll();

        $req->closeCursor();

        return $listPlatform;
    }

    public function listOfGame()
    {
        // La liste des jeux
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
<?php 

namespace Project\lib\model;


use  Project\lib\model;
use  Project\lib\entity\Rating;
use  Project\lib\entity\Game;
use  Project\lib\entity\Platform;
use  PDO;


class RatingManager extends DBConnect
{
    public function rateGame(Rating $rating)
    {
        // donner une note a une jeu
        $sql = "INSERT INTO rating(user_id, game_id, rate)
                VALUES(:user_id, :game_id, :rate)";

        $req = $this->connect()->prepare($sql);

        $req->bindValue(':user_id', $rating->getUser()->getId());
        $req->bindValue(':game_id', $rating->getGame()->getId());
        $req->bindValue(':rate', $rating->getRate());

        $req->execute();

        $_SESSION['message'] = 'Votre note a ete ajoutee avec succes !';
    }

    public function getGameRating($gameId)
    {
        $sql = "SELECT user_id, game_id, rate
                INNER JOIN user ON user_id = user.id
                INNER JOIN game ON game_id = game.id
                WHERE game_id = :game_id";

        $req = $this->connect()->prepare($sql);

        $req->bindValue(':game_id', $gameId, PDO::PARAM_INT);
        $req->execute();

        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Project\lib\entity\Rating');

        $gameRating = $req->fetch();

        return $gameRating;
    }

    public function getRatingAverage($gameId)
    {
        // la moyenne des notes attribuer au jeu
        $sql = "SELECT AVG(rate) as rate_avg  FROM rating WHERE game_id = :game_id";
        $req = $this->connect()->prepare($sql);

        $req->bindValue(':game_id', $gameId, PDO::PARAM_INT);
        $req->execute();

        $average = $req->fetch();
        
        return $average['rate_avg'];
    }

    public function topGames()
    {
        $sql = 'SELECT game_id as gameId, game.name as game , AVG(rate) as rate_avg FROM rating
        INNER JOIN game ON game_id = game.id
        GROUP BY game_id, game.name ORDER BY rate_avg DESC LIMIT 5';


        $req = $this->connect()->query($sql);  
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Project\lib\entity\Rating');

        $topGames = $req->fetchAll();

        $req->closeCursor();

        return $topGames;
    }

    
}    
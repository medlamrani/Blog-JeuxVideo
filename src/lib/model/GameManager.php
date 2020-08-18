<?php 

namespace Project\lib\model;

require_once realpath("vendor/autoload.php");

use  Project\lib\model;

class GameManager extends DBConnect
{
    public function addGame()
    {
        // Ajouter un jeu
    }

    public function deleteGame()
    {
        // Supprimer le jeu
    }

    public function updateGame()
    {
        //Modifier le jeu
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
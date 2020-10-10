<?php

namespace Project\lib\entity;

class Rating extends Entity
{
    protected $user,
              $game,  
              $rate;
              

    public function setUser($user)
    {
        $this->user = $user;
    } 

    public function setGame($game)
    {
        $this->game = $game;
    } 
    
    public function setRate($rate)
    {
        $this->rate = (int) $rate;
    }

    public function setRatingAverage($ratingAverage)
    {
        $this->ratingAverage = (int) $ratingAverage;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getGame()
    {
        return $this->game;
    }

    public function getRate()
    {
        return $this->rate;
    }

    public function getRatingAverage()
    {
        return $this->ratingAverage;
    }
}
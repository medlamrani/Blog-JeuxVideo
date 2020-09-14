<?php

namespace Project\lib\entity;

class Rating extends Entity
{
    protected $id,
              $rate;
              

    public function setId($id)
    {
        $this->id = (int) $id;
    } 
    
    public function setRate($rate)
    {
        $this->rate = $rate;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getRate()
    {
        return $this->rate;
    }
}
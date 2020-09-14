<?php

namespace Project\lib\entity;

class Platform extends Entity
{
    protected $id,
              $platform;
              

    public function setId($id)
    {
        $this->id = (int) $id;
    } 
    
    public function setPlatform($platform)
    {
        $this->platform = $platform;
    }

    public function getId()
    {
        return $this->id;
    }

    public function platform()
    {
        return $this->platform;
    }
}
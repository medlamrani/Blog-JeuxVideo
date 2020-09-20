<?php

namespace Project\lib\entity;

class Platform extends Entity
{
    protected $id,
              $platformName;
              

    public function setId($id)
    {
        $this->id = (int) $id;
    } 
    
    public function setPlatformName($platformName)
    {
        $this->platformName = $platformName;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPlatformName()
    {
        return $this->platformName;
    }
}
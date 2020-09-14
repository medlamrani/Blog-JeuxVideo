<?php

namespace Project\lib\entity;

class Role extends Entity
{
    protected $id,
              $role;
              

    public function setId($id)
    {
        $this->id = (int) $id;
    } 
    
    public function setRole($role)
    {
        $this->role = $role;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getRole()
    {
        return $this->role;
    }
}
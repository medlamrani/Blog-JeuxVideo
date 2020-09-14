<?php

namespace Project\lib\entity;

class Editor extends Entity
{
    protected $id,
              $editor;
              

    public function setId($id)
    {
        $this->id = (int) $id;
    } 
    
    public function setEditor($editor)
    {
        $this->editor = $editor;
    }

    public function getId()
    {
        return $this->id;
    }

    public function editor()
    {
        return $this->editor;
    }
}
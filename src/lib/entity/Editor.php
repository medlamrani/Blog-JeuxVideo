<?php

namespace Project\lib\entity;

class Editor extends Entity
{
    protected $id,
              $editorName;
              

    public function setId($id)
    {
        $this->id = (int) $id;
    } 
    
    public function setEditorName($editorName)
    {
        $this->editorName = $editorName;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEditorName()
    {
        return $this->editorName;
    }
}
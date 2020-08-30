<?php

namespace Project\lib\entity;

class Editor
{
    protected $id,
              $editor;
              
    public function __construct( $values = [])
    {    
        if (!empty($values))
        {
            $this->hydrate($values);
        }
    }

    public function hydrate($datas)
    {
        foreach ($datas as $attribut => $value)
        {
            $method = 'set'.ucfirst($attribut);

            if (is_callable([$this, $method]))
            {
                $this->$method($value);
            }
        }
    }

    public function setId($id)
    {
        $this->id = (int) $id;
    } 
    
    public function setEditor($editor)
    {
        $this->editor = $editor;
    }

    public function id()
    {
        return $this->id;
    }

    public function editor()
    {
        return $this->editor;
    }
}
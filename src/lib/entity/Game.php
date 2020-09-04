<?php

namespace Project\lib\entity;

class Game 
{
    protected $id,
              $name,
              $resume,
              $platformId,
              $editorId,
              $releaseDate;
              
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
    
    public function isNew()
    {
        return empty($this->id);
    }

    public function setId($id)
    {
        $this->id = (int) $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setResume($resume)
    {
        $this->resume = $resume;
    }

    public function setPlatformId($platformId)
    {
        $this->platformId = (int) $platformId;
    }

    public function setEditorId ($editorId)
    {
        $this->editorId = (int) $editorId;
    }

    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;
    }

    public function id()
    {
        return $this->id;
    }

    public function name()
    {
        return $this->name;
    }

    public function resume()
    {
        return $this->resume;
    }

    public function platformId()
    {
        return $this->platformId;
    }

    public function editorId()
    {
        return $this->editorId;
    }

    public function releaseDate()
    {
        return $this->releaseDate;
    }
}
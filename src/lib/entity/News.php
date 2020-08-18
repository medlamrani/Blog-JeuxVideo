<?php

namespace Project\lib\entity;

class News
{
    protected $id,
              $gameId,
              $title,
              $content,
              $addDate,
              $updateDate;

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

    public function isValid()
    {
        return !(empty($this->title) || empty($this->content));
    }

    public function setId($id)
    {
        $this->id = (int) $id;
    }

    public function setGameId($gameId)
    {
        $this->gameId = (int) $gameId;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setAddDate($addDate)
    {
        $this->addDate = $addDate;
    }

    public function setUpdateDate($updateDate)
    {
        $this->updateDate = $updateDate;
    }
}
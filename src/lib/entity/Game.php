<?php

namespace Project\lib\entity;

class Game extends Entity
{
    protected $id,
              $name,
              $resume,
              $platform,
              $editor,
              $releaseDate;
              

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

    public function setPlatform($platform)
    {
        $this->platform = $platform;
    }

    public function setEditor($editor)
    {
        $this->editor = $editor;
    }

    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getResume()
    {
        return $this->resume;
    }

    public function getPlatform()
    {
        return $this->platform;
    }

    public function getEditor()
    {
        return $this->editor;
    }

    public function getReleaseDate()
    {
        return $this->releaseDate;
    }
}
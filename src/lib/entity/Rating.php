<?php

namespace Project\lib\entity;

class Rating
{
    protected $id,
              $rate;
              
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
    
    public function setRate($rate)
    {
        $this->rate = $rate;
    }

    public function id()
    {
        return $this->id;
    }

    public function rate()
    {
        return $this->rate;
    }
}
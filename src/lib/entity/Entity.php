<?php


namespace Project\lib\entity;

abstract class Entity
{
    public function __construct( $values = [] )
    {    
        var_dump($values);
        
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
}
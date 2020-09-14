<?php

namespace Project\lib\entity;

class User extends Entity
{
    protected $id,
              $roleId,  
              $username,
              $name,
              $lastname,
              $email,
              $password;
              

    public function setId($id)
    {
        $this->id = (int) $id;
    }

    public function setRoleId($roleId)
    {
        $this->roleId = (int) $roleId;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getRoleId()
    {
        return $this->roleId;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }
}
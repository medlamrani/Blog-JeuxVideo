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

    public function id()
    {
        return $this->id;
    }

    public function roleId()
    {
        return $this->roleId;
    }

    public function username()
    {
        return $this->username;
    }

    public function name()
    {
        return $this->name;
    }

    public function lastname()
    {
        return $this->lastname;
    }

    public function email()
    {
        return $this->email;
    }

    public function password()
    {
        return $this->password;
    }
}
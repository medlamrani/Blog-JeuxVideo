<?php

namespace Project\lib\model;

use  Project\lib\model;
use  Project\lib\entity\User;

class UserManager extends DBConnect
{
    public function adminConnect($username, $password)
   {
       $sql = "SELECT id, password, role_id FROM user WHERE username = :username AND role_id = 1";

       $req = $this->connect()->prepare($sql);
       $req->execute(array(
           'username' => $username,
       ));

       $result = $req->fetch();
 
       
       $isPasswordCorrect = password_verify($password, $result['password']);
       
       

       if (!$result)
       {
           $_SESSION['message'] = 'Login et mot de passe incorrect';
           return false;
       }
       else
       {
            if ($isPasswordCorrect && $result['role_id'] == 1)
            {
                $_SESSION['id'] = $result['id'];
                $_SESSION['username'] = $username;
                
                $_SESSION['message'] = 'Vous etes connecte !';  
                
                return true;
            }
            else
            {
                $_SESSION['message'] = 'Login et mot de passe incorrect';
                return false;
            } 
       }
   }

   public function addAdmin(User $user)
   {
        $sql = "INSERT INTO user (id, role_id, username, name, lastname, email, password) 
        VALUES(:id, :role_id, :username, :name, :lastname, :email, :password)";
        $db = $this->connect()->prepare($sql);

        $db->bindValue(':id', $user->getId());
        $db->bindValue(':role_id', $user->getRoleId());
        $db->bindValue(':username', $user->getUsername());
        $db->bindValue(':name', $user->getName());
        $db->bindValue(':lastname', $user->getLastname());
        $db->bindValue(':email', $user->getEmail());
        $db->bindValue(':password', $user->getPassword());

        $db->execute(); 
   }

   public function userInscription(User $user)
   {
        $sql = "INSERT INTO user (id, role_id, username, name, lastname, email, password) 
        VALUES(:id, :role_id, :username, :name, :lastname, :email, :password)";
        $db = $this->connect()->prepare($sql);

        $db->bindValue(':id', $user->getId());
        $db->bindValue(':role_id', $user->getRoleId());
        $db->bindValue(':username', $user->getUsername());
        $db->bindValue(':name', $user->getName());
        $db->bindValue(':lastname', $user->getLastname());
        $db->bindValue(':email', $user->getEmail());
        $db->bindValue(':password', $user->getPassword());

        $db->execute(); 
   }

   public function userConnect($username, $password)
   {
        $sql = "SELECT id, password FROM user WHERE username = :username";

        $req = $this->connect()->prepare($sql);
        $req->execute(array(
            'username' => $username
        ));

        $result = $req->fetch();

        
        $isPasswordCorrect = password_verify($password, $result['password']);
        

        if (!$result)
        {
            $_SESSION['message'] = 'Login et mot de passe incorrect';
            return false;
        }
        else
        {
            if ($isPasswordCorrect)
            {
                $_SESSION['id'] = $result['id'];
                $_SESSION['username'] = $username;
                
                $_SESSION['message'] = 'Vous etes connecte !';  
                
                return true;
            }
            else
            {
                $_SESSION['message'] = 'Login et mot de passe incorrect';
                return false;
            } 
        }
   }
}
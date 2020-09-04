<?php

namespace Project\lib\model;

use  Project\lib\model;
use  Project\lib\entity\User;

class UserManager extends DBConnect
{
    public function adminConnect($username, $password)
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

   public function addAdmin(User $user)
   {
        $sql = "INSERT INTO user (id, role_id, username, name, lastname, email, password) 
        VALUES(:id, :role_id, :username, :name, :lastname, :email, :password)";
        $db = $this->connect()->prepare($sql);

        $db->bindValue(':id', $user->id());
        $db->bindValue(':role_id', $user->roleId());
        $db->bindValue(':username', $user->username());
        $db->bindValue(':name', $user->name());
        $db->bindValue(':lastname', $user->lastname());
        $db->bindValue(':email', $user->email());
        $db->bindValue(':password', $user->password());

        $db->execute(); 
   }
}
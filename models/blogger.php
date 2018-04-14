<?php

require_once('user.php');

class Blogger extends User {
    private $profilePic;
    
//Getters
public function getProfilePic ($profilePic) {
        return $this->profilePic;
    }

    public function search($firstName, $surname) {
        $db = Db::getInstance();
        $firstName = varchar($firstName);
        $surname = varchar($surname);
        $req = $db->prepare('SELECT * FROM userTable WHERE firstName = :firstName '.'UNION '.'SELECT * FROM userTable WHERE surname = :surname ');
        //the query was prepared, now replace :firstName with the actual $firstName value
        $req->execute(array('firstName' => $firstName, 'surname' => $surname));
        $blogger = $req->fetch();
    if($blogger){
        return new Blogger($blogger['firstName'], $blogger['surname']);
      }
      else
      {
          //replace with a more meaningful exception
          throw new Exception('No results, please try a new search');
      }
    }
    
} 


<?php

abstract class User {
    protected $userID;
    protected $firstName;
    protected $surname;
    protected $email;
    protected $password;
    protected $permissions;
    
    public function __construct($userID, $firstName, $surname, $email, $password, $permissions) {
        $this->userID = $userID;
        $this->firstName = $firstName;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
        $this->permissions = $permissions;
    }
    
    //Getters
    public function getUserID ($userID) {
        return $this->userID;
    }
    
    public function getFirstName ($firstName) {
        return $this->firstName;
    }
    
    public function getSurname ($surname) {
        return $this->surname;
    }
    
    public function getEmail ($email) {
        return $this->email;
    }

    public function getPassword ($password) {
        return $this->password;
    }
    
    public function getPermissions ($permissions) {
        return $this->permissions;
    }
}
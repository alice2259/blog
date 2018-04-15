<?php

class UserController {
    public function login() {
      // we expect a url of form ?controller=products&action=login
      // if it's a GET request display a blank form for the user to login
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
          require_once('views/pages/login.php');
        }
    }
    
    public function create()    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            require_once ('views/posts/create.php');
        }
    }
}
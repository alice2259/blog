<?php

class UserController {
    public function login() {
      // we expect a url of form ?controller=products&action=login
      // if it's a GET request display a blank form for the user to login
      // else they are logged in already so we display all posts ???? Not sure if this logic is sound!
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
          require_once('views/pages/login.php');
      }
      else { 
            Post::add();
             
            $posts = Post::all(); //$products is used within the view
            require_once('views/posts/readAll.php');
      }
    }
}
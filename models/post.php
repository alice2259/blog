<?php

class Post {
    public $postID;
    public $title;
    public $userID;
    public $content;
    public $datePublished;
    public $headerImage;
    public $imageCaption;
    
    public function __construct($postID, $title, $userID, $content, $datePublished, $headerImage, $imageCaption) {
        $this->postID=$postID;
        $this->title=$title;
        $this->userID=$userID;
        $this->content=$content;
        $this->datePublished=$datePublished;
        $this->headerImage=$headerImage;
        $this->imageCaption=$imageCaption;
    }
    
    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM post');
      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $post) {
        $list[] = new Post($post['postID'], $post['title'], $post['userID'], $post['content'], $post['datePublished'], $post['headerImage'], $post['imageCaption']);
      }
      return $list;
    }
    
    public static function find($postID) {
      $db = Db::getInstance();
      //use intval to make sure $id is an integer
      $postID = intval($postID);
      $req = $db->prepare('SELECT * FROM post WHERE postID = :postID');
      //the query was prepared, now replace :postID with the actual $postID value
      $req->execute(array('postID' => $postID));
      $post = $req->fetch();
if($post){
      return new Post($post['postID'], $post['title'], $post['userID'], $post['content'], $post['datePublished'], $post['headerImage'], $post['imageCaption']);
      }
    else
    {
        //replace with a more meaningful exception
        throw new Exception('A real exception should go here');
    }
    }
        
    public static function update($postID) {
    $db = Db::getInstance();
    $req = $db->prepare("Update post set title=:title, content=:content, datePublished=:datePublished, headerImage=:headerImage, imageCaption=:imageCaption where postID=:postID");
    $req->bindParam(':postID', $postID);
    $req->bindParam(':title', $title);
    $req->bindParam(':content', $content);
    $req->bindParam(':datePublished', $datePublished);
    $req->bindParam(':headerImage', $headerImage);
    $req->bindParam(':imageCaption', $imageCaption);

// set name and price parameters and execute
    if(isset($_POST['title'])&& $_POST['title']!=""){
        $filteredTitle = filter_input(INPUT_POST,'title', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['content'])&& $_POST['content']!=""){
        $filteredContent = filter_input(INPUT_POST,'content', FILTER_SANITIZE_SPECIAL_CHARS);
    }
$title = $filteredTitle;
$content = $filteredContent;
$req->execute();

//upload product image if it exists
        if (!empty($_FILES[self::InputKey]['title'])) {
		Post::uploadFile($title);
	}

    }
    
    public static function add() {
    $db = Db::getInstance();
    $req = $db->prepare("Insert into post(title, userID, content, datePublished, headerImage, imageCaption) values (:title, :userID, :content, :datePublished, :headerImage, :imageCaption)");
    $req->bindParam(':title', $title);
    $req->bindParam(':userID', $userID);
    $req->bindParam(':content', $content);
    $req->bindParam(':datePublished', $datePublished);
    $req->bindParam(':headerImage', $headerImage);
    $req->bindParam(':imageCaption', $imageCaption);

// set parameters and execute
    if(isset($_POST['title'])&& $_POST['title']!=""){
        $filteredTitle = filter_input(INPUT_POST,'title', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['userID'])&& $_POST['userID']!=""){
        $filteredUserID = filter_input(INPUT_POST,'userID', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['content'])&& $_POST['content']!=""){
        $filteredContent = filter_input(INPUT_POST,'content', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['datePublished'])&& $_POST['datePublished']!=""){
        $filteredDatePublished = filter_input(INPUT_POST,'datePublished', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['imageCaption'])&& $_POST['imageCaption']!=""){
        $filteredImageCaption = filter_input(INPUT_POST,'imageCaption', FILTER_SANITIZE_SPECIAL_CHARS);
    }
$title = $filteredTitle;
$userID = $filteredUserID;
$content = $filteredContent;
$datePublished = $filteredDatePublished;
//$headerImage = $headerImage;
$imageCaption = $filteredImageCaption;
$req->execute();

//upload product image
Post::uploadFile($title);
    }

const AllowedTypes = ['image/jpeg', 'image/jpg'];
const InputKey = 'myUploader';

//die() function calls replaced with trigger_error() calls
//replace with structured exception handling
//public static function uploadFile(string $title) {
//
//	if (empty($_FILES[self::InputKey])) {
//		//die("File Missing!");
//                trigger_error("File Missing!");
//	}
//
//	if ($_FILES[self::InputKey]['error'] > 0) {
//		trigger_error("Handle the error! " . $_FILES[InputKey]['error']);
//	}
//
//
//	if (!in_array($_FILES[self::InputKey]['type'], self::AllowedTypes)) {
//		trigger_error("Handle File Type Not Allowed: " . $_FILES[self::InputKey]['type']);
//	}
//
//	$tempFile = $_FILES[self::InputKey]['tmp_name'];
//        $path = "/Applications/XAMPP/xamppfiles/htdocs/blog/views/images";
//	$destinationFile = $path . $title . '.jpeg';
//
//	if (!move_uploaded_file($tempFile, $destinationFile)) {
//		trigger_error("Handle Error");
//	}
//		
//	//Clean up the temp file
//	if (file_exists($tempFile)) {
//		unlink($tempFile); 
//	}
//}

public static function uploadFile() {
if (empty($_FILES[InputKey])) {
            die("File Missing!");
        }
        if ($_FILES[InputKey]['error'] >0) {
            die("Handle the error!");
        }
        if (!in_array($_FILES[InputKey]['type'],AllowedTypes)) {
            die("Handle File Type Not Allowed!");
        }
        
        $tmpFile= $_FILES[InputKey]['tmp_name'];
        //Domain specific: e.g. move the file
        $permFile='/Applications/XAMPP/xamppfiles/htdocs/blog/views/images/'.$title;
        if (!move_uploaded_file($tmpFile, $permFile)) {
            die ("Handle Error!");
        }
        //Clean up the temp file
        if (file_exists($tmpFile)) {
            unlink($tmp);
        }
    
}



public static function remove($postID) {
      $db = Db::getInstance();
      //make sure $id is an integer
      $postID = intval($postID);
      $req = $db->prepare('delete FROM post WHERE postID = :postID');
      // the query was prepared, now replace :id with the actual $id value
      $req->execute(array('postID' => $postID));
  }




    public static function search() {
      $list = [];
      $db = Db::getInstance();
      
        if(isset($_POST['search'])){
            $input = $_POST['search'];
            
            $sql = "SELECT post.postID, post.title, post.userID, post.datePublished, post.headerImage, post.imageCaption, post.content FROM post WHERE post.title LIKE '" . $input . "%';";
        } else {
            $sql = "SELECT post.postID, post.title, post.userID, post.datePublished, post.headerImage, post.imageCaption, post.content FROM post ORDER BY post.datePublished DESC;";
        }
        
        $req = $db->query($sql);
        
        foreach($req->fetchAll() as $post) {
        $list[] = new Post($post['postID'], $post['title'], $post['userID'], $post['datePublished'], $post['headerImage'], $post['imageCaption'], $post['content']);
        }

        return $list;
        }  
}
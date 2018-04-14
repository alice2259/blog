<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php require_once 'blogger.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Testing</h1>
        <form class="search-form" action="" method="post"> 
                    <input type="text" name="search" placeholder="Search" /> 
                    <button class="btn btn-sm search-books-btn" onclick="">Submit </button>
                    
            </form>
        <p>
            <?php echo $blogger->getFirstName();?>
        </p>
        <?php
        // put your code here
        ?>
    </body>
</html>

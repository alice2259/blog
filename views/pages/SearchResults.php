<!DOCTYPE html>

<?php //move this to Source Files/connection once working
    $dsn = "mysql:host=localhost;dbname=php_mvc"; //changed
    $username = "Faye";
    $password = "password"; //how the hell did I set this the first time around?
    $conn = new PDO($dsn, $username, $password);
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); } 
    catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage(); }    
?>

<form method="post" action="SearchResults.php?go"  id="search">
<!--Since searching by letter is merely adjusting a couple lines of code, let's 
    go ahead and add in functionality that allows our visitor to search our 
    staff member directory for first or last names containing a certain letter. 
    In order to do this, add this code right after the closing <form> tag:-->
    <p><a  href="?by=A">A</a> | <a  href="?by=B">B</a> | <a  href="?by=K">K</a></p>
    
    <div class="container">
        <h2>Search results</h2>  

        <table class="table table-hover">
            <thead>
                <tr><th>Name</th>
                <th>User ID</th>
                <th>Blog</th>
                <th>Content</th>
                <th>Date</th>
                <th>Tag</th></tr>
            </thead>
            <tbody>
                <tr>
<!--                //taken from the libaray project - not really sure what this does - changed name to blog anyway
                    if(isset($_POST['blog']) ) { 
                        if(preg_match("/[A-Z | a-z]+/", $_POST['blog']) ) {
                        $blog = $_POST['blog'];
                    }}               -->

                    <?php            
//http://webreference.com/programming/php/search/2.html              
                    //my version
                    if(isset($_POST['submit']) ) { 
                        if(isset($_GET['go']) ) {
                            if(preg_match("^/[A-Za-z]+/", $_POST['blog'])) {
                                $blog = $_POST['blog'];
                                // connenct to database
                                $db = mysql_connect("localhost", "Faye", "password") or die ('I cannot connect  to the database because: ' . mysql_error());
                                //select the database to use
                                $mydb = mysql_select_db("php_mvc");
                                //query the database table
                                $sql = "SELECT post.Title, post.Content, post.DatePublished, post.UserID, tag.TagName FROM post "
                                        . "INNER JOIN user ON post.UserID = user.UserID "
                                        . "INNER JOIN posttag ON post.PostID = posttag.PostID "
                                        . "INNER JOIN tag ON posttag.TagID = tag.TagID "
                                        . "WHERE user.FirstName LIKE '% . $blog . %' "
                                        . "OR user.Surname LIKE '% . $blog . %' "          
                                        . "OR post.Title LIKE '% . $blog . %' "
                                        . "OR tag.TagName LIKE '% . $blog . %' "
                                        . "OR post.DatePublished LIKE '% . $blog . %'";       
                                //run the query against the my sql query function
                                $result = mysql_query($sql);
                                //create while loop and loop through result set
                                while($row = mysql_fetch_array($result)){
                                    $FirstName = $row['FirstName'];
                                    $Surname = $row['Surname'];
                                    $UserID = $row['UserID'];
                                    $Title = $row['Title'];
                                    $Content = $row['Content'];
                                    $DatePublished = $row['DatePublished'];
                                    $TagName = $row['TagName'];
                                    //display the result of the array    
                                    echo "<td>" . $FirstName . $Surname . "</td> "; 
                                    echo "<td>" . $UserID . "</td> ";
                                    echo "<td>" . $Title . "</td> ";
                                    echo "<td>" . $Content . "</td> ";
                                    echo "<td>" . $DatePublished . "</td> ";
                                    echo "<td>" . $TagName . "</td></tr>"; 
                                    }
                            }   
                        }        
                        else{
                            echo "Error: please enter a search query";
                        }
                    }

// OTHER VERSION
    //                    $stmt = $conn -> prepare(
    //                    "SELECT post.Title, post.Content, post.DatePublished, post.UserID, tag.TagName"
    //                        . "FROM post "
    //                        . "INNER JOIN user ON post.UserID = user.UserID "
    //                        . "INNER JOIN posttag ON post.PostID = posttag.PostID "
    //                        . "INNER JOIN tag ON posttag.TagID = tag.TagID "
    //                        . "WHERE user.FirstName LIKE '% ".$blog." %' "
    //                        . "OR user.Surname LIKE '% ".$blog." %' "               //change variables
    //                        . "OR post.Title LIKE '% ".$blog." %' "
    //                        . "OR tag.TagName LIKE '% ".$blog." %' "
    //                        . "OR post.DatePublished LIKE '% ".$blog." %'");                    
    //                    $stmt -> execute();   
    //                    while ($row = $stmt -> fetch() ) {
    //                        echo "<td>" . $row ['FirstName'] . $row ['Surname'] . "</td> "; 
    //                        echo "<td>" . $row ['UserID'] . "</td> ";
    //                        echo "<td>" . $row ['Title'] . "</td> ";
    //                        echo "<td>" . $row ['Content'] . "</td> ";
    //                        echo "<td>" . $row ['DatePublished'] . "</td> ";
    //                        echo "<td>" . $row ['TagName'] . "</td></tr>"; 
    //                    }
                    
                    ?>   
                </tr>   
                
    <!-- EXAMPLE ----------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
                    <?php
    //                $stmt = $pdo->prepare("SELECT Book.BookTitle, Author.AuthorFirstName, Author.AuthorLastName, Book.DatePublished "
    //                    . "FROM Book "
    //                    . "Inner join Author ON Author.AuthorID = Book.AuthorID "
    //                    . "where BookTitle like '%".$name."%' "
    //                    . "OR AuthorFirstName like '%".$name."%'"
    //                    . "OR AuthorLastName like '%".$name."%' "
    //                    . "OR DatePublished like '%".$name."%'");
    //                $stmt->execute();
    //                while ($row = $stmt->fetch()){
    //                    //print_r($row);
    //                    echo "<td></td>";
    //                    echo "<td>" . $row['BookTitle'] . "</td>";
    //                    echo "<td>" . $row['AuthorFirstName'] ." ". $row['AuthorLastName']."</td>";
    //                    echo "<td>" . $row['DatePublished'] . "</td>";
    //                    echo "<td></td>";
    //                    echo "<td></td>";
    //                    echo "<td><a href='http://localhost/LibraryApplicationProject/LibraryWebPages/LibraryLogInPage.php'>Click Here</a></td></tr>";
    //                }
    //                ?> 
            </tbody>
        </table>
        <p><a href="Search.php">Search again</a></p>
    </div>   
</form>    
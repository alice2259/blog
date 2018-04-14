<!DOCTYPE html>
<!--     
This is my search page
 * I want to be able to search by author
 * This means using FirstName and Surname from the database in the table user
 * I will need to look at the code for search from the library project to put in a search bar
 * I have created this file in the Views/pages section of the MVC    
 * I need to connect to the database
     -->
     
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

<?php
//$sql = "SELECT * FROM user"; //Just checking its connecting. = IT IS!!!!!!!!!
//try {
//    $rows = $conn->query($sql);
//    foreach ($rows as $row) {
//        echo"User: "  . "<br>" .
//                $row["UserID"] . "<br>" .
//                $row["FirstName"] . "<br>" .
//                $row["Surname"] . "<br>" .
//                $row["Email"] . "<br>" .
//                $row["Password"] . "<br>" .
//                $row["ProfilePic"] . "<br>" .
//                $row["PermissionsID"] . "<br><br>" ;
//        }
//} catch(PDOException $e){
//    echo 'Queary failed' . $e->getMessage();
//};
//?>

<html>
    <body>
        <form action="SearchResults.php" method="post" > 
            <center> 
                <h1> Search</h1 > 
                <input type ="text" name="blog" size="80" />
                <input type="submit" name="submit" value="Search">
            </center > 
        </form >
        <p id="Result"><span id="txtHint"></span></p>
    </body>
</html>

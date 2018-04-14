<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Library</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- controls layout on mobile devices (size and scale when loaded) -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="libraryHomePage.css" rel="stylesheet" type="text/css"/>
        <!-- link to bootstrap, CSS and ajax & jquery -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
        <link href="CSS.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="bgimg-1">
            <div class="caption">
                <span class="border">Search</span><br>
            </div>
        </div>
<!-- Navbar -------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header"><!-- navbar fixed at top of page --> 
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"><!-- elements collapse into hamburger -->
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                    </button>
                    <a class="navbar-brand" style="color:white" href="LibraryHomePage.php">HOME</a><!-- for company name (not in hamburger) -->
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a style="color:white" href="LibraryMyAccountPage.php">MY ACCOUNT</a></li>
                        <li><a style="color:white" href="LibrarySearchPage.php">SEARCH</a></li>
                        <li><a style="color:white" href="#">BROWSE BOOKS</a></li>
                        <li><a style="color:white" href="#contact">CONTACT</a></li>
                        <li><a style="color:white" href="LibrarySignUpPage.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a style="color:white" href="LibraryLogInPage.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        <li><a href="libraryLogOut.php" style="color: white"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li> 
                    </ul>
                </div>   
            </div>
        </nav>

            <?php
                $dsn = "mysql:host=localhost;dbname=LibraryNEW";
                $username = "root";
                $password = "";
                try {
                    $pdo = new PDO($dsn, $username, $password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } 
                catch (PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
                }

                if(isset($_POST['name']) ) {
                    if(preg_match("/[A-Z | a-z]+/", $_POST['name']) ) {
                        $name=$_POST['name'];
                    }
                }
            ?>

            <br><br><br>

            <div class="container">
                <h1>Table of Results.</h1>
            </div>

            <div class="container">
            <h2>Search results</h2>            
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th>Book Cover</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Date Published</th>
                        <th>Status</th>
                        <th>Location</th>
                        <th>Reserve</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php
                            $stmt = $pdo->prepare("SELECT Book.BookTitle, Author.AuthorFirstName, Author.AuthorLastName, Book.DatePublished FROM Book "
                                    . "Inner join Author ON Author.AuthorID = Book.AuthorID "
                                    . "where BookTitle like '%".$name."%' "
                                    . "OR AuthorFirstName like '%".$name."%'"
                                    . "OR AuthorLastName like '%".$name."%' "
                                    . "OR DatePublished like '%".$name."%'");
                            $stmt->execute();
                            while ($row = $stmt->fetch()){
                                //print_r($row);
                                echo "<td></td>";
                                echo "<td>" . $row['BookTitle'] . "</td>";
                                echo "<td>" . $row['AuthorFirstName'] ." ". $row['AuthorLastName']."</td>";
                                echo "<td>" . $row['DatePublished'] . "</td>";
                                echo "<td></td>";
                                echo "<td></td>";
                                echo "<td><a href='http://localhost/LibraryApplicationProject/LibraryWebPages/LibraryLogInPage.php'>Click Here</a></td></tr>";                  
                                }
                        ?>
                    <br><br>  
                    </tbody>
                </table>
            </div>      
        <br><br>      

<!-- Contact form --> 

        <div id="contact" class="container-fluid bg-grey">
            <h2 class="text-left">GET IN TOUCH</h2>
            <div class="row">
                <div class="col-sm-5">
                    <p>Contact us and we'll get back to you within 48 hours.</p>
                    <p><span class="glyphicon glyphicon-map-marker"></span> Leeds, UK</p>
                    <p><span class="glyphicon glyphicon-phone"></span> +00 12345678</p>
                    <p><span class="glyphicon glyphicon-envelope"></span> contact@something.com</p> 
                    <span class="heading">User Rating</span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                </div>
           <!-- contact details (responsive) --> 

                <div class="col-sm-7">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                           <input class="form-control" id="name" name="name" placeholder="Email" type="text" required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <select style="color:#9FA2B2"class="form-control">
                                <option selected disabled>I need help with... </option>
                                <option>2</option>
                                <option>3</option>
                                <option>3</option>
                            </select>
                        </div>
                    </div>
                    <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br><!-- form-control elements have 100% width -->    
                    <div class="row">
                        <div class="col-sm-12 form-group">
                           <button class="btn btn-default pull-right" type="submit">Send</button><!-- pull right - align with text to the right --> 
                        </div>
                    </div> 
                </div>
            </div>
        </div>  

        <div id="map" style="height:400px;width:100%;"></div>   <!-- Google maps (centre set to london)-->
            <!-- Map must be in HTML element --> 
            <script>
                var map;<!-- map variable defines properties for map. var map = .... creates new map inside <div> element --> 
                function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                  center: {lat: 53.8008, lng: -1.5491},
                  zoom: 12
                });
                }
            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrsthx6SjytN7X5hfwab5sINCwjwIATLg&callback=initMap"async defer></script><!-- script loads once page loaded --> 

<!-- Footer (link to top) --> 
    
        <footer class="container-fluid text-center">
            <a href="#top" title="To Top" style="color: #f4511e">
                <span class="glyphicon glyphicon-chevron-up"></span>
            </a>
        <footer class="w3-container w3-padding-64 w3-center w3-opacity">  
            <div class="w3-xlarge w3-padding-32">
                <i class="fa fa-facebook-official w3-hover-opacity"></i>
                <i class="fa fa-instagram w3-hover-opacity"></i>
                <i class="fa fa-snapchat w3-hover-opacity"></i>
                <i class="fa fa-pinterest-p w3-hover-opacity"></i>
                <i class="fa fa-twitter w3-hover-opacity"></i>
                <i class="fa fa-linkedin w3-hover-opacity"></i>
            </div>
        </footer>    
    </body>
</html>

<!DOCTYPE html>
<html>
    <head>
        <title>Time Travels </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="../CSS/styles.css" rel="stylesheet" type="text/css"/>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
       <!-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->     
<!-- NAVBAR move over to layout when working-->     
        <nav class="navbar navbar-default navbar-fixed-top">  <!-- navbar fixed at top of page --> 
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">  <!-- collapse into hamburger -->
                        <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>   <!--Hamburger-->
                    </button>
                    <h3 class="navbar-brand">www.timetravels.com</h3>  <!-- (not in hamburger) --> 
                </div>
                <div class="collapse navbar-collapse" id="Navbar">
                    <form class="nav navbar-nav navbar-right">
                        <p><a href="Home.php"><!--<span class="glyphicon-glyphicon-home"></span>-->HOME</p>
                        <p><a href="News.php"><!--<span class="glyphicon-glyphicon-list-alt"></span>-->NEWS</p>
                        <p><a href="About.php"><!--<span class="glyphicon-glyphicon-font"></span>-->ABOUT</p>
                        <p><a href="Contact.php"><!--<span class="glyphicon glyphicon-envelope"></span>-->CONTACT</p>
                        <p><a href="Forums.php"><!--<span class="glyphicon-glyphicon-list"></span>-->FORUMS</p>
                        <p><a href="Search.php"><!--<span class="glyphicon glyphicon-search"></span>-->SEARCH</p>
                        <!--<p><a href="Account.php"><span class="glyphicon-glyphicon-user"></span>ACCOUNT</p>-->
                        
                        <div class="dropdown">
                        <p><a href="Account.php"><span class="glyphicon-glyphicon-user"></span>ACCOUNT</p>    
                            <button class="dropbtn"> 
                                <i class="fa fa-caret-down"></i>
                            </button>
                            <div class="dropdown-content">
                                <a href="Register.php" ><span class="glyphicon glyphicon-user"></span>REGISTER</a>
                                <a href="LogIn.php" ><span class="glyphicon glyphicon-log-in"></span>LOG IN</a>
                                <a href="LogOut.php" ><span class="glyphicon glyphicon-log-out"></span>LOG OUT</a>
                                <a href="MyProfile.php" ><span class="glyphicon-glyphicon-tent"></span>MY PROFILE</a>
                                <a href="Settings.php" ><span class="glyphicon-glyphicon-cog"></span>SETTINGS</a>
                            </div>
                        </div>
                        

                    </form>
                </div>
            </div>
        </nav>      
    </body>
</html>

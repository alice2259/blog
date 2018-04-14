<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Blog/Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
    
    <link href="../CSS/styles.css" rel="stylesheet" type="text/css"/>
    
</head>
<body>
<!-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->     
<!-- NAVBAR -->     
<!-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->     

    <form class="form" action="Account.php" target="_self" method="post">   
        <div id="login" class="container-fluid">
            <div class="pull-center text-center row col-sm-6 col-sm-offset-3" >   <!-- contact details responsive? --> 
            <fieldset> 
                <legend class="form-group text-center">Register</legend>
                    <input class="form-control" id="firstname" name="firstname" placeholder="First name" type="text" required>
                    <br>
                    <input class="form-control" id="lastname" name="lastname" placeholder="Surname" type="text" required>
                    <br>
                    <input class="form-control" id="email" name="email" placeholder="Email address" type="email" required>
                    <br>
                    <input class="form-control" id="password" name="password" placeholder="Password" type="password" required>
                    <br>
                    <input class="form-control" id="password" name="password" placeholder="Confirm password" type="password" required>
                    <br>
            </fieldset>    
            <fieldset> 
                <div class="form-group">
                    <button class="btn btn-default" type="submit">Submit</button>  <!--either refresh the page or redirect to my account page-->
                    <br><br>
                    <button class="btn btn-default" type="reset">Reset</button>  <!--either refresh the page or redirect to my account page-->
                </div>
            </fieldset>     
            </div>
        </div> 
    <h6 class="text-center"> Already registered? <a href="LogIn.php"> Click here. </a></h6>     
    </form >
<!-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->  
</body>    
</html>
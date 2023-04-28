<!-- PHP command to link server.php file with registration form  -->

 
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Registration</title>
     <link rel="stylesheet" type="text/css" href="style.css">
	 <link rel="stylesheet" type="text/css" href="login&register.css">
     <!-- CSS Code -->
     <style>
         .container{
             justify-content: center;
             text-align: center;
             align-items: center;
         }
         input{
             padding: 5px;
         }
         .error{
             background-color: yellow;
             color: red;
             width: 250px;
             margin: 0 auto;
         }
     </style>
 </head>
 
 <body>
 <?php 
 include ('header.html');
 include('UserProcessing.php');
 ?>

 <div class="container">
     <h1>User Registration System</h1>
     <h4><a href="loggedInPage.php">Management system</a></h4>
     
      
     <div> <!--form div-->
     <form method="POST">
        <div class="error"> <?php echo $RegisterError ?> </div>
 
            <!--------- To check user regidtration status ------->
     <p>
         <?php
            if (!isset($_SESSION["registerId"]) ) { // if you want cookies add this: !isset($_COOKIE["id"])
             echo "Sign Up";
            }
         ?>
        </p>
       <input type="text" name="name" placeholder="User Name"> <br> <br>
       <input type="email" name="email" placeholder="Email"> <br><br>
       <input type="password" name="password" placeholder="password"><br><br>
       <input type="password" name="repeatPassword" placeholder="Repeat Password"><br><br>
       <!--<label for="checkbox">Stay logged in</label>-->
       <!--<input type="checkbox" name="stayLoggedIn" id="checkbox" value="1"> <br><br>-->
      <!--The 2 commented lines are useful if you want to implement a cookie feature-->
       <input type="submit" name="register" value="Sign Up">
	   
       <p >Have an account already? <a href="login.php">Log In</a></p>
      </form>
     </div>
     <?php include 'footer.html'; ?>
 </body>
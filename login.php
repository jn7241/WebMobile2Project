<!-- PHP command to link server.php file with registration form  -->

 
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>User logIn</title>
     <link rel="stylesheet" type="text/css" href="style.css">
	 <link rel="stylesheet" type="text/css" href="login&register.css">
 </head>
 <body>
 <?php 
 include('header.html');
 include("UserProcessing.php");
  ?>
 <div class="container">
     <h1> User Log In System</h1>

                   
     <div> <!--form div-->
     <form method="POST">
 
     <!--Error reporting div-->
        <div class="error"> <?php echo $LoginError ?> </div>
 
        
        <p>
         <?php
            if (!isset($_SESSION["loginId"]) ) {
             echo "<p>Sign in</p>";
            }
         ?>
       </p>
 
       <input type="email" name="email" placeholder="Email"> <br><br>
       <input type="password" name="password" placeholder="password"><br><br>
        <!--<label for="checkbox">Stay logged in</label>-->
       <!--<input type="checkbox" name="stayLoggedIn" id="checkbox" value="1"> <br><br>-->
      <!--The 2 commented lines are useful if you want to implement a cookie feature-->
     <br><br>
       <input type="submit" name="login" value="Log In">

       <p>Not a registered user?  <a href="register.php"> Create Account</a></p>
	   
     </form>
     </div>
 </div>
 <?php include 'footer.html'; ?>
 </script>
  
 </body>
 </html>
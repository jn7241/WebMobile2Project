<?php 
session_start();

$RegisterError = "";
$LoginError = "";
if (isset($_POST["register"])) { //array_key_exists("register", $_POST)
 
    $database = mysqli_connect("localhost", "root", "", "cinema");
    
    if($database === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }



    
    $name = mysqli_real_escape_string($database, $_POST['name']);
    $email = mysqli_real_escape_string($database, $_POST['email']);
    $password = mysqli_real_escape_string($database,  $_POST['password']); 
    $repeatPassword = mysqli_real_escape_string($database,  $_POST['repeatPassword']); 
     
    
    if (!$name) {
      $RegisterError .= "Name is required <br>";
     }
    if (!$email) {
        $RegisterError .= "Email is required <br>";
     }
    if (!$password) {
        $RegisterError .= "Password is required <br>";
     } 
     if ($password !== $repeatPassword) {
        $RegisterError .= "Password does not match <br>";
     }
     if ($RegisterError) { //If form has errors other than unmatched passwords
        $RegisterError = "<b>There were error(s) in your form!</b> <br>";
     }  else {
       
    
        $query = "SELECT id FROM staff WHERE email = '$email'"; // from 1st column id to the end, find emails with same entry value
        $entries = mysqli_query($database, $query);
        if (mysqli_num_rows($entries) > 0) {
            $RegisterError .= "<p>Email already in use. Choose another email</p>";
        } else {
            
            $query = "INSERT INTO staff (name, email, password) VALUES ('$name', '$email', '$password')";
             
        if (!mysqli_query($database, $query)){ //if it can't connect, because of a connection error
            $RegisterError ="<p>Could not sign you up - please try again.</p>";
            } else {
 
                    
                $_SESSION["registerId"] = mysqli_insert_id($database);  
                $_SESSION["name"] = $name;
         
                header("Location: loggedInPageStaff.php");  
             
                }
             
            }
 
        }  
    }
 
if (isset($_POST["login"])) {
     
    $database = mysqli_connect("localhost", "root", "", "cinema");
    
    if($database === false){
     die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    

    
      
      $email = mysqli_real_escape_string($database, $_POST['email']);
      $password = mysqli_real_escape_string($database,  $_POST['password']); 
       
	   
      if (!$email) {
          $LoginError .= "Email is required <br>";
       }
      if (!$password) {
          $LoginError.= "Password is required <br>";
       } 
      elseif ($LoginError) { //
          $LoginError = "<b>There were error(s) in your form!</b><br>".$LoginError;
       }
    
      else {        
 
            $query = "SELECT * FROM staff WHERE email='$email'";
            $entries = mysqli_query($database, $query);
            $userRow = mysqli_fetch_array($entries);
         
            if (isset($userRow)) { //checks if there's an email that is the same

                if ($password === $userRow['password']) { 
 
                    
                    $_SESSION['loginId'] = $userRow['id'];  
 
                     
                    header("Location: loggedInPageStaff.php");
 
                } else {
                    $LoginError = "Combination of email/password does not match!";
                     }
   
            }  else {
                $LoginError= "Combination of email/password does not match!";
                 }
        }
}
?>
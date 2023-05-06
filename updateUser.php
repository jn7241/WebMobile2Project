<?php
session_start();
 if (isset($_POST['submitUser'])){
    $database = mysqli_connect("localhost", "root", "", "cinema");

    if($database === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
    $ID = $_SESSION['input'][0];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sql = "UPDATE USERS SET name= '$name', email ='$email' WHERE id = '$ID'"; 
    if($result = mysqli_query($database, $sql)){ 
        echo "<h3>Successful update. Go back <a href = 'bookings.php'>with this link.</a></h3>";
    } 

    }
?>
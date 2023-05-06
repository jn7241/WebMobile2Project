<link rel="stylesheet" type="text/css" href="style.css">
<?php include("header.html")?>
<?php
session_start();
// Connection creation/Checking
$database = mysqli_connect("localhost", "root", "", "cinema");

if($database === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
/*Why json encoding/decoding? Taking an array and sending it as an
input value is an easy method to check a conditional, 
along with doing other functions as planned*/
$input = json_decode($_POST['delete']);
if(isset($input[1]) && $input[1]== 'manage users'){
    $ID = $input[0];
    $sql = "DELETE FROM USERS WHERE id = $ID"; 
    if($result = mysqli_query($database, $sql)){ 
        echo "<h3>Successful Deletion. Go back <a href = 'bookings.php'>with this link.</a></h3>";
    } 
}
elseif(isset($input[1]) && $input[1]== 'manage location'){
    $ID = $input[0];
    $sql = "DELETE FROM BOOKINGS WHERE id = $ID"; 
    if($result = mysqli_query($database, $sql)){ 
        echo "<h3>Successful Deletion. Go back <a href = 'bookings.php'>with this link.</a></h3>";
    } 
    
}
else{
    $ID = $input[0];
    $sql = "DELETE FROM BOOKINGS WHERE id = $ID"; 
    if($result = mysqli_query($database, $sql)){ 
        echo "<h3>Successful Deletion. Go back <a href = 'bookings.php'>with this link.</a></h3>";
    } 
}
?>
<?php include("footer.html")?>
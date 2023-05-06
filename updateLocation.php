<?php
session_start();
if ((isset($_POST['submitLocation'])) && (isset($_POST['city']) || (isset($_POST['theater'])))){
    // Connection creation/Checking
    $database = mysqli_connect("localhost", "root", "", "cinema");

    if($database === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
    $ID = $_SESSION['input'][0];
    $city = $_POST['city'];
    $theater = $_POST['theater'];
    $sql = "UPDATE BOOKINGS SET location= '$city', theater ='$theater' WHERE id = '$ID'"; 
    if($result = mysqli_query($database, $sql)){ 
    echo "<h3>Successful update. Go back <a href = 'bookings.php'>with this link.</a></h3>";
} 
}
?>
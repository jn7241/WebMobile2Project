<?php
session_start();
if ((isset($_POST['submitBooking']))){
    $database = mysqli_connect("localhost", "root", "", "cinema");

    if($database === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
    $ID = $_SESSION['input'][0];
    
    $name = $_POST['name']; 
    
    
    $title = $_POST['title'];
    
    
    $theater = $_POST['theater'];
    
    
    $price = floatval($_POST['price']);
    
    $location = $_POST['city'];
    
    
    $city = $_POST['city'];
    
    $sql = "UPDATE BOOKINGS SET name= '$name', title = '$title', theater ='$theater', price = $price, location = '$location' WHERE id = '$ID'"; 
    if($result = mysqli_query($database, $sql)){ 
    echo "<h3>Successful update. Go back <a href = 'bookings.php'>with this link.</a></h3>";
    
} 
}
?>
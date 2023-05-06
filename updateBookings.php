<?php
session_start();
if ((isset($_POST['submit']))){
    $ID = $_SESSION['input'][0];
    if (isset($_POST['name'])){
        $name = $_POST['name']; 
    }
    elseif (isset($_POST['title'])){
        $title = $_POST['title'];
    }
    elseif (isset($_POST['theater'])){
        $theater = $_POST['theater'];
    }
    elseif (isset($_POST['price'])){
        $price = floatval($_POST['price']);
    }
    elseif (isset($_POST['location'])){
        $location = $_POST['location'];
    }
    elseif (isset($_POST['city'])){
        $city = $_POST['city'];
    }
    $sql = "UPDATE BOOKINGS SET name= '$name', title = '$title', theater ='$theater', price = $price, city = '$city' WHERE id = '$ID'"; 
    if($result = mysqli_query($database, $sql)){ 
    echo "<h3>Successful update. Go back <a href = 'bookings.php'>with this link.</a></h3>";
} 
}
?>
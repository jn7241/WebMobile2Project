<?php
if (!isset($_SESSION['loginId'])){
    header("location: login.php");
}
if (isset($_POST['add'])){
    session_start();
    $number = $_POST['add'];
    // Connection creation/Checking
    $database = mysqli_connect("localhost", "root", "", "cinema");

    if($database === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $sql1 = "SELECT * FROM showtimes WHERE id = $number";
    $result = mysqli_query($database, $sql1);
    $row =  mysqli_fetch_array($result);
    $title = $row['title'];
    $theater = $row['theater'];
    $start_time = $row['start_time'];
    $end_time = $row['end_time'];
    $price = $row['price'];
    $location = $row['location'];

    $checksql = "SELECT * FROM BOOKINGS WHERE id =$number";
    $result = mysqli_query($database, $checksql);
    $row =  mysqli_fetch_array($result);
    
    if((isset($row['id']) && $number == $row['id'])){
        echo "<link rel='stylesheet' type='text/css' href='style.css'>";
        include("header.html");
        echo "<h2>You've already booked this movie. Click <a href = 'loggedInPage.php'>here</a> to go back to showtimes</h2>";
        include("footer.html");
        return 0;
    }
    else{
    $name = $_SESSION['loginName'];
    $sql2 = "INSERT INTO BOOKINGS VALUES('$number', '$name', '$title','$theater','$start_time','$end_time','$price','$location')";

    if($result = mysqli_query($database, $sql2)){
        echo "<link rel='stylesheet' type='text/css' href='style.css'>";
        include("header.html");
        echo "<h2>You've successfully booked this movie. Click here to check all your <a href = 'bookings.php'>bookings.</a></h2>";
        include("footer.html");
    }
    else{
        echo "ERROR: Could not able to execute $sql2. " . mysqli_error($database);
    }
    }
}
?>

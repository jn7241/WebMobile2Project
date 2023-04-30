<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Bookings</title>
</head>
<body>
<?php include('header.html');?>
<?php

// Check if the form is submitted
if(isset($_POST['submit'])){


    $conn = mysqli_connect("localhost", "root", "", "cinema");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get the selected showtime ID from the form
    $showtime_id = $_POST['showtime_id'];

    // Get the showtime details from the database
    $sql = "SELECT * FROM showtimes WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $showtime_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check if the showtime exists
    if(mysqli_num_rows($result) > 0){

        // Fetch the showtime details
        $showtime = mysqli_fetch_assoc($result);
// Check if the form is submitted
if(isset($_POST['submit'])){
        // Insert the showtime into the bookings table
        $sql = "INSERT INTO bookings (title, theater, start_time, end_time, price, location) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssssds", $showtime['title'], $showtime['theater'], $showtime['start_time'], $showtime['end_time'], $showtime['price'], $showtime['location']);
        mysqli_stmt_execute($stmt);
}




        // Display a success message to the user
        echo "You have successfully booked the following showtime: <br>";
        echo "Film: " . $showtime['title'] . "<br>";
        echo "Theater: " . $showtime['theater'] . "<br>";
        echo "Start time: " . $showtime['start_time'] . "<br>";
        echo "End time: " . $showtime['end_time'] . "<br>";
        echo "Price: " . $showtime['price']. "<br>";
        echo "Location: " . $showtime['location']. "<br><br>";

    } else {
        // If the showtime doesn't exist, display an error message to the user
        echo "The selected showtime does not exist.";
    }

} else {
    // If the form is not submitted, redirect the user back to the homepage
    header("Location: index.php");
    exit();
}
// Close the statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
// Get all bookings from the bookings table
$conn = mysqli_connect("localhost", "root", "", "cinema");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM bookings";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
    // Display bookings in a table
    echo "<h1>All Bookings</h1>";
    echo "<table>";
    echo "<tr><th>Title</th><th>Theater</th><th>Start Time</th><th>End Time</th><th>Price</th><th>Location</th></tr>";
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['theater'] . "</td>";
        echo "<td>" . $row['start_time'] . "</td>";
        echo "<td>" . $row['end_time'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['location'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No bookings found.";
}

// Close the connection
mysqli_close($conn);


?>
<?php include('footer.html');?>

</body>
</html>
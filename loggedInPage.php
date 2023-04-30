<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Page</title></head>
<link rel="stylesheet" type="text/css" href="style.css">
<body>
<?php include('header.html');?>
<?php

// Create connection
$conn = mysqli_connect("localhost", "root", "", "cinema");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query the showtimes table
$sql = "SELECT * FROM showtimes";
$result = $conn->query($sql);

// Check if any results were returned
if ($result->num_rows > 0) {
    // Display the results in a table
    echo "<table>";
    echo "<tr><th>ID</th><th>Film</th><th>Theater</th><th>Start Time</th><th>End Time</th><th>Price</th><th>Location</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["title"]."</td><td>".$row["theater"]."</td><td>".$row["start_time"]."</td><td>".$row["end_time"]."</td><td>".$row["price"]."</td><td>".$row["location"]."</td><td><form method='post' action='bookings.php'><input type='hidden' name='showtime_id' value='".$row["id"]."'><input type='submit' name='submit' value='Book'></form></td></tr>";
    }
    echo "</table>";
} else {
    echo "No results found.";
}

// Close the database connection
$conn->close();

?>

<?php include('footer.html');?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<body>

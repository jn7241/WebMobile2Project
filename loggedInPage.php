<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Booking System</title></head>
<link rel="stylesheet" type="text/css" href="style.css">
<body>
<?php include('header.html');?>
<style>
.green_button{
    color:green;
    background-color: green;
    max-width:20px;
}
</style>
<?php
session_start();
// Connection creation/Checking
$database = mysqli_connect("localhost", "root", "", "cinema");

if($database === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(!isset($_SESSION['loginId'])){
    header('location: login.php');
    $sql = "SELECT * FROM showtimes";
if($result = mysqli_query($database, $sql)){
    if(mysqli_num_rows($result) > 0){
echo "<table class = 'showtimes'>";
echo "<tr><th>id</th><th>title</th><th>theater</th><th>start time</th><th>end time</th><th>price</th><th>location</th><th>Book</th></tr>";


while($row = mysqli_fetch_array($result)){
    $id_number = $row['id']; 
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['title'] . "</td>";
    echo "<td>" . $row['theater'] . "</td>";
    echo "<td>" . $row['start_time'] . "</td>";
    echo "<td>" . $row['end_time'] . "</td>";
    echo "<td>" . $row['price'] . "</td>";
    echo "<td>" . $row['location'] . "</td>";
    echo "<td><form method = 'POST' action = 'BookingProcessing.php'><input style = 'color:green;background-color:green; max-width:20px;'  type='submit' name ='add' value='$id_number'/></form></td>";
    echo "</tr>";
    }

echo "</table>";

    }
    else{
        echo "No records matching your query were found.";
        }
        } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
}


// Query the showtimes table
echo "<h3> Hello, ". $_SESSION['loginName']. ".  Here are the showtimes: </h3>";
$sql = "SELECT * FROM showtimes";
if($result = mysqli_query($database, $sql)){
    if(mysqli_num_rows($result) > 0){
echo "<table class = 'showtimes'>";
echo "<tr><th>id</th><th>title</th><th>theater</th><th>start time</th><th>end time</th><th>price</th><th>location</th><th>Book</th></tr>";


while($row = mysqli_fetch_array($result)){
    $id_number = $row['id']; //works
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['title'] . "</td>";
    echo "<td>" . $row['theater'] . "</td>";
    echo "<td>" . $row['start_time'] . "</td>";
    echo "<td>" . $row['end_time'] . "</td>";
    echo "<td>" . $row['price'] . "</td>";
    echo "<td>" . $row['location'] . "</td>";
    echo "<td><form method = 'POST' action = 'BookingProcessing.php'><input style = 'color:green;background-color:green; max-width:20px;'  type='submit' name ='add' value='$id_number'/></form></td>";
    echo "</tr>";
    }

echo "</table>";

    }
    else{
        echo "No records matching your query were found.";
        }
        } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
?>

<?php include('footer.html');?>
</body>
</html>


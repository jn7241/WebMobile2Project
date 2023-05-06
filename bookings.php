<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Booking System</title></head>
<link rel="stylesheet" type="text/css" href="style.css">
<style>
    label{
        font-size:11px;
        font-family:impact;
        margin:auto;
    }
</style>
<body>
<?php include('header.html');?>
<?php
session_start();
if(!isset($_SESSION['loginId'])){
    header('location: login.php');
}
// Connection creation/Checking
$database = mysqli_connect("localhost", "root", "", "cinema");

if($database === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


//Staff booking implementation
if((preg_match($_SESSION['staffMail'], $_SESSION['email'])) == 1){

    
    echo "<h2>Staff management page</h2><br><h4>type all to see everything. If you want default editing after searching, go down.<h4>";
    echo "
    <form method = 'POST'>
    <input type = 'text' name = 'specifyUser' label = 'specify a user'>
     
    <input type = 'submit' name = 'submitUser' value = 'manage users'>
    </form>
    <br>
    <form method = 'POST'>
    <input type = 'text' name = 'specifyLocation' label = 'specify a user'>
     
    <input type = 'submit' name = 'submitLocation' value = 'manage location' placeholder ='all'>
    </form>
        ";


//manage by users
    if (isset($_POST['submitUser'])){
        
        if($_POST['specifyUser'] == 'all'){
        $sql = "SELECT * FROM users where email NOT LIKE '%@starcinema.com'";
        }
        else{
            $name = $_POST['specifyUser'];
            $sql = "SELECT * FROM users where email NOT LIKE '%@starcinema.com' AND name = '$name' ";
        }
    if($result = mysqli_query($database, $sql)){
    if(mysqli_num_rows($result) > 0){
    echo "<table class = 'showtimes'>";

    echo "<tr><th>id</th><th>name</th><th>email</th><th>Manage</th></tr>";


while($row = mysqli_fetch_array($result)){
    $input_array = json_encode([$row['id'], $_POST['submitUser']]); 
    echo "<td>" . $row['id'] . "</td>"; 

    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    
    echo "<td>
    <form method = 'post' action = 'update.php'>
    <label>Edit</label>&nbsp
    <input style = 'color:yellow; background-color:yellow; max-width:20px;' type = 'submit' name = 'update' value = '{$input_array}'>
    </form>
    ";
    
    echo "<br>
    <form method = 'post' action = 'delete.php'>
    <label>Delete</label>&nbsp
    <input style = 'color:red; background-color:red; max-width:20px;' type = 'submit' name = 'delete' value = '{$input_array}'>
    </form></td>
    ";
    echo "</tr>";
}
echo "</table>";

}
    

else{
    echo "No records matching your query were found.";
    }
    } else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
} }


//if you manage by location
if (isset($_POST['submitLocation'])){

    if($_POST['specifyLocation'] == "all"){
    $sql = "SELECT * FROM bookings ORDER BY location";
    }
    else{
        $location = $_POST['specifyLocation'];
        $sql = "SELECT * FROM BOOKINGS where location = '$location' ";
    }
    if($result = mysqli_query($database, $sql)){
        if(mysqli_num_rows($result) > 0){
        echo "<table class = 'showtimes'>";
        echo "<tr><th>Booking Number</th><th>name</th><th>title</th><th>theater</th><th>start time</th><th>end time</th><th>price</th><th>location</th><th>Manage</th></tr>";
    
    
    while($row = mysqli_fetch_array($result)){
        $input_array = json_encode([$row['id'], $_POST['submitLocation']]); 
        echo "<td>" . $row['id'] . "</td>"; 
        echo "<td>" . $row['name'] . "</td>"; 
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['theater'] . "</td>";
        echo "<td>" . $row['start_time'] . "</td>";
        echo "<td>" . $row['end_time'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['location'] . "</td>";
        echo "<td>
        <form method = 'post' action = 'update.php'>
        <label>Edit</label>&nbsp
        <input style = 'color:yellow; background-color:yellow; max-width:20px;' type = 'submit' name = 'update' value = '{$input_array}'>
        </form>
        ";
        
        echo "<br>
        <form method = 'post' action = 'delete.php'>
        <label>Delete</label>&nbsp
        <input style = 'color:red; background-color:red; max-width:20px;' type = 'submit' name = 'delete' value = '{$input_array}'>
        </form></td>
        ";
        echo "</tr>";
    }
    
    echo "</table>"; 
    
    }  else{
        echo "No records matching your query were found.";

        }
        } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

    } 

}
//default
if((!isset($submitLocation)) && (!isset($submitUser))){
    echo "<br><h4>All bookings (Default)</h4>";
    $sql = "SELECT * FROM bookings";
    if($result = mysqli_query($database, $sql)){
        if(mysqli_num_rows($result) > 0){
    echo "<table class = 'showtimes'>";
    echo "<tr><th>Booking Number</th><th>Name</th><th>title</th><th>theater</th><th>start time</th><th>end time</th><th>price</th><th>location</th><th>Manage</th></tr>";
    
    
    while($row = mysqli_fetch_array($result)){
        $input_array = json_encode([$row['id']]); //conceptually I defined this as an array, so 
        echo "<td>" . $row['id'] . "</td>"; 
        echo "<td>" . $row['name'] . "</td>"; 
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['theater'] . "</td>";
        echo "<td>" . $row['start_time'] . "</td>";
        echo "<td>" . $row['end_time'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['location'] . "</td>";
       
        echo "<td>
        <form method = 'post' action = 'update.php'>
        <label>Edit</label>&nbsp
        <input style = 'color:yellow; background-color:yellow; max-width:20px;' type = 'submit' name = 'update' value = '{$input_array}'>
        </form>
        ";
        
        echo "<br>
        <form method = 'post' action = 'delete.php'>
        <label>Delete</label>&nbsp
        <input style = 'color:red; background-color:red; max-width:20px;' type = 'submit' name = 'delete' value = '{$input_array}'>
        </form></td>
        ";
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

    }



 // staff options end here
else{
// Query the bookings table for the user
echo "<h3> Hello, ". $_SESSION['loginName']. ".  Here are your bookings: </h3>";
$name= $_SESSION['loginName'];
$sql = "SELECT * FROM bookings WHERE name = '$name'";
if($result = mysqli_query($database, $sql)){
    if(mysqli_num_rows($result) > 0){
echo "<table class = 'showtimes'>";
echo "<tr><th>Booking Number</th><th>title</th><th>theater</th><th>start time</th><th>end time</th><th>price</th><th>location</th></tr>";


while($row = mysqli_fetch_array($result)){
    echo "<td>" . $row['id'] . "</td>"; 
    echo "<td>" . $row['title'] . "</td>";
    echo "<td>" . $row['theater'] . "</td>";
    echo "<td>" . $row['start_time'] . "</td>";
    echo "<td>" . $row['end_time'] . "</td>";
    echo "<td>" . $row['price'] . "</td>";
    echo "<td>" . $row['location'] . "</td>";
    echo "</tr>";
}

echo "</table>";

echo "want to cancel a booking? Contact a staff member with this email: admin@starcinema.com";

    }
    else{
        echo "No records matching your query were found.";
        }
        } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }
?>

<?php include('footer.html');?>
</body>
</html>

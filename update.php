<link rel="stylesheet" type="text/css" href="style.css">
<?php include("header.html")?>

<h3>update entry</h3>
<br>
<?php
session_start();
// Connection creation/Checking

$database = mysqli_connect("localhost", "root", "", "cinema");

if($database === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


/*Why json encoding/decoding? Taking an array and sending it as an
input value is an easy method to check a conditional, 
along with doing other functions as planned.
A reload from the submit button shows the need of a session variable
*/
if(!isset($_POST['submit'])){
$_SESSION['input'] = json_decode($_POST['update']);
}
//edit users
if( isset($_SESSION['input'][1]) && $_SESSION['input'][1] == 'manage users'){
    echo "<h5>Choose values to change. Only change user info when you are requested by the user.</h5>";

    echo "
<form method = 'POST'>
		
		<label>name:</label>
        <input type = 'text' name = 'name'>
        <br><br>
		<label>email:</label>
        <input type = 'email' name = 'email'>
        <br><br>
		<input type = 'submit' name = 'submit' value = 'Submit'>
</form>";
    if (isset($_POST['submit'])){
    $ID = $_SESSION['input'][0];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sql = "UPDATE USERS SET name= '$name', email ='$email' WHERE id = '$ID'"; 
    if($result = mysqli_query($database, $sql)){ 
        echo "<h3>Successful update. Go back <a href = 'bookings.php'>with this link.</a></h3>";
    } 
    }
    
}
//edit location
elseif( isset($_SESSION['input'][1]) && $_SESSION['input'][1]== 'manage location'){
    
    echo "
    <form method = 'POST'>
		<label>City (change if listed city in booking card is wrong):</label>
        <select name='city'>
        <option>Prishtina</option>
        <option>Prizren</option>
        </select>
        <br><br>
		<label>Theater:</label>
        <select name='theater'>
        <option>Main Theater</option>
        <option>Side Theater</option>
        </select>
        <br><br>
		<input type = 'submit' name = 'submit' value = 'Submit'>
    </form>";


    if ((isset($_POST['submit'])) && (isset($_POST['city']) || (isset($_POST['theater'])))){
        $ID = $_SESSION['input'][0];
        $city = $_POST['city'];
        $theater = $_POST['theater'];
        $sql = "UPDATE BOOKINGS SET location= '$city', theater ='$theater' WHERE id = '$ID'"; 
        if($result = mysqli_query($database, $sql)){ 
        echo "<h3>Successful update. Go back <a href = 'bookings.php'>with this link.</a></h3>";
    } 
    }

 
}
//edit booking
else{

echo "
<form method = 'POST' action>
		<label>name:</label>
        <input type = 'text' name = 'name'>
        <br><br>
		<label>title:</label>
        <input type = 'text' name = 'title'>
        <br><br>
		<label>theater:</label>
        <select name='theater'>
        <option>Main Theater</option>
        <option>Side Theater</option>
        </select>
        <br><br>
        <label>price:</label>
        <input type = 'text' name = 'price'>
        <br><br>
        <label>location:</label>
        <select name='city'>
        <option>Prishtina</option>
        <option>Prizren</option>
        </select>
        <br><br>
		<input type = 'submit' name = 'submit' value = 'Submit'>
</form>";
}
if ((isset($_POST['submit']))){
    $ID = $_SESSION['input'][0];
   
    $name = $_POST['name']; 
    
   
    $title = $_POST['title'];
    
   
    $theater = $_POST['theater'];
    
    
    $price = floatval($_POST['price']);
    
    
    
    
    $city = $_POST['city'];
    
    $sql = "UPDATE BOOKINGS SET name= '$name', title = '$title', theater ='$theater', price = $price, location = '$city' WHERE id = '$ID'"; 
    if($result = mysqli_query($database, $sql)){ 
    echo "<h3>Successful update. Go back <a href = 'bookings.php'>with this link.</a></h3>";
} 
}
?>
<?php include("footer.html")?>



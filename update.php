<link rel="stylesheet" type="text/css" href="style.css">
<?php include("header.html")?>

<h3>update entry</h3>
<br>
<?php
session_start();

/*Why json encoding/decoding? Taking an array and sending it as an
input value is an easy method to check a conditional, 
along with doing other functions as planned.
A reload from the submit button shows the need of a session variable.
To prevent conflict caused by POST method reloads, the update features
are split into multiple files.
*/

$_SESSION['input'] = json_decode($_POST['update']);

//edit users
if( isset($_SESSION['input'][1]) && $_SESSION['input'][1] == 'manage users'){
    echo "<h5>Write a new value. Only change user info when you are requested by the user.</h5>";

    echo "
<form method = 'POST' action = 'updateUser.php'>
		
		<label>name:</label>
        <input type = 'text' name = 'name'>
        <br><br>
		<label>email:</label>
        <input type = 'email' name = 'email'>
        <br><br>
		<input class = 'submit_button' type = 'submit' name = 'submitUser' value = 'Submit'> 
</form>";

}
//edit location
elseif(isset($_SESSION['input'][1]) && $_SESSION['input'][1]== 'manage location'){
    echo "
    <form method = 'POST' action = 'updateLocation.php'>
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
		<input class = 'submit_button' type = 'submit' name = 'submitLocation' value = 'Submit'>
    </form>"; 
    
}
//edit booking
elseif(isset($_SESSION['input'][0])){

echo "
<form method = 'POST' action = 'updateBookings.php'>
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
		<input class = 'submit_button' type = 'submit' name = 'submitBooking' value = 'Submit'>
</form>";
}
else{
    header("Location: bookings.php");
}

?>
<?php include("footer.html")?>



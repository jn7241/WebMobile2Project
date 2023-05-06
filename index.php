<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Welcome to CinemaChain</title>
	<!--The CSS file needs reloading, due to cache issues.
	Please reload the page with CTRL + F5 if you end up not 
	seeing any styling.
	https://stackoverflow.com/questions/50662906/my-css-file-not-working-in-my-php-file
-->
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include 'header.html'; ?>
		<main>
			<h2 style = "text-decoration:underline; font-family:impact;">Welcome to StarCinema</h2>
			<!-- Featured movies section -->
			<section>
				<h3>Featured Movies</h3>
				<ul>
				<img src = "preview1.jpg" width = '350px' height = '500px' alt = "The Godfather">
					<li>
						<h3 class = "preview">The Godfather</h3>
						<p>The aging patriarch of an organized crime dynasty in postwar New York City transfers control of his clandestine empire to his reluctant youngest son.</p>
					</li>
					<img src = "preview2.jpg" width = '350px' height = '500px' alt = "Forest Gump">
					<li>
						<h3 class = "preview">Forrest Gump</h3>
						<p>The presidencies of Kennedy and Johnson, the Vietnam War, the Watergate scandal and other historical events unfold from the perspective of an Alabama man with an IQ of 75, whose only desire is to be reunited with his childhood sweetheart.</p>
					</li>
					<img src = "preview3.jpg" width = '350px' height = '500px' alt = "Shawshank Redemption">
					<li>
						<h3 class = "preview">Shawshank Redemption</h3>
						<p>Over the course of several years, two convicts form a friendship, seeking consolation and, eventually, redemption through basic compassion.</p>
					</li>
				</ul>
			</section>
			<!-- Showtimes section (More info on loggedInPage.php)-->
			<br>
			<section>
				<h3 style = "font-family:impact; font-size:1.2em;">Book a seat for our featured movies:<h3>
				<?php
				// Connection creation/Checking
				$database = mysqli_connect("localhost", "root", "", "cinema");

				if($database === false){
    			die("ERROR: Could not connect. " . mysqli_connect_error());
				}
				$sql = "SELECT * FROM showtimes WHERE title = 'The Godfather' or title = 'Forrest Gump' or title = 'The Shawshank Redemption'";
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
					echo "<td><form method = 'POST' action = 'BookingProcessing.php'><input class = 'green_button' type='submit' name ='add' value='$id_number'/></form></td>";
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
			</section>
			<!-- Special offers/promotions section -->
			<section style = "color:gold;">
				<h3>Special Offers</h3>
				<p>Check out our current special offers and promotions:</p>
				<ul>
					<li>Discounted tickets on Tuesdays</li>
					<li>Free popcorn with any large drink purchase</li>
					<li>Sign up for our loyalty program and get a free movie ticket</li>
				</ul>
			</section>
			<!-- Testimonials/reviews section -->
			<section style = "font-family:'Didot'; font-style:italic; color:white;">
				<h3>What Customers Are Saying</h3>
				<blockquote>"I love StarCinema! The seats are so comfortable and the popcorn is always fresh. I come here every week!"</blockquote>
				<blockquote>"Great cinema chain with a variety of movies and convenient locations. Highly recommend!"</blockquote>
				<blockquote>"StarCinema is the perfect place for a date night or a night out with friends. The atmosphere is great and the movies are always top-notch."</blockquote>
			</section>
		</main>
	<?php include 'footer.html'; ?>
</body>
</html>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Welcome to CinemaChain</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include 'header.html'; ?>
		<main>
			<h2>Welcome to CinemaChain</h2>
			<!-- Featured movies section -->
			<section>
				<h3>Featured Movies</h3>
				<ul>
					<li>
						<img src="movie1.jpg" alt="Movie 1">
						<h4>Movie 1</h4>
						<p>A brief description of Movie 1.</p>
					</li>
					<li>
						<img src="movie2.jpg" alt="Movie 2">
						<h4>Movie 2</h4>
						<p>A brief description of Movie 2.</p>
					</li>
					<li>
						<img src="movie3.jpg" alt="Movie 3">
						<h4>Movie 3</h4>
						<p>A brief description of Movie 3.</p>
					</li>
				</ul>
			</section>
			<!-- Showtimes section -->
			<section>
				<h3>Showtimes</h3>
				<table>
					<thead>
						<tr>
							<th>Movie</th>
							<th>Location</th>
							<th>Showtimes</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Movie 1</td>
							<td>City 1</td>
							<td>1:00pm, 4:00pm, 7:00pm</td>
						</tr>
						<tr>
							<td>Movie 2</td>
							<td>City 2</td>
							<td>2:00pm, 5:00pm, 8:00pm</td>
						</tr>
						<tr>
							<td>Movie 3</td>
							<td>City 3</td>
							<td>3:00pm, 6:00pm, 9:00pm</td>
						</tr>
					</tbody>
				</table>
			</section>
			<!-- Special offers/promotions section -->
			<section>
				<h3>Special Offers</h3>
				<p>Check out our current special offers and promotions:</p>
				<ul>
					<li>Discounted tickets on Tuesdays</li>
					<li>Free popcorn with any large drink purchase</li>
					<li>Sign up for our loyalty program and get a free movie ticket</li>
				</ul>
			</section>
			<!-- Testimonials/reviews section -->
			<section>
				<h3>What Customers Are Saying</h3>
				<blockquote>"I love CinemaChain! The seats are so comfortable and the popcorn is always fresh. I come here every week!"</blockquote>
				<blockquote>"Great cinema chain with a variety of movies and convenient locations. Highly recommend!"</blockquote>
				<blockquote>"CinemaChain is the perfect place for a date night or a night out with friends. The atmosphere is great and the movies are always top-notch."</blockquote>
			</section>
		</main>
	<?php include 'footer.html'; ?>
</body>
</html>


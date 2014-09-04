<?php 
	include 'inc/config.php';
	include 'inc/db.php'
?>
<!DOCTYPE html>
	<html>
		<head>
			<meta charset="UTF-8">
			<link rel="stylesheet" type="text/css" href="css/normalize.css">
			<link rel="stylesheet" type="text/css" href="css/grid.css">
			<link rel="stylesheet" type="text/css" href="css/main.css">
			<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
			<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		</head>			

		<body>

			<!-- The Wrapper Div will center the page-->

			<div id="wrapper">

				<header>
					<div class="grid-container">
						<div class="grid-2" id="logo">
							<h1>Kentucky Local Boxing Committee</h1>
						</div>
						<nav class="grid-8">
							<!--Navigation Links -->
							<ul>
								<li><a href="index.php">Home</a></li>
								<li><a href="pages/gyms.php">Gyms</a></li>
								<li>Athletes</li>
									<ul>
										<li><a href="pages/national_champions.php">National Champions</a></li>
									</ul>
								<li>Officals</li>
									<ul>
										<li><a href="pages/officers.php">Officers</a></li>
										<li><a href="pages/coaches.php">Coaches</a></li>
										<li><a href="pages/officials.php">Officials</a></li>
									</ul>
								<li>Events</li>
									<ul>
										<li><a href="pages/upcoming.php">Upcoming</a></li>
										<li><a href="pages/results.php">Results</a></li>
									</ul>
							
							</ul>
						</nav>
					</div>
				</header>

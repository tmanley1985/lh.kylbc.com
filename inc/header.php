<?php 
	session_start();

	$inactive = 600;
	 
	// check to see if $_SESSION["timeout"] is set
	if (isset($_SESSION["timeout"])) {
	    // calculate the session's "time to live"
	    $sessionTTL = time() - $_SESSION["timeout"];
	    if ($sessionTTL > $inactive) {
	        header("Location: logout.php");
	    }
	}
 
	$_SESSION["timeout"] = time();

	//Check to see if the session is set and if so sets the admin session to true
	if(isset($_SESSION['authorized'])){
		$_SESSION['admin'] = true;
	}
	require 'inc/config.php';
	require 'inc/db.php';
	require 'Model.php';
	require 'Admin.php';
?>
<!DOCTYPE html>
	<html>
		<head>
			<meta charset="UTF-8">
			<title>Kentucky Local Boxing Committee</title>
			<link rel="stylesheet" type="text/css" href="css/normalize.css">
			<link rel="stylesheet" type="text/css" href="css/grid.css">
			<link rel="stylesheet" type="text/css" href="css/main.css">
			<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
			<link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'>
			<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" ></script>
			<script src="js/responsiveslides/responsiveslides.min.js"></script>
		</head>			

		<body>

			<!-- The Wrapper Div will center the page-->

			<div id="wrapper">

				<header>
					<div class="grid-container">
						<div class="grid-4" id="logo">
							<h1>Kentucky Local Boxing Committee</h1>
						</div>
						<nav class="grid-6">
							<!--Navigation Links -->
			
							<ul>
								<li><a href="index.php">Home</a></li>
								<li><a href="gyms.php">Gyms</a></li>
								<li><a href="athletes.php">Athletes</a></li>
								<li><a href="officials.php">Officals</a></li>
								<li><a href="
									events.php">Events</a></li>
							</ul>
						</nav>
						<?php
						//Checks to see if admin session is set and if so lets the admin know 
						//that they are logged in, gives a logout link to destroy the session
						if(isset($_SESSION['admin'])){
							echo '<div class="admin-login">
									<p>Hello, Admin!  </p>
									<p><a href="logout.php">Log Out</a></p>
								</div>';
						}else{
							echo '<div class="admin-login">
									<p><a href="login.php">Sign In</a></p>
								</div>';
						}
						
						?>
						
					</div>
				</header>

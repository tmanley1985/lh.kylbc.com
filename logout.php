<?php 
	require('inc/header.php'); 
	session_destroy(); //destroy the session
	header("location:index.php"); //to redirect back to "index.php" after logging out
	exit();
?>


<?php
	require('inc/footer.php');
?>
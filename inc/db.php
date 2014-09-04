<?php
	try {
		
		$db = new PDO('mysql:host=localhost;dbname=kylbc', USER, PASS);

	} catch (Exception $e) {
		
		echo "Could not connect to the database";
	}
?>
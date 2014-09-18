<?php

	// Gym function

	function get_gyms(){

		try{
			// Instantiate DB Object
			$db = new PDO('mysql:host=localhost;dbname=kylbc', USER, PASS);
			// Variable for the sql
			$sql = "SELECT * FROM gyms";
			$stmt = $db->query($sql);
			$gyms = $stmt->fetchALL(PDO::FETCH_ASSOC);

			return $gyms;

			// Execute query
			}catch(PDOException $e){
				echo $e->getMessage();
			}

	}

	function get_events(){
		try{
			// Instantiate DB Object
			$db = new PDO('mysql:host=localhost;dbname=kylbc', USER, PASS);
			// Variable for the sql
			$sql = "SELECT * FROM events";
			$stmt = $db->query($sql);
			$events = $stmt->fetchALL(PDO::FETCH_ASSOC);

			return $events;

			// Execute query
			}catch(PDOException $e){
				echo $e->getMessage();
			}

	}
	
	function get_coaches(){

	}
	 function get_athletes(){
	 	
	 }
?>
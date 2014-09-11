<?php

	// Gym function

	function get_gyms(){

		try{
			// Variable for the sql
			$sql = "SELECT * FROM gyms";
			$stmt = $db->query($sql);
			$gyms = $stmt->FETCH(PDO::FETCH_ASSOC);

			// Execute query
			}catch(PDOException $e){
				echo $e->getMessage();
			}

	}
	
?>
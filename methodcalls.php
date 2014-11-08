<?php
	require('inc/header.php');
//Calls the delete method
//Check to see whether user is admin, the id and table values are set
	if(isset($_SESSION['admin']) && isset($_POST['id']) && isset($_POST['table'])){
		$id = $_POST['id'];
		$table = $_POST['table'];
		$newDelModel = new Model($db);
		//The delete method takes two parameters, id and table
		$sql_params = $newDelModel->delete($id, $table);

	}

	// Calls the update method
	if(isset($_SESSION['admin'])){
			if(isset($_POST)){
				echo var_dump($_POST);
				$newEditModel = new Model($db);
				$editRec = $newEditModel->update($_POST);
			}

		}
		

	require('inc/footer.php');
?>
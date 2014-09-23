<?php
	require('inc/header.php');
?>
<div class="grid-container">
	<table class="grid-12">
		<tr>
			<th>Gym</th>
			<th>Coach</th>
			<th>Address</th>
			<th>Number</th>
			<th>Website</th>
		</tr>
			<?php
					$gym = new Model($db);
					$gyms = $gym->get_tbl_data('gyms');

					foreach($gyms as $gym){
						echo '<tr>';
						echo '<td>' . $gym['gym'] . '</td>';
						echo '<td>' . $gym['coach'] . '</td>';
						echo '<td>' . $gym['address'] . '</td>';
						echo '<td>' . $gym['number'] . '</td>';
						echo '<td>' . $gym['website'] . '</td>';
						echo '</tr>';
					}

			?>
	</table>
</div>
<?php 
	//Calls a php function to dynamically create the form
?>
<form method="post">

	Gym:     <input type="text" id="gym"     name="gym"><br>
	Coach:   <input type="text" id="coach"   name="coach"><br>
	Address: <input type="text" id="address" name="address"><br>
	Number:  <input type="text" id="number"  name="number"><br>
	Website: <input type="text" id="website" name="website"><br>
	<input type="submit" value="Submit">

</form>
<?php 
	$new_model = new Model($db);
	$sql = $new_model->insert_new_rec($_POST);
	echo $sql;
?>
<?php
	require('inc/footer.php');
?>

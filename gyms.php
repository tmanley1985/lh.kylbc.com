<?php
	require('inc/header.php');
?>
<div class="grid-container">
	<table class="grid-12">
		<tr><?php 
		if(isset($_SESSION['admin']) == true){
			echo '<th>Delete</th>';
			echo '<th>Update</th>';}
			?>
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
						$id = $gym['id'];
						echo '<tr>';
						if(isset($_SESSION['admin']) == true){
							echo '<td class="btn" id=' .  $id . ' onclick="delRecord(this)">Delete?</td>';
							
							echo '<td class="btn" id=' . $id . ' onclick="updateRec(this)">Update?</td>';}
						echo '<td id=' . $id . '>' . $gym['gym'] . '</td>';
						echo '<td id=' . $id . '>' . $gym['coach'] . '</td>';
						echo '<td id=' . $id . '>' . $gym['address'] . '</td>';
						echo '<td id=' . $id . '>' . $gym['number'] . '</td>';
						echo '<td id=' . $id . '>' . $gym['website'] . '</td>';
						echo '</tr>';

					}

			?>
	</table>
</div>
<?php 
	if(isset($_SESSION['admin'])){
		echo '<form method="post">
			<h4>Enter a new Gym!</h4>
			<br>
			<label>Gym:</label><input type="text" id="gym" name="gym"><br>
			<label>Coach:</label><br>
			<input type="text" id="coach" name="coach"><br>
			Address: <input type="text" id="address" name="address"><br>
			Number:  <input type="text" id="number"  name="number"><br>
			Website: <input type="text" id="website" name="website"><br>
			<input type="submit" value="Submit">

			</form>';
			$new_model = new Model($db);
			$sql = $new_model->insert_new_rec($_POST);
			echo $sql;
	}
?>

<script type="text/javascript">
	function delRecord(element){
		
		  	var id = $(element).attr('id');
			$.ajax({
		        url: 'gyms.php',
		        type: 'POST',
		        data: { id: id, table : "gyms"} ,
		        success: function (response) {
		            alert("Record Deleted!");
		        },
		        error: function () {
		            alert("Please Try Again");
		        }
		    })
	}
</script>
<?php
	
	if(isset($_SESSION['admin']) && isset($_POST['id']) && isset($_POST['table'])){
		$id = $_POST['id'];
		$table = $_POST['table'];
		$newDelModel = new Model($db);
	//The delete method takes two parameters
	$sql_params = $newDelModel->delete($id, $table);
}
?>
<script>
//Use the values that are already inside of the table rows to populate inputs
//Then use Jquery to turn table cells into inputs with those values populating the inputs
//Make the Update Button a SEND button

function updateRec(element) {
	//Grabs the id from the element to pass into an ajax request
	var id = $(element).attr('id');
	  //Change the Update Button to a Submit Button.  Removes onclick event.
	  $(element).html('<td class="btn">Submit</td>').addClass('submit').removeAttr('onclick');
	  //Change the Delete Button to a Cancel Button. Removes onclick event.
	  $(element).prev("td").html('<td class="btn cancel"><a class="btn" href="gyms.php">Cancel</a></td>')
	  .addClass('cancel').removeAttr('onclick');

	  //Grabs the table cell and traverses to the next td
   $(element).nextAll('td:not(:first-child)').each(function () {
        var html = $(this).html();
        var input = $('<input type="text" />');
        input.val(html);
        $(this).html(input);
	});
}

 //When the cancel button is clicked the inputs vanish

</script>

<?php
	require('inc/footer.php');
?>

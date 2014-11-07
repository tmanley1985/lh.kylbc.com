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
							
							echo '<td class="btn" id=' . $id . ' onclick="editRec(this)">Edit?</td>';
						}
						echo '<td id=' . $id . ' name="gym">' . $gym['gym'] . '</td>';
						echo '<td id=' . $id . ' name="coach">' . $gym['coach'] . '</td>';
						echo '<td id=' . $id . ' name="address">' . $gym['address'] . '</td>';
						echo '<td id=' . $id . ' name="number">' . $gym['number'] . '</td>';
						echo '<td id=' . $id . ' name="website">' . $gym['website'] . '</td>';
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
			if(isset($_POST)){
				$new_model = new Model($db);
				$sql = $new_model->insert_new_rec($_POST);
				echo $sql;
			}
			
	}
?>

<script>
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
	//Check to see whether user is admin, the id and table values are set
	if(isset($_SESSION['admin']) && isset($_POST['id']) && isset($_POST['table'])){
		$id = $_POST['id'];
		$table = $_POST['table'];
		$newDelModel = new Model($db);
		//The delete method takes two parameters, id and table
		$sql_params = $newDelModel->delete($id, $table);
}
?>

<script>
//Use the values that are already inside of the table rows to populate inputs
//Then use Jquery to turn table cells into inputs with those values populating the inputs
//Make the Edit Button a Submit button

function editRec(element) {
	//Grabs the id from the element to pass into an ajax request
	var id = $(element).attr('id');
	  //Change the Update Button to a Submit Button.  Removes onclick event.
	  $(element).html('Submit').addClass('submit').attr('onclick','submit(this)');
	  	  //$(element).html('<td><input type="submit" value="Submit"</td>').removeAttr('onclick');

	  //Change the Delete Button to a Cancel Button. Removes onclick event.
	  $(element).prev("td").html('<a class="btn" href="gyms.php">Cancel</a>')
	  .addClass('cancel').removeAttr('onclick');

	  //Grabs the table cell and traverses to the next td
   $(element).nextAll('td:not(:first-child)').each(function () {
        var html = $(this).html();
        var input = $('<input type="text" />');
        input.val(html);
        $(this).html(input);
	});
}
</script>

<script>

function submit(element){
	console.log(element);
	//Grab the id
	var id = $(element).attr('id');

	//Sets the id to the value of the id
	var records = {};
	
	//Grabs the input information and loads them into an array
	$(element).nextAll('td').children('input').each(function() {
		
		//Grabs the table data as a parent of the input and grabs the name
		var fieldName = $(this).parent('td').attr('name');
		
		//Grabs the value of the input
		var inputVal = $(this).val();

		//Create a js object with table name as key
		records[fieldName] = inputVal;
		
	});
	console.log(records);
	$.ajax({ 	//Set the parameters as a string via post
		        url: 'gyms.php',
		        type: 'POST',
		        data: records,
		        success: function (response) {
		            alert("Record Updated!");
		        },
		        error: function () {
		            alert("Please Try Again");
		        }
		    });

}

</script>
<?php
	if(isset($_SESSION['admin'])){
		if(isset($_POST)){
			echo var_dump($_POST);
			$newEditModel = new Model($db);
			$editRec = $newEditModel->update($_POST);
		}

	}
	
?>
<?php
	require('inc/footer.php');
?>

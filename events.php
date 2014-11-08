<?php 
	require('inc/header.php'); 
?>
	<table class="grid-10">
		<tr><?php 
		if(isset($_SESSION['admin']) == true){
			echo '<th>Delete</th>';
			echo '<th>Update</th>';}
			?>
			<th>Event</th>
			<th>Promoter</th>
			<th>Date</th>
			<th>Time</th>
			<th>Description</th>
			<th>Address</th>
		</tr>
		<tr>
			<?php
				$event = new Model($db);
				$events = $event->get_tbl_data('events');

			
					foreach($events as $event){
						$id = $event['id'];
						echo '<tr>';
						if(isset($_SESSION['admin']) == true){
							echo '<td class="btn" id=' .  $id . ' onclick="delRecord(this)">Delete?</td>';
							
							echo '<td class="btn" id=' . $id . ' onclick="editRec(this)">Edit?</td>';
						}
						echo '<td id=' . $id . ' name="event">' . $event['event'] . '</td>';
						echo '<td id=' . $id . ' name="promoter">' . $event['promoter'] . '</td>';
						echo '<td id=' . $id . ' name="date">' . $event['date'] . '</td>';
						echo '<td id=' . $id . ' name="time">' . $event['time'] . '</td>';
						echo '<td id=' . $id . ' name="description">' . $event['description'] . '</td>';
						echo '<td id=' . $id . ' name="address">' . $event['address'] . '</td>';
						echo '</tr>';
					}

			?>
		</tr>
	</table>
<?php

if(isset($_SESSION['admin'])){
	echo '<form method="post">
	<h4>Enter a new Event!</h4>
	<br>
	<label>Event:</label><input type="text" id="event"  name="event">
	<label>Promoter:</label><input type="text" id="promoter"   name="promoter">
	<label>Date:</label><input type="text" id="date" name="date">
	<label>Time:</label><input type="text" id="time"  name="time">
	<label>Description:</label><input type="text" id="description" name="description">
	<label>Address: </label><input type="text" id="address" name="address">
	<input type="hidden" id="insertform" name="insertform" value="true">

	<input type="submit" value="Submit">

	</form>';

		if(isset($_POST['insertform'])){
				unset($_POST['insertform']);
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
		        url: 'methodcalls.php',
		        type: 'POST',
		        data: { id: id, table : "events"} ,
		        success: function (response) {
		            window.location.replace('events.php')
		            alert('Record Deleted!');
		        },
		        error: function () {
		            alert("Please Try Again");
		        }
		    })
	}
</script>
<?php
	
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
	  $(element).prev("td").html('<a class="btn" href="events.php">Cancel</a>')
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
	var records = {id: id};
	
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
	$.ajax({ 	
				//Make an AJAX call and send the post array
		        url: 'methodcalls.php',
		        type: 'POST',
		        data: records,
		        success: function (response) {
		        	window.location.replace('events.php');
		            alert("Record Updated!");
		        },
		        error: function () {
		            alert("Please Try Again");
		        }
		    });

}

</script>

<?php
	require('inc/footer.php');
?>
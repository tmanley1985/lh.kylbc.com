<?php 
	require('inc/header.php'); 
?>
	<table class="grid-10">
		<tr>
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
						echo '<tr>';
						echo '<td>' . $event['event'] . '</td>';
						echo '<td>' . $event['promoter'] . '</td>';
						echo '<td>' . $event['date'] . '</td>';
						echo '<td>' . $event['time'] . '</td>';
						echo '<td>' . $event['description'] . '</td>';
						echo '<td>' . $event['address'] . '</td>';
						echo '</tr>';
					}

			?>
		</tr>
	</table>
<form method="post">

	Event:   <input type="text" id="event"   name="event"><br>
	Promoter:   <input type="text" id="promoter"   name="promoter"><br>
	Date: <input type="text" id="date" name="date"><br>
	Time:  <input type="text" id="time"  name="time"><br>
	Description: <input type="text" id="description" name="description"><br>
	Address: <input type="text" id="address" name="address"><br>

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
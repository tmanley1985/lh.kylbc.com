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
		</tr>
		<tr>
			<?php
				$event = new Model($db);
				$events = $event->get_tbl_data('events');

			
					foreach($events as $event){
						echo '<td>' . $event['event'] . '</td>';
						echo '<td>' . $event['promoter'] . '</td>';
						echo '<td>' . $event['date'] . '</td>';
						echo '<td>' . $event['time'] . '</td>';
						echo '<td>' . $event['description'] . '</td>';
					}

			?>
		</tr>
		
	</table>

<?php
	require('inc/footer.php');
?>
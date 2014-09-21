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
	require('inc/footer.php');
?>

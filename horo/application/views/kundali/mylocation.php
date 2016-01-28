
<h2>My Locations</h2>
<p align="right"><a href="/horo2/location">Set New Location</a></p>
<?php
if ($error == 1) {
	?>
<div class="error"><?php echo $error_message; ?></div>
<?php
} else {
	if (empty($records)) {
		?>
<div class="error">No Location Found.</div>
	<?php
	} else {
		?>
		
	<table width="100%" border="0" cellspacing="1" cellpadding="5">
		<tr>
			<td scope="row"><strong>Location Name</strong></td>
			<td><strong>Latitude</strong></td>
			<td><strong>Longitude</strong></td>
			<td><strong>Details</strong></td>
			<td><strong>Daylight Saving</strong></td><!--
			<td><strong>Delete</strong></td> -->
		</tr>
		<?php
		foreach ($records as $rec) {
			?>
	<tr id="<?php echo 'row_location_'.$rec['location_id']; ?>">
		<td scope="row"><?php echo $rec['location_name']; ?></td>
		<td><?php echo $rec['location_lat']; ?></td>
		<td><?php echo $rec['location_lon']; ?></td>
		<td><?php echo $rec['xtra']; ?>, <?php echo $rec['country']; ?></td>
		<td><?php echo $rec['dst']; ?></td><!--
		<td><a href="#" class="del_location" rel="<?php echo $rec['location_id']; ?>">Delete</a></td> -->
	</tr>
			
			<?php
		}
			?>
</table>
			
			<?php
	}
}
?>
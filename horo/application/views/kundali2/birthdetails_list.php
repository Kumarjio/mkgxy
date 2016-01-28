<br />
<?php if (!empty($records)) { ?>
<table width="100%" border="1" cellpadding="5" cellspacing="1">
	<tr>
		<td valign="top" scope="row"><strong>Profile Name</strong></td>
		<td valign="top"><strong>Birth Date</strong></td>
		<td valign="top"><strong>Location</strong></td>
		<td valign="top"><strong>Nakshatra</strong></td>
		<!--<td valign="top"><strong>Delete</strong></td> -->
	</tr>
	<?php foreach ($records as $k => $v) { ?>
	<tr>
		<td valign="top" scope="row"><?php echo $v['bname']; ?></td>
		<td valign="top"><?php echo $v['byear']; ?>-<?php echo $v['bmonth']; ?>-<?php echo $v['bday']; ?> <?php echo $v['bhour']; ?>:<?php echo $v['bmin']; ?></td>
		<td valign="top"><?php echo $v['location_name']; ?></td>
		<td valign="top"><?php echo $v['horo'][7]; ?> (Ref: #<?php echo $v['horo'][9]; ?>)</td>
		<!--<td valign="top">Delete</td> -->
	</tr>
	<?php } ?>
</table>
<?php } ?>
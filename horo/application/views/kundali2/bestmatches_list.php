<br />
<?php if (!empty($records)) { ?>
<table border="1" cellpadding="5" cellspacing="1">
	<tr>
		<td valign="top" scope="row"><strong>Nakshatra</strong></td>
		<td valign="top"><strong>Match Points</strong></td>
	</tr>
	<?php foreach ($records as $k => $v) { ?>
	<tr>
		<td valign="top" scope="row"><?php echo $v['nakshatra']; ?> (Ref: #<?php echo $v['number']; ?>)</td>
		<td valign="top"><?php echo $v['points']; ?></td>
	</tr>
	<?php } ?>
</table>
<?php } ?>
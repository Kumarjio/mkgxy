<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Match</title>
<style type="text/css">
	body {
		font-size:11px;
		font-family:Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif
	}
	.green {
		background-color:green;
		color:white;
	}
	.red {
		background-color:red;
		color:white;
	}
</style>
</head>

<body>
<table width="100%" border="1" cellspacing="1" cellpadding="5">
	<?php foreach ($data['points'] as $return) { ?>
	<tr class="<?php if ($return['points'] >= 25) { ?>green<?php } else if ($return['points'] <= 10) { ?>red<?php }?>">
		<td>Date: <?php echo $return['date']; ?><br>
			<b>Points Matched: </b><?php echo $return['points']; ?><br>
			<?php echo $return['result']; ?>
			<br>
			<strong>Current Nakshatra:</strong> <?php echo $return['day'][7]; ?>
			<br>
		<strong>Your Nakshatra:</strong> <?php echo $return['person'][7]; ?></td>
	</tr>
	<?php } ?>
</table>
</body>
</html>
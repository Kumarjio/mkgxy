<script language="javascript">

$(document).ready(function() {
	$('#frmdailymatches').submit(function() {
		if (!$('#dailymatches_bid').val()) {
			$('#dailymatches_error').html('Please choose profile');
			return false;
		}
		if (!$('#dday').val()) {
			$('#dailymatches_error').html('Please choose day');
			return false;
		}
		if (!$('#dmonth').val()) {
			$('#dailymatches_error').html('Please choose month');
			return false;
		}
		if (!$('#dyear').val()) {
			$('#dailymatches_error').html('Please choose year');
			return false;
		}
		if (!$('#d_location_id').val()) {
			$('#dailymatches_error').html('Please choose location');
			return false;
		}
		$('#dailymatches_error').html(loadingicon);
		params = $('#frmdailymatches').serialize();

		url = "/horo/dailymatchespost";
		var jqxhr = $.post(url, params, function(data) {
			if (data.error == 1) {
				$('#dailymatches_error').html(data.error_message);
				return false;
			}
			$('#dailymatches_list').html(data.html);
			$('#dailymatches_error').html('');
		})
		.error(function() { alert("Could not connect. Please try again later."); })
		return false;
	});
});
</script>
<fieldset>
	<legend><strong>Daily Matches</strong></legend>
<form name="frmdailymatches" id="frmdailymatches" method="post" action="">
<div class="error" id="dailymatches_error"></div>
	<p><strong>Choose Profile</strong>
<select name="bid" id="dailymatches_bid">
<?php if (!empty($profiles)) {
	foreach ($profiles as $k => $v) { ?>
	<option value="<?php echo $v['bid']; ?>"><?php echo $v['bname']; ?></option>
	<?php
	}
}
?>
</select>
	</p>
	<p><strong>From Day:</strong>
<input type="text" name="dday" id="dday" value="<?php echo gmdate('d'); ?>" />
	<strong>Month: </strong>
<input type="text" name="dmonth" id="dmonth" value="<?php echo gmdate('n'); ?>" />
	<strong>Year:	</strong>
	<input type="text" name="dyear" id="dyear" value="<?php echo gmdate('Y'); ?>" />
	</p>
	<p><strong>Frequency:</strong>
<select name="frequency" id="frequency">
	<option value="1">1 Hour</option>
	<option value="2">2 Hour</option>
	<option value="3">3 Hour</option>
	<option value="4" selected="selected">4 Hour</option>
	<option value="6">6 Hour</option>
	<option value="8">8 Hour</option>
	<option value="12">12 Hour</option>
	<option value="24">24 Hour</option>
</select>
	</p>
	<!--
	<p><strong>Hour:		</strong>
		<input type="text" name="dhour" id="dhour" value="<?php echo gmdate('H'); ?>" />
		<strong>Minute:</strong>
<input type="text" name="dmin" id="dmin" value="<?php echo gmdate('i'); ?>" />
	</p> -->
	<p><strong>Location: </strong>
		<select name="location_id" id="d_location_id">
			<?php if (!empty($location)) {
	foreach ($location as $k => $v) { ?>
			<option value="<?php echo $v['location_id']; ?>"><?php echo $v['location_name']; ?></option>
			<?php
	}
}
?>
		</select>
	</p>
<input type="submit" value="Show Daily Matches" />
</form>
	</fieldset>
<div id="dailymatches_list">
</div>
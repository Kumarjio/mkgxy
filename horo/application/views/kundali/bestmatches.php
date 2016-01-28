<script language="javascript">

$(document).ready(function() {
	$('#frmbestmatches').submit(function() {
		if (!$('#bestmatches_bid').val()) {
			$('#bestmatches_error').html('Please choose profile');
			return false;
		}
		$('#bestmatches_error').html(loadingicon);
		params = $('#frmbestmatches').serialize();

		url = "/horo/bestmatchespost";
		var jqxhr = $.post(url, params, function(data) {
			if (data.error == 1) {
				$('#bestmatches_error').html(data.error_message);
				return false;
			}
			$('#bestmatches_list').html(data.html);
			$('#bestmatches_error').html('');
		})
		.error(function() { alert("Could not connect. Please try again later."); })
		return false;
	});
});
</script>
<fieldset>
	<legend><strong>Best Matches</strong></legend>
<form name="frmbestmatches" id="frmbestmatches" method="post" action="">
<div class="error" id="bestmatches_error"></div>
	<p><strong>Choose Profile</strong>
<select name="bid" id="bestmatches_bid">
<?php if (!empty($profiles)) {
	foreach ($profiles as $k => $v) { ?>
	<option value="<?php echo $v['bid']; ?>"><?php echo $v['bname']; ?></option>
	<?php
	}
}
?>
</select>
	</p>
<input type="submit" value="Show Best Matches" />
</form>
	</fieldset>
<div id="bestmatches_list">
</div>
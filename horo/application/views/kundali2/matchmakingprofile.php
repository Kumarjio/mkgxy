<script language="javascript">

$(document).ready(function() {
	$('#frmmatchmakingprofile').submit(function() {
		if (!$('#matchmakingprofile_bid').val()) {
			$('#matchmakingprofile_error').html('Please choose profile');
			return false;
		}
		$('#matchmakingprofile_error').html(loadingicon);
		params = $('#frmmatchmakingprofile').serialize();

		url = "/horo/matchmakingprofilepost";
		var jqxhr = $.post(url, params, function(data) {
			if (data.error == 1) {
				$('#matchmakingprofile_error').html(data.error_message);
				return false;
			}
			$('#matchmakingprofile_list').html(data.html);
			$('#matchmakingprofile_error').html('');
		})
		.error(function() { alert("Could not connect. Please try again later."); })
		return false;
	});
});
</script>
<fieldset>
	<legend><strong>Match Making Profiles</strong></legend>
<form name="frmmatchmakingprofile" id="frmmatchmakingprofile" method="post" action="">
<div class="error" id="matchmakingprofile_error"></div>
	<p><strong>Choose Profile</strong>
<select name="bid" id="matchmakingprofile_bid">
<?php if (!empty($profiles)) {
	foreach ($profiles as $k => $v) { ?>
	<option value="<?php echo $v['bid']; ?>"><?php echo $v['bname']; ?></option>
	<?php
	}
}
?>
</select>
	</p>
<input type="submit" value="Show Match Making With All Profiles" />
</form>
	</fieldset>
<div id="matchmakingprofile_list">
</div>
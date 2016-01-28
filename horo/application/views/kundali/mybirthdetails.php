<script language="javascript">

$(document).ready(function() {
	$('#frmbirthdetails').submit(function() {
		if (!$('#bname').val()) {
			$('#bname').focus();
			$('#birthdetails_error').html('Please enter profile name');
			return false;
		}
		if (!$('#bday').val()) {
			$('#bday').focus();
			$('#birthdetails_error').html('Please enter birth day');
			return false;
		}
		if (!$('#bmonth').val()) {
			$('#bmonth').focus();
			$('#birthdetails_error').html('Please enter birth month');
			return false;
		}
		if (!$('#byear').val()) {
			$('#byear').focus();
			$('#birthdetails_error').html('Please enter birth year');
			return false;
		}
		if (!$('#bhour').val()) {
			$('#bhour').focus();
			$('#birthdetails_error').html('Please enter birth hours');
			return false;
		}
		if (!$('#bmin').val()) {
			$('#bmin').focus();
			$('#birthdetails_error').html('Please enter birth minute');
			return false;
		}
		if (!$('#b_location_id').val()) {
			$('#birthdetails_error').html('Please enter location');
			return false;
		}
		$('#birthdetails_error').html(loadingicon);
		params = $('#frmbirthdetails').serialize();

		url = "/horo/mybirthdetailspost";
		var jqxhr = $.post(url, params, function(data) {
			if (data.error == 1) {
				$('#birthdetails_error').html(data.error_message);
				return false;
			}
			$('#birthdetails_list').html(data.html);
			$('#bname').val('');
			$('#bday').val('');
			$('#bmonth').val('');
			$('#byear').val('');
			$('#bhour').val('');
			$('#bmin').val('');
			$('#birthdetails_error').html('');
		})
		.error(function() { alert("Could not connect. Please try again later."); })
		return false;
	});
});
</script>
<h2>Birth Details</h2>
<!--<fieldset>
	<legend><strong>Birth Details</strong></legend> -->
<form name="frmbirthdetails" id="frmbirthdetails" method="post" action="">
<div class="error" id="birthdetails_error"></div>
	<p><strong>Profile Name:		</strong>
		<input type="text" name="bname" id="bname" />
	</p>
	<p><strong>Birth Day: 
		</strong>
<input type="text" name="bday" id="bday" />
	<strong>Birth Month: </strong>
<input type="text" name="bmonth" id="bmonth" />
	<strong>Birth Year: </strong>
<input type="text" name="byear" id="byear" />
	</p>
	<p><strong>Birth Hour:		</strong>
		<input type="text" name="bhour" id="bhour" />
		<strong>Birth Minute:		</strong>
		<input type="text" name="bmin" id="bmin" />
	</p>
	<p><strong>Location: 
		</strong>
<select name="location_id" id="b_location_id">
<?php if (!empty($location)) {
	foreach ($location as $k => $v) { ?>
	<option value="<?php echo $v['location_id']; ?>"><?php echo $v['location_name']; ?></option>
	<?php
	}
}
?>
</select>
	</p>
<input type="submit" value="Add Birth Details" />
</form>
	<!--</fieldset> -->
<div id="birthdetails_list">
<?php if (!empty($birthprofileview)) { ?>
<?php echo $birthprofileview; ?>
<?php } ?>
</div>
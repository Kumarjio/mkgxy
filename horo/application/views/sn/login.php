
<script language="javascript">
var login = {
	
};

$(document).ready(function() {
	function runquestion(kw)
	{
		$('#answers_result').html('<img src="images/loading.gif" />');
		url = 'y/answers?nolayout=1&kw='+kw;
		console.log(url);
		$.get(url, function(data) {
			$('#answers_result').html(data.html);
		});
	}
	$("#frmLogin").live("submit", function(){
		if (!$('#email').val()) {
			$('#errLogin').html('please fill the email');
			$('#email').focus();
			return false;
		}
		if (!$('#password').val()) {
			$('#errLogin').html('please fill the password');
			$('#password').focus();
			return false;
		}
		// more checks like email validity, password character length

		params = $('#frmLogin').serialize();
		var jqxhr = $.post("/user/login", params, function(data) {

		})
		.success(function(data) {
			if (data.error == 1) {
				$('#errLogin').html(data.error_message);
			} else {
				location.href = "/?url="+data.url;
			}
		})
		.error(function() { alert("could not load, please try again later."); })
		return false;
	});
	$("#frmRegister").live("submit", function(){
		if (!$('#register_email').val()) {
			$('#errRegister').html('please fill the email');
			$('#register_email').focus();
			return false;
		}
		if (!$('#register_name').val()) {
			$('#errRegister').html('please fill the name');
			$('#register_name').focus();
			return false;
		}
		// more checks like email validity, password character length
		params = $('#frmRegister').serialize();
		var jqxhr = $.post("/user/register", params, function(data) {

		})
		.success(function(data) {
			if (data.error == 1) {
				$('#errRegister').html(data.error_message);
			} else {
				location.href = "/?url="+data.url;
			}
		})
		.error(function() { alert("could not load, please try again later."); })
		return false;
	});
	$("#frmforgot").live("submit", function(){
		if (!$('#forgot_email').val()) {
			$('#errForgot').html('please fill the email');
			$('#forgot_email').focus();
			return false;
		}
		params = $('#frmforgot').serialize();
		var jqxhr = $.post("/user/forgot", params, function(data) {

		})
		.success(function(data) {
			if (data.error == 1) {
				$('#errForgot').html(data.error_message);
			} else {
				$('#errForgot').html(data.result);
			}
		})
		.error(function() { alert("could not load, please try again later."); })
		return false;
	});
});
</script>
<table width="100%" border="0" cellpadding="5" cellspacing="0">
	<tr>
		<td valign="top">
<h2>Login</h2></td>
		<td valign="top"><h2>Register</h2></td>
		<td valign="top"><h2>Forgot Password</h2></td>
	</tr>
	<tr>
		<td valign="top"><form action="" method="post" name="frmLogin" id="frmLogin">
<div class="error" id="errLogin"></div>
			<p><strong>Email:</strong>
<input type="text" name="email" id="email">
			</p>
			<p><strong>Password:</strong>
<input type="password" name="password" id="password">
			</p>
			<p>
				<input type="submit" name="login" id="login" value="Login">
			</p>
		</form></td>
		<td valign="top"><form action="" method="post" name="frmRegister" id="frmRegister">
<div class="error" id="errRegister"></div>
			<p><strong>Username:</strong>
				<input type="text" name="username" id="register_username">
			</p>
			<p><strong>Email:</strong>
				<input type="text" name="email" id="register_email">
			</p>
			<p><strong>Name:</strong>
				<input type="text" name="name" id="register_name">
			</p>
			<p><strong>Gender:</strong>
				<input type="radio" name="gender" id="register_gender_1" value="male" checked="checked"> Male
				<input type="radio" name="gender" id="register_gender_2" value="female"> Female
			</p>
			<p><strong>Password:</strong>
				<input type="password" name="password" id="register_password">
			</p>
			<p>
				<input type="submit" name="register" id="register" value="Register">
		</p>
		</form></td>
		<td valign="top"><form action="" method="post" name="frmforgot" id="frmforgot">
<div class="error" id="errForgot"></div>
			<p><strong>Email:</strong>
				<input type="text" name="email" id="forgot_email">
			</p>
			<p>
				<input type="submit" name="forgot" id="forgot" value="Recover My Password">
		</p>
		</form></td>
	</tr>
</table>

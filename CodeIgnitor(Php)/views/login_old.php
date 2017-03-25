<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>



<!--META-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Form</title>
<h1>
	<center>
		<font face="verdana" color="Blue"><U>Android Application Analysis</U></font>
	</center>
</h1>
<!--STYLESHEETS-->
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet"
	type="text/css" />

<!--SCRIPTS-->
<script type="text/javascript"
	src="/home/asus/project/admin/1/js/jquery.min.js"></script>
<!--Slider-in icons-->
<script type="text/javascript">
$(document).ready(function() {
	$(".username").focus(function() {
		$(".user-icon").css("left","-48px");
	});
	$(".username").blur(function() {
		$(".user-icon").css("left","0px");
	});
	
	$(".password").focus(function() {
		$(".pass-icon").css("left","-48px");
	});
	$(".password").blur(function() {
		$(".pass-icon").css("left","0px");
	});
});
</script>

</head>
<body>

	<!--WRAPPER-->
	<div id="wrapper">

		<!--SLIDE-IN ICONS-->
		<div class="user-icon"></div>
		<div class="pass-icon"></div>
		<!--END SLIDE-IN ICONS-->

		<!--LOGIN FORM-->
		<form class="login-form"
			action="<?php echo base_url();?>logincontroller/authenticateUser"
			method="post">

			<!--HEADER-->
			<div class="header">
				<!--TITLE-->
				<h1>Login Form</h1>
				<!--END TITLE-->
				<!--DESCRIPTION-->
				<span>Fill out the form below to login to ANDROID APPLICATION
					ANALYSIS TOOL .</span>
				<!--END DESCRIPTION-->
			</div>
			<!--END HEADER-->

			<!--CONTENT-->
			<div class="content">
				<!--USERNAME-->
				<input name="username" type="text" class="input username" required
					value="Username" onfocus="this.value=''" />
				<!--END USERNAME-->
				<!--PASSWORD-->
				<input name="pass" type="password" class="input password"
					value="Password" onfocus="this.value=''" />
				<!--END PASSWORD-->
			</div>
			<!--END CONTENT-->

			<!--FOOTER-->
			<div class="footer">




				<!--REGISTER BUTTON-->
				<a href="<?php echo base_url('RegisterController')?>" class="button">Register</a>
				<!--END REGISTER BUTTON-->
				<!--LOGIN BUTTON-->
				<input align=left type="submit" name="submit1" value="Login"
					class="button" />
				<!--END LOGIN BUTTON-->
				<a
					href="<?php echo base_url('logincontroller/forgotPasswordView')?>">forgot
					password?</a>
		
		</form>
		<!--END LOGIN FORM-->
		<!--REGISTER BUTTON-->
		<!--END REGISTER BUTTON-->


	</div>
	<!--END FOOTER-->



	</div>
	<!--END WRAPPER-->

	<!--GRADIENT-->
	<div class="gradient"></div>
	<!--END GRADIENT-->

</body>
</html>
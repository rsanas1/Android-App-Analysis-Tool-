<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login :: Android Forensics</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
	<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
	
	<link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    
    <link href="<?php echo base_url();?>assets/css/ui-lightness/jquery-ui-1.10.0.custom.min.css" rel="stylesheet">    
    
    <link href="<?php echo base_url();?>assets/css/base-admin-3.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/base-admin-3-responsive.css" rel="stylesheet">
	
    <link href="<?php echo base_url();?>assets/css/pages/signin.css" rel="stylesheet" type="text/css">

    <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet">

</head>

<script type="text/javascript">
      (function() {
       var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
       po.src = 'https://apis.google.com/js/client:plusone.js';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
     })();     
</script>

<body>
	
<nav class="navbar navbar-inverse" role="navigation">

	<div class="container">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.html"><b>Welcome To The Analytic World of Android Forensics..</b></a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav navbar-right">
      <li class="">						
			<a href="<?php echo base_url('RegisterController')?>">
				Create an Account
			</a>			
		</li>

		<!-- <li class="">
						
			<a href="login.html#">
				<i class="icon-chevron-left"></i>&nbsp;&nbsp; 
				Back to Homepage
			</a>
			
		</li> -->
    </ul>
  </div><!-- /.navbar-collapse -->
</div> <!-- /.container -->
</nav>



<div class="account-container stacked">
	
	<div class="content clearfix">
		
		<form action="<?php echo base_url();?>logincontroller/authenticateUser" method="post">
		
			<h1>Android Forensics</h1>		
			
			<div class="login-fields">
				
				<p>Sign in using your registered account:</p>
				
				<div class="field">
					<label for="email">Username:</label>
					<input type="text" id="username" name="username" value="" placeholder="Username" class="form-control input-lg username-field" />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Password:</label>
					<input type="password" id="pass" name="pass" value="" placeholder="Password" class="form-control input-lg password-field"/>
				</div> <!-- /password -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<!-- <span class="login-checkbox">
					<input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
					<label class="choice" for="Field">Keep me signed in</label>
				</span> -->
									
				<button class="login-action btn btn-primary">Sign In</button>
				
			</div> <!-- .actions -->
			
			<!-- <div class="login-social">
				<p>Sign in using social network:</p>
				
				<span id="signinButton">
				  <span
				    class="g-signin"
				    data-callback="signinCallback"
				    data-clientid="46436339532-or1jt9hr05b62l5agrfkr4gbbsg5jgnb.apps.googleusercontent.com"
				    data-cookiepolicy="none"
				    data-requestvisibleactions="http://schemas.google.com/AddActivity"
				    data-scope="https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read">
				  </span>
				</span>
				
				 <div class="fb">
					<a href="login.html#" class="btn_2">Login with Facebook</a>				
				</div> 
			</div> -->
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->


<!-- Text Under Box -->
<div class="login-extra">
	Don't have an account? <a href="<?php echo base_url('RegisterController')?>">Sign Up</a><br/>
	 Forgot Your Password?? <a href="<?php echo base_url('logincontroller/forgotPasswordView')?>"> <u>Remind Password</u></a>
</div> <!-- /login-extra -->



<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script> var baseUrl = '<?php echo base_url(); ?>'</script>
<script src="assets/js/libs/jquery-1.9.1.min.js"></script>
<script src="assets/js/libs/jquery-ui-1.10.0.custom.min.js"></script>
<script src="assets/js/libs/bootstrap.min.js"></script>

<script src="assets/js/Application.js"></script>

<script src="assets/js/demo/signin.js"></script>
<script src="assets/js/googleplus.js"></script>


</body>
</html>
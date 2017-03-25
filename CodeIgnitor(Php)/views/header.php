<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<title>Android Application Analysis</title>

<!-- Bootstrap core CSS -->
<link
	href="<?php echo base_url('css/bootstrap.css" rel="stylesheet');?>">

<!-- Add custom CSS here -->
<link href="<?php echo base_url('css/sb-admin.css');?>" rel="stylesheet">
<link rel="stylesheet"
	href="<?php echo base_url('font-awesome/css/font-awesome.min.css');?>">
<!-- Page Specific CSS -->
<link rel="stylesheet"
	href="<?php echo base_url('css/morris-0.4.3.min.css');?>">
</head>

<body>

	<div id="wrapper">

		<!-- Sidebar -->
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand"
					href="<?php echo base_url('HomeController')?>">Android Application
					Analysis</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav side-nav">
					<li class="active"><a
						href="<?php echo base_url('HomeController')?>"><i
							class="fa fa-dashboard"></i> Home Page</a></li>



					<li><a><i class="fa fa-none"></i><u><b>Statistics</b></u></a></li>

					<li><a href="<?php  echo base_url('charts');?>\"><i
							class="fa fa-bar-chart-o"></i> Charts</a></li>
					<li><a href="<?php echo base_url();?>tables.html"><i
							class="fa fa-table"></i> Tables</a></li>
					<li><a href="<?php echo base_url('HomeController/appcount');?>"><i
							class="fa fa-magic"></i> AppCount</a></li>
					</li>



					<li><a href="<?php echo base_url('BookmarkController');?>"><i
							class="fa fa-bookmark"></i> Bookmarks</a></li>
					<!--<li><a href="<?php echo base_url();?>tables.html"><i
							class="fa fa-eye"></i> Insight</a></li>
					<li><a href="<?php echo base_url();?>tables.html"><i
							class="fa fa-compass"></i> Explore</a></li>
					<li><a href="<?php echo base_url();?>bootstrap-grid.html"><i
							class="fa fa-wrench"></i> Settings</a></li> -->


				</ul>

				<ul class="nav navbar-nav navbar-right navbar-user">

					<li><a href="<?php echo base_url('HomeController/help')?>"><i
							class="fa fa-phone"></i> Contact Us </a> <!-- <ul >
							<li><a href="#"><i class="label label-call"></i><i
									class="fa fa-phone"></i> Call</a></li>
							<li><a href="#"><i class="label label-email"></i><i
									class="fa fa-laptop"></i> Email</a></li>
						</ul> --></li>
					<li class="dropdown help-dropdown"><a href="#"
						class="dropdown-toggle" data-toggle="dropdown"><i
							class="fa fa-android"></i> Projects <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url('AppController');?>"><i
									class="label label-call"></i> List Apps</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo base_url('AppController/add');?>"><i
									class="fa fa-plus-square"></i> Add New App</a></li>
						</ul></li>

					<li class="dropdown account-dropdown"><a href="#"
						class="dropdown-toggle" data-toggle="dropdown"><i
							class="fa fa-anchor"></i> Account<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url('UserController');?>"><i
									class="label label-info"></i> Change Password</a></li>


						</ul></li>
					<li class="dropdown user-dropdown"><a href="#"
						class="dropdown-toggle" data-toggle="dropdown"><i
							class="fa fa-user"></i> <?php echo $_SESSION['name'];?><b
							class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#"><i class="fa fa-user"></i> Profile</a></li>

							<!-- <li class="divider"></li> -->
							<li><a href="<?php echo base_url('logincontroller/logout');?>"><i
									class="fa fa-power-off"></i> Log Out</a></li>
						</ul></li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</nav>
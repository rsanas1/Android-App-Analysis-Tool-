

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1>Change Password</h1>

		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			<?php if(isset($_GET['success'])) { ?>
				<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert"
					aria-hidden="true">×</button>
				Password sent to email successfully!
			</div>
			<?php } ?>
			<?php if(isset($_GET['fail'])) { ?>
				<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert"
					aria-hidden="true">×</button>
				<b>Oops!</b> Enter valid email_id
			</div>
			<?php } ?>
			<form role="form"
				action="<?php echo base_url('logincontroller/forgotPassword');?>"
				method="post">

				<div class="form-group">

					<label>Registered Email_ID</label> <input type="email" name="email"
						class="form-control" rows="6" />
				</div>

				<input type="submit" value="Send Email" class="btn btn-primary">
			</form>




		</div>
	</div>
</div>
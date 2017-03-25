
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
				Password updated successfully!
			</div>
			<?php } ?>
			<?php if(isset($_GET['fail'])) { ?>
				<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert"
					aria-hidden="true">×</button>
				<b>Oops!</b> Something was wrong!
			</div>
			<?php } ?>
			<form role="form"
				action="<?php echo base_url();?>UserController/changep"
				method="post">

				<div class="form-group">

					<label>Current Password</label> <input type="text" name="old_pass"
						class="form-control" rows="6" />
				</div>
				<div class="form-group">
					<label>New Password</label> <input type="text" name="new_pass"
						class="form-control" rows="6" />
				</div>
				<div class="form-group">
					<label>Confirm Password</label> <input type="text"
						name="confirm_pass" class="form-control" rows="6" />
				</div>
				<input type="submit" value="Update Password" class="btn btn-primary">
			</form>
		</div>



	</div>
</div>
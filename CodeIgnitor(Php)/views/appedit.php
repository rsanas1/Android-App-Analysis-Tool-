<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1>
				Edit App <small>Enter App Details</small>
			</h1>

		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			<form role="form"
				action="<?php echo base_url();?>AppController/update" method="post">

				<div class="form-group">

					<label>App Name</label> <input type="hidden" name="id"
						value="<?php echo $app['id'];?>" /> <input type="text"
						name="app_name" class="form-control"
						value="<?php echo $app['app_name'];?>" />
				</div>
				<div class="form-group">
					<label>App Description</label>
					<textarea class="form-control" name="app_desc" rows="6"><?php echo $app['app_desc'];?></textarea>
				</div>
				<div class="form-group">
					<label>Api Key</label> <input type="text" name="api_key"
						value=<?php echo $app['api_key'];?> class="form-control"
						disabled="disabled" />
				</div>
				<input type="submit" value="Update App" class="btn btn-primary">
			</form>
		</div>



	</div>
</div>
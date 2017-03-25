<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1>
				Add New App <small>Enter App Details</small>
			</h1>

		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			<form role="form" action="<?php echo base_url();?>AppController/save"
				method="post">
				<div class="form-group">
					<label>App Name</label> <input type="text" name="app_name"
						class="form-control" />
				</div>
				<div class="form-group">
					<label>App Description</label>
					<textarea class="form-control" name="app_desc" rows="6"></textarea>
				</div>
				<div class="form-group">
					<label>App Keywords</label> <input type="text" name="app_key"
						class="form-control" />
				</div>
				<input type="submit" value="Add App" class="btn btn-primary">
			</form>
		</div>



	</div>
</div>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1>Activities Registeration</h1>

		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">

			<form role="form"
				action="<?php echo base_url();?>TempController/register_activity"
				method="post">

				<div class="form-group">

					<label>Activity Name</label> <input type="text"
						name="activity_name" class="form-control" rows="6" />
				</div>
				<div class="form-group">

					<label>API KEY</label> <input type="text"
						name="api_key" class="form-control" rows="6" />
				</div>
				<div class="form-group">
					<label>App Id</label> <input type="text" name="app_id"
						class="form-control" rows="6" />
				</div>
				<div class="form-group">
					<label>Start Time</label> <input type="text" name="start_time"
						class="form-control" rows="6" />
				</div>
				<div class="form-group">
					<label>End Time</label> <input type="text" name="end_time"
						class="form-control" rows="6" />
				</div>
				<input type="submit" value="Register" class="btn btn-primary">
			</form>
		</div>



	</div>
</div>
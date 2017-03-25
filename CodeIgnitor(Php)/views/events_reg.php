
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1>Events Registeration</h1>

		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">

			<form role="form"
				action="<?php echo base_url();?>TempController/register_event"
				method="post">

				<div class="form-group">

					<label>Event Name</label> <input type="text" name="event_name"
						class="form-control" rows="6" />
				</div>
				<div class="form-group">
					<label>App Id</label> <input type="text" name="app_id"
						class="form-control" rows="6" />
				</div>
				<div class="form-group">
					<label>Timestamp</label> <input type="text" name="timestamp"
						class="form-control" rows="6" />
				</div>
				<div class="form-group">
					<label>Activity Id</label> <input type="text" name="activity_id"
						class="form-control" rows="6" />
				</div>
				<input type="submit" value="Register" class="btn btn-primary">
			</form>
		</div>



	</div>
</div>
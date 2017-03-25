<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1>
				Add Bookmark!
			</h1>

		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			<form role="form" action="<?php echo base_url();?>BookmarkController/save"
				method="post">
				<div class="form-group">
					<label>Title</label> <input type="text" name="title"
						class="form-control" />
				</div>
				<!-- <div class="form-group">
					<label>App Description</label>
					<textarea class="form-control" name="app_desc" rows="6"></textarea>
				</div> -->
				<div class="form-group">
					<label>Website</label> <input type="text" name="website"
						class="form-control" />
				</div>
				<input type="submit" value="Add Bookmark" class="btn btn-primary">
			</form>
		</div>



	</div>
</div>
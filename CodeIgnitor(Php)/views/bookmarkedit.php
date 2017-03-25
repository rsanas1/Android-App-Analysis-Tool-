<div id="page-wrbookmarker">
	<div class="row">
		<div class="col-lg-12">
			<h1>
				Edit Bookmark
			</h1>

		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			<form role="form"
				action="<?php echo base_url();?>BookmarkController/update" method="post">

				<div class="form-group">

					<label>Title</label> <input type="hidden" name="id"
						value="<?php echo $bookmark['id'];?>" /> <input type="text"
						name="title" class="form-control"
						value="<?php echo $bookmark['title'];?>" />
				</div>
				
				<div class="form-group">
					<label>Website</label> <input type="text" name="website"
						value=<?php echo $bookmark['website'];?> class="form-control"
						 />
				</div>
				<input type="submit" value="Update bookmark" class="btn btn-primary">
			</form>
		</div>



	</div>
</div>
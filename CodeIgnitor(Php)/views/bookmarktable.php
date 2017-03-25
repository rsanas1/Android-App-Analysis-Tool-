<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h2>Bookmarks</h2>
			<div class="table-responsive">
				<table class="table">
					<tr>
						<th>ID</th>
						<th>Title</th>
						
						<th>Edit</th>
						<th>Delete</th>
					</tr><?php $i=1;?>
					<?php foreach($bookmarks as $bookmark) {?>
					<tr>
						<td><?php echo $i;$i++;?></td>
						
						<td><a href="<?php echo $bookmark['website'];?>"  target="_blank"><?php echo $bookmark['title'];?></a></td>
						<td><a href="<?php echo base_url('BookmarkController/edit?id='.$bookmark['id']);?>"
							class="btn btn-primary"><i class="fa fa-trash"></i> Edit</a></td>
						<td><a href="<?php echo base_url('BookmarkController/delete?id='.$bookmark['id']);?>"
							class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a></td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
	
	<a href="<?php echo base_url('BookmarkController/add');?>"
			class="btn btn-info"></i>Add Bookmark</a>
</div>
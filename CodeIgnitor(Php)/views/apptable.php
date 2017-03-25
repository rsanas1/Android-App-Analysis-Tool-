<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h2>Applications</h2>
			<div class="table-responsive">
				<table class="table">
					<tr>
						<th>ID</th>
						<th>App Name</th>
						<th>API Key</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr><?php $i=1;?>
					<?php foreach($apps as $app) {?>
					<tr>
						<td><?php echo $i;$i++;?></td>
						<td><?php echo $app['app_name'];?></td>
						<td><?php echo $app['api_key'];?></td>
						<td><a href="<?php echo base_url('app/edit?id='.$app['id']);?>"
							class="btn btn-primary"><i class="fa fa-trash"></i> Edit</a></td>
						<td><a href="<?php echo base_url('app/delete?id='.$app['id']);?>"
							class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a></td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="table-responsive">
	<form action="" method="POST">
		<div style ="margin-bottom: 10px" id="bulkOptionsContainer" class="col-xs-4 marginCustom">
			<select class="col-xs-4 form-control" name="bulk_option">
				<?php 

					$query_status = "SELECT * FROM post_status ";
					$all_status = mysqli_query($connection, $query_status) or die (mysqli_error($connection));

					while ($status = mysqli_fetch_assoc($all_status)){
						$status_id = $status['post_status_id'];
						$status_name = $status['status_name'];

					?>
						
					<option value="<?php echo $status_id; ?>"><?php echo $status_name; ?></option>

					<?php
					}
				?>
				
				<option value="delete">Delete</option>
			</select>
		</div>
		<div class="form-group col-xs-4">
			<input type="submit" class="form-control btn btn-primary" value="Apply" name="apply_action">
		</div>
		<div class="form-group col-xs-4">
			<input type="submit" class="form-control btn btn-success" value="Add Post" name="submit_add_post">
		</div>		
		
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th><input type="checkbox" name="selectAllPosts">
					<th>ID</th>
					<th>Author</th>
					<th>Content</th>
					<th>Title</th>
					<th>Category</th>
					<th>Status</th>
					<th>Image</th>
					<th>Tags</th>
					<th>Date</th>
					<th>Comments</th>
				</tr>
			</thead>
			<tbody>
				<?php show_posts(); ?>
			</tbody>
		</table>
	</form>
</div>
<!-- Table responsive end -->		
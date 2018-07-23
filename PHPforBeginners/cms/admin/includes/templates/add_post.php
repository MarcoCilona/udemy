<form action="" method="POST" enctype="multipart/form-data">
	
	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" class="form-control" name="title">
	</div>

	<div class="form-group">
		<label for="title">Post Author</label>
		<input type="text" class="form-control" name="author">
	</div>

	<div class="form-group">
		<label for="title">Post Status</label><br />
		<select class="form-control" name="status">
			<?php 

				$query = "SELECT * FROM post_status ";
				$category_list = mysqli_query($connection, $query) or die('Failed to read status table.');

				while ($item = mysqli_fetch_assoc($category_list)){
					$status_id = $item['post_status_id'];
					$status_name = $item['status_name'];

					echo "<option value='{$status_id}'>{$status_name}</option>";

				}

			?>
		</select>	
	</div>

	<div class="form-group">
		<label for="title">Post Category Id</label><br />
		<select class="form-control" name="category">
			<?php 

				$query = "SELECT * FROM categories ";
				$category_list = mysqli_query($connection, $query) or die('Failed to read categories.');

				while ($item = mysqli_fetch_assoc($category_list)){
					$cat_id = $item['cat_id'];
					$cat_title = $item['cat_title'];

					echo "<option value='{$cat_id}'>{$cat_title}</option>";

				}

			?>
		</select>	
	</div>

	<div class="form-group">
		<label for="title">Post Image</label>
		<input type="file" class="form-control" name="img">
	</div>
	
	<div class="form-group">
		<label for="title">Post Tags</label>
		<input type="text" class="form-control" name="tags">
	</div>

	<div class="form-group">
		<label for="title">Post Content</label>
		<textarea class="form-control" name="content" id="body" cols="30" rows="10"></textarea>
	</div>

	<div class="form-group">
		<input type="submit" class="form-control btn btn-primary" value="Save post" name="add_post">
	</div>

</form>
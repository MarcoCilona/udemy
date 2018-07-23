<?php 

	$post_data = update_post(); 

?>
<form action="" method="POST" enctype="multipart/form-data">

	<div class="form-group">
		<label for="title">Post Title</label>
		<input value="<?php echo $post_data['title']; ?>" type="text" class="form-control" name="title">
	</div>

	<div class="form-group">
		<label for="title">Post Author</label>
		<input value="<?php echo $post_data['author']; ?>" type="text" class="form-control" name="author">
	</div>

	<div class="form-group">
		<label for="title">Post Status</label>
		<select class="form-control" name="status">

			<?php 

				$query = "SELECT * FROM post_status ";
				$category_list = mysqli_query($connection, $query) or die('Failed to read post status.');
				
					
				while ($item = mysqli_fetch_assoc($category_list)){
					$status_id = $item['post_status_id'];
					$status_name = $item['status_name'];
					$selected = "";

					if($post_data['status'] == $status_id)
						$selected = 'selected';

					echo "<option $selected value='{$status_id}'>{$status_name}</option>";

				}

			?>
			
		</select>
	</div>

	<div class="form-group">
		<label for="title">Post Category</label>
		<select class="form-control" name="category">

			<?php 

				$query = "SELECT * FROM categories ";
				$category_list = mysqli_query($connection, $query) or die('Failed to read categories.');
				
					
				while ($item = mysqli_fetch_assoc($category_list)){
					$cat_id = $item['cat_id'];
					$cat_title = $item['cat_title'];
					$selected = "";

					if($post_data['category_id'] == $cat_id)
						$selected = 'selected';

					echo "<option $selected value='{$cat_id}'>{$cat_title}</option>";

				}

			?>
			
		</select>
	</div>

	<div class="form-group">
		<label>Current Img </label><br />
		<img width="300px" height="100px" src="<?php echo "../images/{$post_data['img']}" ?>" />
		<br />
		<label for="title">Post Image</label>
		<input type="file" class="form-control" name="img">
	</div>
	
	<div class="form-group">
		<label for="title">Post Tags</label>
		<input value="<?php echo $post_data['tag']; ?>"type="text" class="form-control" name="tags">
	</div>

	<div class="form-group">
		<label for="body">Post Content</label>
		<textarea class="form-control" name="content" id="body" cols="30" rows="10"><?php echo $post_data['content']; ?></textarea>
	</div>

	<div class="form-group">
		<input type="submit" class="form-control btn btn-primary" value = "Save changes" name="edit_post">
	</div>

</form>
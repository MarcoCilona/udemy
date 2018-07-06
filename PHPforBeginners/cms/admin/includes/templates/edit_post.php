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
		<input value="<?php echo $post_data['status']; ?>" type="text" class="form-control" name="status">
	</div>

	<div class="form-group">
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
		<label for="title">Post Content</label>
		<textarea class="form-control" name="content" id="" cols="30" rows="10"><?php echo $post_data['content']; ?></textarea>
	</div>

	<div class="form-group">
		<input type="submit" class="form-control btn btn-primary" value = "Save changes" name="edit_post">
	</div>

</form>
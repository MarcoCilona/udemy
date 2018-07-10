<?php 

	$post_data = fill_user_data();

?>
<form action="" method="POST" enctype="multipart/form-data">

	<div class="form-group">
		<label for="title">Username</label>
		<input value="<?php echo $post_data['username']; ?>" type="text" class="form-control" name="username">
	</div>

	<div class="form-group">
		<label for="title">First name</label>
		<input value="<?php echo $post_data['first_name']; ?>" type="text" class="form-control" name="first_name">
	</div>

	<div class="form-group">
		<label for="title">Last name</label>
		<input value="<?php echo $post_data['last_name']; ?>" type="text" class="form-control" name="last_name">
	</div>

	<div class="form-group">
		<label for="title">Email</label>
		<input value="<?php echo $post_data['email']; ?>" type="email" class="form-control" name="email">
	</div>

	<div class="form-group">
		<label for="title">Role</label>
		<select class="form-control" name="role">

			<?php 

				$query = "SELECT * FROM role ";
				$roles_list = mysqli_query($connection, $query) or die('Failed to read roles.');
									
				while ($item = mysqli_fetch_assoc($roles_list)){
					$role_id = $item['id'];
					$role_name = $item['role_name'];
					$selected = "";

					if($post_data['role'] == $role_id)
						$selected = 'selected';

					echo "<option $selected value='{$role_id}'>{$role_name}</option>";

				}

			?>
			
		</select>
	</div>

	<div class="form-group">
		<label for="title">Password</label>
		<input type="password" class="form-control" name="user_pw">
	</div>

	<div class="form-group">
		<label>Current Img </label><br />
		<img width="300px" height="100px" src="<?php echo "images/{$post_data['img']}" ?>" />
		<br />
		<label for="title">User Image</label>
		<input type="file" class="form-control" name="user_img">
	</div>


	<div class="form-group">
		<input type="submit" class="form-control btn btn-primary" value = "Save changes" name="edit_user">
	</div>

</form>
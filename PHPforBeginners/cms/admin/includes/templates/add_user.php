<form action="" method="POST" enctype="multipart/form-data">
	
	<div class="form-group">
		<label for="title">Username</label>
		<input type="text" class="form-control" name="username">
	</div>

	<div class="form-group">
		<label for="title">First name</label>
		<input type="text" class="form-control" name="user_firstname">
	</div>

	<div class="form-group">
		<label for="title">Last name</label>
		<input type="text" class="form-control" name="user_lastname">
	</div>

	<div class="form-group">
		<label for="title">E-mail</label><br />
		<input type="email" class="form-control" name="user_email">
	</div>

	<div class="form-group">
		<label for="title">Password</label><br />
		<input type="password" class="form-control" name="user_pw">
	</div>

	<div class="form-group">
		<label for="title">Role</label>
		<select class="form-control" name="user_role">
				
			<?php  
			
				$query = "SELECT * FROM role ";

				$roles = mysqli_query($connection, $query) or die ("Failed to load roles. <br />Error: " . mysqli_error($connection));

				while($role = mysqli_fetch_assoc($roles)){
					$role_id = $role['id'];
					$role_name = $role['role_name'];

					echo "<option value=\"{$role_id}\">{$role_name}</option>";

				}

			?>	

		</select>
	</div>

	<div class="form-group">
		<label for="title">User Image</label>
		<input type="file" class="form-control" name="user_img">
	</div>

	<div class="form-group">
		<input type="submit" class="form-control btn btn-primary" value="Add new user" name="add_user">
	</div>

</form>
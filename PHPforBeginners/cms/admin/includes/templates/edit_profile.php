<?php 

	include("includes/profile_functions.php");
	$profile_info = fill_up_profile();

?>
<form action="" method="POST" enctype="multipart/form-data">

	<div class="form-group">
		<label for="title">Username</label>
		<input value="<?php echo $profile_info['username']; ?>" type="text" class="form-control" name="profile_username">
	</div>

	<div class="form-group">
		<label for="title">First name</label>
		<input value="<?php echo $profile_info['first_name']; ?>" type="text" class="form-control" name="profile_first_name">
	</div>

	<div class="form-group">
		<label for="title">Last name</label>
		<input value="<?php echo $profile_info['last_name']; ?>" type="text" class="form-control" name="profile_last_name">
	</div>

	<div class="form-group">
		<label for="title">Email</label>
		<input value="<?php echo $profile_info['email']; ?>" type="email" class="form-control" name="profile_email">
	</div>

	<div class="form-group">
		<label for="title">Password</label>
		<input type="password" class="form-control" name="profile_pw">
	</div>

	<div class="form-group">
		<label>Current Img </label><br />
		<img width="300px" height="100px" src="<?php echo "images/{$profile_info['img']}" ?>" />
		<br />
		<label for="title">User Image</label>
		<input type="file" class="form-control" name="profile_img">
	</div>


	<div class="form-group">
		<input type="submit" class="form-control btn btn-primary" value = "Save changes" name="edit_profile">
	</div>

</form>
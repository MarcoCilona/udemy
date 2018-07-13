<?php 

	function fill_up_profile () {

		global $connection;

		$profile_id = $_SESSION['user_id'];

		$profile_query = "SELECT * FROM users ";
		$profile_query .= "WHERE id = $profile_id ";

		$user_info = mysqli_query($connection, $profile_query) or die ("Failed to load profile info. <br />Error: " .  mysqli_error($connection));

		return mysqli_fetch_assoc($user_info);

	}
	
	if(isset($_POST['edit_profile'])){

		$profile_id = $_SESSION['user_id'];

		$new_username = $_POST['profile_username'];
		$new_firstname = $_POST['profile_first_name'];			
		$new_lastname = $_POST['profile_last_name'];
		$new_email = $_POST['profile_email'];

		$new_img = $_FILES['profile_img']['name'];
		$profile_img_temp = $_FILES['profile_img']['tmp_name'];

		move_uploaded_file($profile_img_temp, "images/$profile_img");

		if(empty($new_img)){

			$query = "SELECT img FROM users ";
			$query .= "WHERE id =  $profile_id ";
			$result = mysqli_query($connection, $query);

			while($item = mysqli_fetch_assoc($result)){
				$new_img = $item['img'];
			}

		}

		$new_password;
		if(empty($user_pw)){

			$query = "SELECT password FROM users ";
			$query .= "WHERE id = $profile_id ";

			$user = mysqli_query($connection, $query) or die("Failed to read user's password. <br />Error: " . mysqli_error($connection));

			while($info = mysqli_fetch_assoc($user)){

				$new_password = $info['password'];

			}

		}else{

			$new_password = password_hash($user_pw, PASSWORD_DEFAULT, array('cost' => 10));

		}

		$update_query = "UPDATE users ";
		$update_query .= "SET username = '$new_username', ";
		$update_query .= "password = '$new_password', ";
		$update_query .= "first_name = '$new_firstname', ";
		$update_query .= "last_name = '$new_lastname', ";
		$update_query .= "email = '$new_email', ";
		$update_query .= "img = '$new_img' ";
		$update_query .= "WHERE id = $profile_id ";

		mysqli_query($connection, $update_query) or die ("Failed to update user info. <br />Error: " . mysqli_error($connection));

		$_SESSION['username'] = $new_username;
		$_SESSION['firstname'] = $new_firstname;
		$_SESSION['lastname'] = $new_lastname;
		$_SESSION['user_email'] = $new_email;
		$_SESSION['user_img'] = $new_img;

		header("Location: index.php");

					

	}		

?>
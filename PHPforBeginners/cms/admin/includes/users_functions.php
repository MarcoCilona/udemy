<?php 

	function show_users () {

		global $connection;

		$query = "SELECT users.*, role.role_name FROM users ";
		$query .= "LEFT JOIN role ";
		$query .= "ON users.role = role.id ";

		$all_users = mysqli_query($connection, $query) or die("Failed to load users. <br />Error: " . mysqli_error($connection));

		while($single_user = mysqli_fetch_assoc($all_users)){

			$user_id = $single_user['id'];
			$username = $single_user['username'];
			$user_firstname = $single_user['first_name'];
			$user_lastname = $single_user['last_name'];
			$user_email = $single_user['email'];
			$user_role = $single_user['role_name'];
			$user_img = $single_user['img'];

			echo "<tr>";
			echo "<td>{$user_id}</td>";
			echo "<td>{$username}</td>";
			echo "<td>{$user_firstname}</td>";
			echo "<td>{$user_lastname}</td>";
			echo "<td>{$user_email}</td>";
			echo "<td>{$user_role}</td>";
			echo "<td><img class='img-responsive' src='images/$user_img' /></td>";
			echo "<td><a href=\"users.php?source=update_user&user_id={$user_id}\">Update</a></td>";
			echo "<td><a href=\"users.php?delete_user={$user_id}\">Delete</a></td>";
			echo "</tr>";


		}
	}

	if(isset($_POST['add_user'])){

		$username = $_POST['username'];
		$user_firstname = $_POST['user_firstname'];
		$user_lastname = $_POST['user_lastname'];
		$user_email = $_POST['user_email'];
		$user_role = $_POST['user_role'];
		
		$user_pw = $_POST['user_pw'];		
		
		$user_img = $_FILES['user_img']['name'];
		$user_img_temp = $_FILES['user_img']['tmp_name'];

		move_uploaded_file($user_img_temp, "images");

		$encrypt_pw = password_hash($user_pw, PASSWORD_DEFAULT, array('cost' => 10));

		$query = "INSERT INTO users (username, password, first_name, last_name, role, email, img) ";
		$query .= "VALUES ('$username', '$encrypt_pw', '$user_firstname', '$user_lastname', '$user_role', '$user_email', '$user_img') ";

		mysqli_query($connection, $query) or die ("Failed to save new user. <br />Error: " . mysqli_error($connection));

		header("Location: users.php");
	}

	if(isset($_GET['delete_user'])){

		if(isset($_SESSION['user_role'])){

			$role_id = $_SESSION['user_role'];

	        $query = "SELECT role_name FROM role ";
	        $query .= "WHERE id = $role_id ";

	        $role = mysqli_query($connection, $query) or die("Failed to load role name. <br />Error: " .mysqli_error($connection));

	        $role_name = mysqli_fetch_array($role);
	        
	        if($role_name[0] === 'admin'){

	        	$user_id = mysqli_real_escape_string($connection, $_GET['delete_user']);

				$delte_user_query = "DELETE FROM users ";
				$delte_user_query .= "WHERE id = $user_id ";

				mysqli_query($connection, $delte_user_query) or die("Failed to delete user. <br />Error: " . mysqli_error($connection));

				header("Location: users.php");	        	

	        }

		}

	}

	function fill_user_data () {

		global $connection;

		if(isset($_GET['user_id'])){

			$u_id = $_GET['user_id'];

			$user_info_query = "SELECT * FROM users ";
			$user_info_query .= "WHERE id = $u_id ";

			$users_list = mysqli_query($connection, $user_info_query) or die("Failed to load user info. <br />Error: " . mysqli_error($connection));

			return mysqli_fetch_assoc($users_list);

		}

	}

	if(isset($_POST['edit_user'])){

		$user_id = $_GET['user_id'];

		$username = $_POST['username'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$role = $_POST['role'];
		$user_pw = $_POST['user_pw'];
		
		$user_img = $_FILES['user_img']['name'];
		$user_img_temp = $_FILES['user_img']['tmp_name'];

		move_uploaded_file($user_img_temp, "images/$user_img");

		if(empty($post_img)){

			$query = "SELECT img FROM users ";
			$query .= "WHERE id =  $user_id ";
			$result = mysqli_query($connection, $query);

			while($item = mysqli_fetch_assoc($result)){
				$user_img = $item['img'];
			}

		}

		$encrypt_pw;

		if(empty($user_pw)){

			$query = "SELECT password FROM users ";
			$query .= "WHERE id = $user_id ";

			$user = mysqli_query($connection, $query) or die("Failed to read user's password. <br />Error: " . mysqli_error($connection));

			while($info = mysqli_fetch_assoc($user)){

				$encrypt_pw = $info['password'];

			}

		}else{

			$encrypt_pw = password_hash($user_pw, PASSWORD_DEFAULT, array('cost' => 10));

		}

		$update_query = "UPDATE users ";
		$update_query .= "SET username = '$username', ";
		$update_query .= "password = '$encrypt_pw', ";
		$update_query .= "first_name = '$first_name', ";
		$update_query .= "last_name = '$last_name', ";
		$update_query .= "role = $role, ";
		$update_query .= "email = '$email', ";
		$update_query .= "img = '$user_img' ";
		$update_query .= "WHERE id = $user_id ";

		mysqli_query($connection, $update_query) or die ("Failed to update user info. <br />Error: " . mysqli_error($connection));

		header("Location: users.php");
	}


?>
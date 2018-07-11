<?php
	
	include("db.php");

	session_start();

	if(isset($_POST['login_submit'])){

		$username = mysqli_real_escape_string($connection, $_POST['login_username']);
		$password = mysqli_real_escape_string($connection, $_POST['login_password']);

		$query = "SELECT *  FROM users ";
		$query .= "WHERE username = '$username' ";

		$users_list = mysqli_query($connection, $query) or die("Failed to log in. <br />Error: " . mysqli_error($connection));

		while($user = mysqli_fetch_assoc($users_list)){

			$db_id = $user['id'];
			$db_username = $user['username'];
			$db_firstname = $user['first_name'];
			$db_lastname = $user['last_name'];
			$db_role = $user['role'];
			$db_email = $user['email'];
			$db_pw = $user['password'];
			$db_img = $user['img'];

		}

		if(!password_verify($password, $db_pw)){
			
			header("Location: ../index.php");
		
		}else{

			$_SESSION['user_id'] = $db_id;
			$_SESSION['user_role'] = $db_role;
			$_SESSION['username'] = $db_username;

			header("Location: ../admin");
			
		}

	}


?>
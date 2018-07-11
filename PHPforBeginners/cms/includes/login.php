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

			$db_username = $user['username'];
			$db_firstname = $user['first_name'];
			$db_lastname = $user['last_name'];
			$db_role = $user['role'];
			$db_pw = $user['password'];

		}

		if(!password_verify($password, $db_pw)){
			
			header("Location: ../index.php");
		
		}else{

			$_SESSION['username'] = $db_username;
			$_SESSION['firstname'] = $db_firstname;
			$_SESSION['lastname'] = $db_lastname;
			$_SESSION['role'] = $db_role;

			header("Location: ../admin");
			
		}

	}


?>
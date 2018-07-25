<?php

	if(isset($_POST['submit_registration'])){

		$username = mysqli_real_escape_string($connection, $_POST['registration_username']);
		$email = mysqli_real_escape_string($connection, $_POST['registration_email']);
		$password = mysqli_real_escape_string($connection, $_POST['registration_password']);

		$encrypt_pw = password_hash($password, PASSWORD_DEFAULT, array('cost' => 10));

		/**
		 * Inserting new users to the database.		
		*/
	
		$query_new_user = "INSERT INTO users ";
		$query_new_user .= "(username, password, email) ";
		$query_new_user .= "VALUES ('$username', '$encrypt_pw', '$email') ";

		mysqli_query($connection, $query_new_user) or die("Failed to register new user. <br />Error: " . mysqli_error($connection));
	}


?>
<?php 


	function update () {
		global $connection;

		if(isset($_POST['submit'])){

			$username = mysqli_real_escape_string($connection, $_POST['username']);
			$pw = mysqli_real_escape_string($connection, $_POST['password']);

			$hash = "$2y$10$";
			$salt = md5($_POST['username']);
			$hash_salt = $hash . $salt;

			$pw_encrypted = crypt($pw, $hash_salt);

			$query = "INSERT INTO users (username, password) ";
			$query .= "VALUES ('$username', '$pw_encrypted')";

			mysqli_query($connection, $query) or die('Error Updating DB!');

		}


	}


	function read () {

		global $connection;

		if(isset($_POST['submitRead'])){

			$username = mysqli_real_escape_string($connection, $_POST['usernameRead']);

			$query = "SELECT password FROM users ";
			$query .= "WHERE username = '$username'";

			$result = mysqli_query($connection, $query) or die('Error Reading data from DB!');

			while($item = mysqli_fetch_assoc($result)){

				echo "La password di " . $username . " è: " . $item['password'];

			}

		}


	}


?>
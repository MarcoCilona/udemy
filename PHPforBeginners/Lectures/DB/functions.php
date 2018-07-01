<?php 


	function update () {
		global $connection;

		if(isset($_POST['submit'])){

			$username = mysqli_real_escape_string($connection, $_POST['username']); //escaping special characters in a string
			$pw = mysqli_real_escape_string($connection, $_POST['password']);

			//setting type of hashing and salt
			$hash = "$2y$10$";
			$salt = md5($_POST['username']); //use md5 hashing so that two different users cannot have the same encrypted pw
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
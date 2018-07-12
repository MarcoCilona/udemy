<?php

	function count_information () {

		global $connection;
		
		$conter_info = array();

		// QUERY FOR POSTS ROWS
		$rows_info = "SELECT ";
		$rows_info .= "(SELECT COUNT(post_id) FROM posts) AS post_rows, ";
		$rows_info .= "(SELECT COUNT(cat_id) FROM categories) AS cat_rows, ";
		$rows_info .= "(SELECT COUNT(id) FROM users) AS user_rows, ";
		$rows_info .= "(SELECT COUNT(comment_id) FROM comments) AS comment_rows ";

		$number_of_rows = mysqli_query($connection, $rows_info) or die("Failed to count posts. <br />Error: " . mysqli_error($connection));

		return mysqli_fetch_assoc($number_of_rows);

	}

	if(isset($_POST['dashboard_action'])){

		include_once('../../includes/db.php');

		$rows_info = "SELECT ";
		$rows_info .= "(SELECT COUNT(post_id) FROM posts) AS Post, ";
		$rows_info .= "(SELECT COUNT(cat_id) FROM categories) AS Category, ";
		$rows_info .= "(SELECT COUNT(id) FROM users) AS User, ";
		$rows_info .= "(SELECT COUNT(comment_id) FROM comments) AS Comment ";

		$number_of_rows = mysqli_query($connection, $rows_info) or die("Failed to count posts. <br />Error: " . mysqli_error($connection));
		
		print_r(json_encode(mysqli_fetch_assoc($number_of_rows)));
	}


?>
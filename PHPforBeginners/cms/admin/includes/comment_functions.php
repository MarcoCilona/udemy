<?php 
	
	/*
		@brief Showing all comments saved on the DB

	*/
	function show_comments () {

		global $connection;

		$query = "SELECT comments.*, posts.post_title FROM comments ";
		$query .= "INNER JOIN posts ";
		$query .= "ON comments.comment_post_id = posts.post_id ";

		$all_comments = mysqli_query($connection, $query) or die ("Failed to load all the comments. <br />Error: " . mysqli_error($connection));

		while($single_comm = mysqli_fetch_assoc($all_comments)){

			$id = $single_comm['comment_id'];
			$comm_author = $single_comm['comment_author'];
			$comm_content = $single_comm['comment_content'];
			$comm_date = $single_comm['comment_date'];
			$comm_email = $single_comm['comment_email'];
			$comm_status = $single_comm['comment_status'];
			$comm_related_post = $single_comm['post_title'];
			$comm_post_id = $single_comm['comment_post_id'];
			
			echo "<tr>";
			echo "<td>{$id}</td>";
			echo "<td>{$comm_author}</td>";
			echo "<td>{$comm_content}</td>";
			echo "<td>{$comm_date}</td>";
			echo "<td>{$comm_email}</td>";
			echo "<td>{$comm_status}</td>";
			echo "<td><a href=\"../post.php?id={$comm_post_id}\">{$comm_related_post}</a></td>";
			echo "<td><a href=\"comments.php?approve={$id}\">Approve</a></td>";
			echo "<td><a href=\"comments.php?unapprove={$id}\">Unapprove</a></td>";
			echo "<td><a href=\"comments.php?delete_comment={$id}&post={$comm_post_id}\">Delete</a></td>";


		}


	}


	function delete_comment () {

		global $connection;

		if(isset($_GET['delete_comment'])){

			$comm_id = $_GET['delete_comment'];

			$query = "DELETE FROM comments ";
			$query .= "WHERE comment_id = {$comm_id} ";

			mysqli_query($connection, $query) or die ("Unable to delete comment. <br />Error: " . mysqli_error($connection));

			$post_id = $_GET['post'];
			$decrease_query = "UPDATE posts ";
			$decrease_query .= "SET post_comment_count = post_comment_count - 1 ";
			$decrease_query .= "WHERE post_id =  $post_id ";

			mysqli_query($connection, $decrease_query) or die("Unable to update comment post counter. <br />Error: " . mysqli_error($connection));

			header("Location: comments.php");
		}

	}

	function change_status () {

		global $connection;

		if(isset($_GET['approve'])){

			$comm_id = $_GET['approve'];

			$query = "UPDATE comments ";
			$query .= "SET comment_status = 'approved' ";
			$query .= "WHERE comment_id = $comm_id";

			mysqli_query($connection, $query) or die("Unable to change comment's status. <br />Error: " . mysqli_error($connection));

			header("Location: comments.php");
		}

		if(isset($_GET['unapprove'])){

			$comm_id = $_GET['unapprove'];

			$query = "UPDATE comments ";
			$query .= "SET comment_status = 'unapproved' ";
			$query .= "WHERE comment_id = $comm_id";

			mysqli_query($connection, $query) or die("Unable to change comment's status. <br />Error: " . mysqli_error($connection));

			header("Location: comments.php");
		}

	}

?>
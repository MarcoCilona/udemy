<?php 
	
	/*
		
		@brief Saving new comment in the DB.
		
	*/
	if(isset($_POST['submit_comment'])){

		$comment_post_id = $_GET['id'];
		$comment_day = date('d-m-y');		
		$comment_author = $_POST['comm_author'];
		$comment_email = $_POST['comm_email'];
		$comment_content = $_POST['comm_content'];

		$query = "INSERT INTO comments (comment_post_id, comment_date, comment_author, comment_email, comment_content) ";
		$query .= "VALUES ($comment_post_id, now(), '$comment_author', '$comment_email', '$comment_content') ";

		mysqli_query($connection, $query) or die("Failed to save new comment. <br />Error: " . mysqli_error($connection));

		$query = "UPDATE posts ";
		$query .= "SET post_comment_count = post_comment_count + 1 ";
		$query .= "WHERE post_id = $comment_post_id ";

		mysqli_query($connection, $query) or die ("Unable to update post comment counter. <br />Error: " . mysqli_error($connection));

		header("Location: post.php?id=$comment_post_id");

	}

	/*
		
		@brief Showing all comments related to one post.

	*/
	function show_comments () {

		global $connection;
		$comment_post_id = $_GET['id'];

		$query = "SELECT * FROM comments ";
		$query .= "WHERE comment_post_id =  $comment_post_id AND comment_status = 'approved' ";
		$query .= "ORDER BY comment_id DESC ";

		$all_comments = mysqli_query($connection, $query) or die ("Failed to read all comments. <br />Error: " . mysqli_error($connection));

		while($single_comment = mysqli_fetch_assoc($all_comments)){

			$comm_author = $single_comment['comment_author'];
			$comm_date = $single_comment['comment_date'];
			$comm_content = $single_comment['comment_content'];

		?>

			<div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comm_author; ?>
                            <small><?php echo $comm_date; ?></small>
                        </h4>
                        <?php echo $comm_content; ?>
                    </div>
                </div>
	<?php 

		}
	}


?>
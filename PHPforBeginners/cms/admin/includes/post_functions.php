<?php 


	function show_posts (){

		global $connection; 

		$query = "SELECT * FROM posts ";

		$posts = mysqli_query($connection, $query) or die ("Failed to return al posts. <br />Error: " . mysqli_error($connection));

		while($single_post = mysqli_fetch_assoc($posts)){
			$post_id = $single_post['post_id'];
			$post_category_id = $single_post['post_category_id'];
			$post_title = $single_post['post_title'];
			$post_author = $single_post['post_author'];
			$post_date = $single_post['post_date'];
			$post_img = $single_post['post_img'];
			$post_content = $single_post['post_content'];
			$post_tag = $single_post['post_tag'];
			$post_comment_count = $single_post['post_comment_count'];
			$post_status = $single_post['post_status'];

			echo "<tr>";
			echo "<td>{$post_id}</td>";
			echo "<td>{$post_author}</td>";
			echo "<td>{$post_content}</td>";
			echo "<td>{$post_title}</td>";
			echo "<td>{$post_category_id}</td>";
			echo "<td>{$post_status}</td>";
			echo "<td>{$post_img}</td>";
			echo "<td>{$post_tag}</td>";
			echo "<td>{$post_date}</td>";
			echo "<td>{$post_comment_count}</td>";
			echo "</tr>";



		}

	}



?>
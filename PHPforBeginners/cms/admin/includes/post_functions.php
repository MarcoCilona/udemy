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
			echo "<td><img class='img-responsive' src='../images/$post_img' /></td>";
			echo "<td>{$post_tag}</td>";
			echo "<td>{$post_date}</td>";
			echo "<td>{$post_comment_count}</td>";
			echo "</tr>";

		}

	}
	

	if(isset($_POST['add_post'])){

		$post_title = $_POST['title'];
		$post_author = $_POST['author'];
		$post_category_id = $_POST['post_category_id'];
		$post_status = $_POST['status'];

		$post_img = $_FILES['img']['name'];
		$post_img_temp = $_FILES['img']['tmp_name'];

		move_uploaded_file($post_img_temp, "../images/$post_img");

		$post_tags = $_POST['tags'];
		$post_content = $_POST['content'];
		$post_date = date('d-m-y');
		$post_comment_count = 0;

		$query = "INSERT INTO posts (post_category_id, post_title, post_author, post_date, post_img, post_content, post_tag, post_comment_count, post_status) ";
		$query .= "VALUES ($post_category_id, '$post_title', '$post_author', now(), '$post_img', '$post_content', '$post_tags', $post_comment_count, '$post_status') ";

		mysqli_query($connection, $query) or die ('Failed to add new post. <br />Error: ' . mysqli_error($connection));
	}



?>
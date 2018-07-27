<?php 

	/*
		@brief Function used to show all post saved on DB. 

	*/
	function show_posts (){

		global $connection; 

		/**
		 * Query to retrieve all posts in the DB.
		 */
		$query_show_posts = "SELECT posts.*, categories.cat_title, post_status.status_name FROM posts ";
		$query_show_posts .= "LEFT JOIN categories ";
		$query_show_posts .= "ON posts.post_category_id = categories.cat_id ";
		$query_show_posts .= "LEFT JOIN post_status ";
		$query_show_posts .= "ON posts.post_status = post_status.post_status_id ";

		$posts = mysqli_query($connection, $query_show_posts) or die ("Failed to return al posts. <br />Error: " . mysqli_error($connection));

		while($single_post = mysqli_fetch_assoc($posts)){

			$post_id = $single_post['post_id'];
			$post_category_id = $single_post['post_category_id'];
			$post_title = $single_post['post_title'];
			$post_author = $single_post['post_author'];
			$post_date = $single_post['post_date'];
			$post_img = $single_post['post_img'];
			$post_content = $single_post['post_content'];
			$post_tag = $single_post['post_tag'];
			//$post_comment_count = $single_post['post_comment_count'];
			$post_status = $single_post['status_name'];
			$post_cat_name = $single_post['cat_title'];


			/**
			 * Query to return the number of comment for this specific post.
			 */
			$query_num_comments = "SELECT * FROM comments WHERE comment_post_id = $post_id ";
			$query_result = mysqli_query($connection, $query_num_comments) or die("Failed to retrive number of comments. <br />Error: " . mysqli_error($connection));
			$comm_num = mysqli_num_rows($query_result);

			/**
			 * Displayin the result in the HTML table.
			 */
			echo "<tr>";

			?>
				<td><input type="checkbox" class="checkBoxes" name="checkBoxArray[]" value="<?php echo $post_id; ?>"></td>

			<?php 

			echo "<td>{$post_id}</td>";
			echo "<td>{$post_author}</td>";
			echo "<td><a href=\"../post.php?id={$post_id}\">{$post_title}</a></td>";
			echo "<td>{$post_content}</td>";
			echo "<td>{$post_cat_name}</td>";
			echo "<td>{$post_status}</td>";
			echo "<td><img class='img-responsive' src='../images/$post_img' /></td>";
			echo "<td>{$post_tag}</td>";
			echo "<td>{$post_date}</td>";
			echo "<td>{$comm_num}</td>";
			echo "<td><a href=\"posts.php?source=edit&id={$post_id}\">Edit</a></td>";
			echo "<td><a onclick=\"javascript: return confirm('Are you sure you want to delete this post?');\" href=\"posts.php/?source=delete&id=$post_id\">Delete</a></td>";
			echo "</tr>";

		}

	}	
	
	/*
		@brief Updates the DB by adding new post.

	*/
	if(isset($_POST['add_post'])){

		$post_title = mysqli_real_escape_string($connection, $_POST['title']);
		$post_author = mysqli_real_escape_string($connection, $_POST['author']);
		$post_category_id = $_POST['category'];
		$post_status = mysqli_real_escape_string($connection, $_POST['status']);

		$post_img = $_FILES['img']['name'];
		$post_img_temp = $_FILES['img']['tmp_name'];

		move_uploaded_file($post_img_temp, "../images/$post_img");

		$post_tags = mysqli_real_escape_string($connection, $_POST['tags']);
		$post_content = mysqli_real_escape_string($connection, $_POST['content']);
		$post_date = date('d-m-y');
		
		$query = "INSERT INTO posts (post_category_id, post_title, post_author, post_date, post_img, post_content, post_tag, post_status) ";
		$query .= "VALUES ($post_category_id, '$post_title', '$post_author', now(), '$post_img', '$post_content', '$post_tags', '$post_status') ";

		mysqli_query($connection, $query) or die ('Failed to add new post. <br />Error: ' . mysqli_error($connection));

		header("Location: ./posts.php");
	}


	/*
		
		@brief Function to delete from the db a selected post.


	*/
	function delete_post ($id){

		global $connection;

		$query = "DELETE FROM posts ";
		$query .= "WHERE post_id = $id ";

		mysqli_query($connection ,$query) or die('Failed to delete post. <br />Error: ' . mysqli_error($connection));		

		header("Location: ../posts.php");
	}


	/*
		
		@brief Function to be called to retrieve information about the post to be modified so that the form for the changes can be filled.

	*/
	function update_post (){
		
		global $connection;

		$post_info = array();

		if(isset($_GET['id'])){

			$post_id = $_GET['id'];

			$query = "SELECT * FROM posts ";
			$query .= "WHERE post_id = $post_id ";

			$posts = mysqli_query($connection, $query) or die ("Failed to return al posts. <br />Error: " . mysqli_error($connection));

			while($single_post = mysqli_fetch_assoc($posts)){
				$post_info['category_id'] = $single_post['post_category_id'];
				$post_info['title'] = $single_post['post_title'];
				$post_info['author'] = $single_post['post_author'];
				$post_info['date'] = $single_post['post_date'];
				$post_info['img'] = $single_post['post_img'];
				$post_info['content'] = $single_post['post_content'];
				$post_info['tag'] = $single_post['post_tag'];
				$post_info['status'] = $single_post['post_status'];
			}
		}	

		return $post_info;

	}

	/*
	
		@brief Function to push the post's changes to the DB.

	*/
	if(isset($_POST['edit_post'])){

		$post_id = $_GET['id'];

		$post_title = mysqli_real_escape_string($connection, $_POST['title']);
		$post_author = mysqli_real_escape_string($connection, $_POST['author']);
		$post_category_id = $_POST['category'];
		$post_status = mysqli_real_escape_string($connection, $_POST['status']);

		$post_img = $_FILES['img']['name'];
		$post_img_temp = $_FILES['img']['tmp_name'];

		move_uploaded_file($post_img_temp, "../images/$post_img");

		if(empty($post_img)){

			$query = "SELECT post_img FROM posts WHERE post_id = $post_id ";
			$result = mysqli_query($connection, $query);

			while($item = mysqli_fetch_assoc($result)){
				$post_img = $item['post_img'];
			}

		}

		$post_tags = mysqli_real_escape_string($connection, $_POST['tags']);
		$post_content = mysqli_real_escape_string($connection, $_POST['content']);
		$post_date = date('d-m-y');
		
		$query = "UPDATE posts  ";
		$query .= "SET post_category_id = $post_category_id, post_title ='$post_title', post_author = '$post_author', post_date = now(), post_img = '$post_img', post_content = '$post_content', post_tag = '$post_tags', post_status = '$post_status' ";
		$query .= "WHERE post_id = $post_id ";

		mysqli_query($connection, $query) or die ('Failed to add new post. <br />Error: ' . mysqli_error($connection));

		header("Location: ./posts.php");
			

	}

	/**
	 * Bulk options handler. Functionalities are: switch status, deleting, cloning posts.
	 */
	if(isset($_POST['apply_action']) && isset($_POST['checkBoxArray'])){
		
		foreach ($_POST['checkBoxArray'] as $value) {
			$bulk_option = $_POST['bulk_option'];

			switch ($bulk_option) {

				case "0":
					
					$query = "UPDATE posts SET post_status = 0 ";
					$query .= "WHERE post_id = $value ";

					mysqli_query($connection, $query) or die(mysqli_error($connection));
					break;

				case "1":
						
					$query = "UPDATE posts SET post_status = 1 ";
					$query .= "WHERE post_id = $value ";

					mysqli_query($connection, $query) or die(mysqli_error($connection));
					break;

				case "delete":
					
					$query = "DELETE FROM posts ";
					$query .= "WHERE post_id = $value ";

					mysqli_query($connection, $query) or die(mysqli_error($connection));
					break;

				case "clone":
					
					$query = "INSERT INTO posts ";
					$query .= " (post_category_id, post_title, post_author, post_date, post_img, post_content, post_tag, post_status) ";
					$query .= "SELECT post_category_id, post_title, post_author, post_date, post_img, post_content, post_tag, post_status ";
					$query .= "FROM posts ";
					$query .= "WHERE post_id = $value ";

					mysqli_query($connection, $query) or die(mysqli_error($connection));
					break;				

								
				default:
	
					break;
			}
		}

	}
	
?>
<?php 
	
	if(isset($_POST['submit_Cat'])){

		if(isset($_POST['cat_title']) && !empty($_POST['cat_title'])){

			$cat_name = $_POST['cat_title'];

			$query = "INSERT INTO categories (cat_title) ";
			$query .= "VALUES ('$cat_name')";

			mysqli_query($connection, $query) or die ("Failed to insert new Category. <br>" . mysqli_error($connection));
		}else{

			echo "<div class='alert alert-info role='alert'>To preoceed enter some values, please.</div>";

		}
		
		header("Location: categories.php");
	}


	if(isset($_GET['delete'])){

		$item = $_GET['delete'];

		$query = "DELETE FROM categories "; 
		$query .= "WHERE cat_id = '$item'";
		mysqli_query($connection, $query) or die ("Failed to remove category." . mysqli_error($connection));

	}

	if(isset($_POST['update_submit_Cat'])){

		$new_title = $_POST['update_cat_title'];
		$cat_id = $_GET["update"];

		$query = "UPDATE categories ";
		$query .= "SET cat_title = '$new_title' ";
		$query .= "WHERE cat_id = '$cat_id' ";

		mysqli_query($connection, $query);

		
		header("Location: categories.php");
	}

?>
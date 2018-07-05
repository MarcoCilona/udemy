<?php 
	
	// check if admin is trying to add new category and add it
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


	// check if admin is trying to delete new category and delete it
	if(isset($_GET['delete'])){

		$item = $_GET['delete'];

		$query = "DELETE FROM categories "; 
		$query .= "WHERE cat_id = '$item'";
		mysqli_query($connection, $query) or die ("Failed to remove category." . mysqli_error($connection));

		header("Location: categories.php");

	}
	
	// check if admin is trying to update category title and update it
	if(isset($_POST['update_submit_Cat'])){

		$new_title = $_POST['update_cat_title'];
		$cat_id = $_GET["update"];

		$query = "UPDATE categories ";
		$query .= "SET cat_title = '$new_title' ";
		$query .= "WHERE cat_id = '$cat_id' ";

		mysqli_query($connection, $query);

		
		header("Location: categories.php");
	}


	function cat_table () {

		global $connection;

        $query = "SELECT * FROM categories";

        $cat_results = mysqli_query($connection, $query) or die ("Query failed!");

        while($category = mysqli_fetch_assoc($cat_results)){

            echo "<tr>";
            echo "<td>{$category['cat_id']}</td>";
            echo "<td>{$category['cat_title']}</td>";
            echo "<td><a href='categories.php?delete={$category['cat_id']}'>Delete</a></td>";
            echo "<td><a href='categories.php?update={$category['cat_id']}'>Update</a></td>";
            echo "</tr>";

        }


	}

?>
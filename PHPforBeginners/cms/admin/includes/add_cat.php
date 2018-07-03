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

	}

?>
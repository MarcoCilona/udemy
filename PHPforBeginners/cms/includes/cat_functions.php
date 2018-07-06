<?php

	function show_cat(){

		global $connection;

        $query = "SELECT * FROM categories ";

        $result = mysqli_query($connection, $query) or die ('Failed to execute query. <br> error: ' . mysqli_error($connection)); 

        while($category = mysqli_fetch_assoc($result)){
            $cat_id = $category['cat_id'];
            $cat_title = $category['cat_title'];

            echo "<li><a href='category.php?cat=$cat_id'>{$cat_title}</a></li>";
        

        } 

	}


?>
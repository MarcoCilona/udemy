<form method="POST">
    <div class="form-group">
        <label for="cat_title">Modify Category Title</label>
        <?php 
            if(isset($_GET['update'])){
                
                $item = $_GET['update'];
            
                $query = "SELECT * FROM categories ";
                $query .= "WHERE cat_id = '$item'";

                $selected_cat = mysqli_query($connection, $query) or die('Failed to select item to be modified.' . mysqli_error($connection));

                while($item = mysqli_fetch_assoc($selected_cat)){
                    $cat_title = $item['cat_title'];

                    ?>

                <input class="form-control" type="text" name="update_cat_title" value="<?php if(isset($cat_title)){ echo $cat_title;} ?>">
                
                <?php    

                }
            }        
        ?>                                    

    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_submit_Cat" value="Update category">
    </div>                                                              
</form>
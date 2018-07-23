<?php 

    include('includes/db.php'); 

?>


<?php  
    
    include('includes/templates/header.php');
    include('includes/templates/nav.php');

?>


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">



                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                 
                <?php 

                    if(isset($_GET['id']))
                        $post_id = $_GET['id'];

                    $query = "SELECT * FROM posts ";
                    $query .= "WHERE post_id = $post_id AND post_status = 0 ";

                    $post_results = mysqli_query($connection, $query) or die ("Failed to read data from db. Error: " . mysqli_error($connection));

                    while($item = mysqli_fetch_assoc($post_results)){
                        
                        $post_title = $item['post_title'];
                        $post_author = $item['post_author'];
                        $post_date = $item['post_date'];
                        $post_img = $item['post_img'];
                        $post_content = $item['post_content'];

                        ?>

                        <!-- First Blog Post -->
                        <h2>
                            <?php echo $post_title; ?>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $post_author; ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                        <hr>
                        <img class="img-responsive" src="<?php echo 'images/'. $post_img; ?>" alt="">
                        <hr>
                        <p><?php echo $post_content; ?></p>

                        <hr>                   
                
                <?php
                    
                    }

                ?>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form method="POST" role="form">
                        
                        <label for="comm_author">Name</label>    
                        <div class="form-group">
                            <input type="text" class="form-control" name="comm_author">
                        </div>
                        
                        <label for="comm_email">E-mail</label>
                        <div class="form-group">
                            <input type="email" class="form-control" name="comm_email">
                        </div>
                        <label>Comment</label>
                        <div class="form-group">
                            <textarea class="form-control" name="comm_content" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit_comment">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <?php show_comments(); ?>

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

<?php include('includes/templates/sidebar.php'); ?>

        </div>
        <!-- /.row -->
<?php include('includes/templates/footer.php'); ?>


    </div>
    <!-- /.container -->

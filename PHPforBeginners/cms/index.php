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

                    $query = "SELECT * FROM posts";
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
                            <a href="#"><?php echo $post_title; ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $post_author; ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                        <hr>
                        <img class="img-responsive" src="<?php echo $post_img; ?>" alt="">
                        <hr>
                        <p><?php echo $post_content; ?></p>
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>                   
                
                <?php
                    
                    }

                ?>

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

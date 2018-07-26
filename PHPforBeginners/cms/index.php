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
                   
                    $per_page = 5;
                   
                    /**
                     * PAGINATION
                     * Counting out the number of posts saved on the DB.
                     * Setting the number of posts to show per page.
                     * 
                     */
                    $count_post_query = "SELECT COUNT(post_id) as posts_count FROM posts ";
                    $count = mysqli_query($connection, $count_post_query);
                    $number_of_posts = mysqli_fetch_assoc($count);

                    $number_of_pages = ceil($number_of_posts['posts_count']/$per_page);

                    if(isset($_GET['page'])){

                        $page = $_GET['page'];
                        $page_1 = ($page * $per_page) - 5;

                    }else{

                        $page = 1;
                        $page_1 = 0;

                    }

                    /**
                     * Returning all the posts saved and ready to be published.
                     */
                    $query = "SELECT * FROM posts ";
                    $query .= "WHERE post_status = 0 ";
                    $query .= "LIMIT $page_1, 5 ";
                    $post_results = mysqli_query($connection, $query) or die ("Failed to read data from db. Error: " . mysqli_error($connection));

                    while($item = mysqli_fetch_assoc($post_results)){
                        
                        $post_id = $item['post_id'];
                        $post_title = $item['post_title'];
                        $post_author = $item['post_author'];
                        $post_date = $item['post_date'];
                        $post_img = $item['post_img'];
                        $post_content = substr($item['post_content'], 0, 200);

                        ?>

                        <!-- First Blog Post -->
                        <h2>
                            <a href="post.php?id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="user_related_posts.php?author_name=<?php echo $post_author; ?>"><?php echo $post_author; ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                        <hr>
                        <a href="post.php?id=<?php echo $post_id; ?>">
                        <img class="img-responsive" src="<?php echo 'images/'. $post_img; ?>" alt="">
                        </a>
                        <hr>
                        <p><?php echo $post_content; ?></p>
                        <a class="btn btn-primary" href="post.php?id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>                   
                
                <?php
                    
                    }

                ?>

                <!-- Pager -->
                <ul class="pager">
                    <?php 

                        for ($i=1; $i <= $number_of_pages; $i++) { 
                            
                            ?>
                            <li>
                                <a href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>

                            <?php
                        }

                    ?>
  
                    <li class="previous">
                        <a href="index.php?page=<?php echo ($page-1 >= 1) ? $page-1 : $page; ?>">&larr; Prev</a>
                    </li>
                    <li class="next">
                        <a href="index.php?page=<?php echo ($page+1 <= $number_of_pages) ? $page+1 : $page; ?>">Next &rarr;</a>
                    </li>
                </ul>

            </div>

<?php include('includes/templates/sidebar.php'); ?>

        </div>
        <!-- /.row -->
<?php include('includes/templates/footer.php'); ?>


    </div>
    <!-- /.container -->

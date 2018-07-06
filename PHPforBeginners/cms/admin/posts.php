<?php 

	include('includes/templates/header.php');
	include('includes/templates/navigation.php');
	include('includes/post_functions.php');

?>   
<div id="wrapper">
	<div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Blank Page
                        <small>Subheading</small>
                    </h1>
				 	<?php 

				 		$source = null;

				 		if(isset($_GET['source']))
				 			$source = $_GET['source'];
						
						switch ($source) {
							case 'add':
								include('includes/templates/add_post.php');
								break;
							
							default:
								include('includes/templates/view_all_posts.php');
								break;
						}

				 	?>
				</div>                   
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

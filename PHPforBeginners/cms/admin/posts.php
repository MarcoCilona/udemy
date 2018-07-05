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

					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Author</th>
								<th>Content</th>
								<th>Title</th>
								<th>Categories</th>
								<th>Status</th>
								<th>Image</th>
								<th>Tags</th>
								<th>Date</th>
								<th>Comments</th>
							</tr>
						</thead>
						<tbody>
							<?php show_posts(); ?>
						</tbody>
					</table>

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

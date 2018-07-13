<?php include('includes/templates/header.php'); ?>

   
    <div id="wrapper">

        <!-- Navigation -->
<?php include('includes/templates/navigation.php'); ?>      

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin Page, 
                            <small><?php echo $username_to_show ?></small>
                        </h1>

                    </div>
                </div>
                <!-- /.row -->
				<?php include("includes/templates/edit_profile.php"); ?>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include("includes/templates/footer.php") ?>

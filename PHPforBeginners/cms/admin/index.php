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
                            <small><?php echo $username_to_show; ?></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <?php 

                    /*
                        @brief Including the template of the widgets.
                    */
                    include("includes/templates/admin_widgets.php");
                                    
                ?>

                <div class="row">
                    <div class="col-xs-12" id="columnchart_material" style="height: 500px;"></div>
                </div>                 

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include("includes/templates/footer.php") ?>

<!-- including google chart -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src ="js/chart.js"></script>
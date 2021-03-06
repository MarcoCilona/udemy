
<?php 

    include('includes/templates/header.php');
    include('includes/cat_function.php');

?>
   
   <div id="wrapper">

        <!-- Navigation -->
<?php include('includes/templates/navigation.php'); ?>      

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blank Page
                            <small>Subheading</small>
                        </h1>

                        <div class="col-xs-6">
                            <!--- Includes of functions files -->
                            
                            <form method="POST">
                                <div class="form-group">
                                    <label for="cat_title">Add Category</label>
                                    <input class="form-control" type="text" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit_Cat" value="Add category">
                                </div>                                                              
                            </form>
                            <?php 

                                if(isset($_GET['update'])){

                                    include('includes/templates/update_category.php');

                                }

                            ?>
                        </div>
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <caption>List of all categories</caption>
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  

                                        cat_table();

                                    ?>     
                                </tbody>
                            </table>
                        </div>
                        
<!--                         <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol> -->
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include("includes/templates/footer.php") ?>

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
                            Blank Page
                            <small>Subheading</small>
                        </h1>

                        <div class="col-xs-6">
                            <!--- Includes of functions files -->
                            <?php include('includes/add_cat.php'); ?>
                            <form method="POST">
                                <div class="form-group">
                                    <label for="cat_title">Category title</label>
                                    <input class="form-control" type="text" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit_Cat" value="Add category">
                                </div>                                                              
                            </form>
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

                                        $query = "SELECT * FROM categories";

                                        $cat_results = mysqli_query($connection, $query) or die ("Query failed!");

                                        while($category = mysqli_fetch_assoc($cat_results)){

                                            echo "<tr><td>{$category['cat_id']}</td>";
                                            echo "<td>{$category['cat_title']}</td></tr>";

                                        }

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

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

<?php  include "includes/db.php"; ?>
<?php  include "includes/templates/header.php"; ?>
<?php  include "includes/registration_functions.php"; ?>


    <!-- Navigation -->
    
    <?php  include "includes/templates/nav.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Subscribe!</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off" class="was-validated">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="registration_username" id="username" class="form-control" placeholder="Enter Desired Username" required>
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="registration_email" id="email" class="form-control" placeholder="somebody@example.com" required>
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="registration_password" id="key" class="form-control" placeholder="Password" required>
                        </div>
                
                        <input type="submit" name="submit_registration" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/templates/footer.php";?>

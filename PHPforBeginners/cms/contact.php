<?php  include "includes/db.php"; ?>
<?php  include "includes/templates/header.php"; ?>
<?php  include "includes/contact_functions.php"; ?>


    <!-- Navigation -->
    
    <?php  include "includes/templates/nav.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Contact me!</h1>
                <?php echo (isset($contact_msg)) ? $contact_msg : "" ?>
                    <form role="form" action="contact.php" method="post" id="login-form" autocomplete="off" class="was-validated">
                        <div class="form-group">
                            <label for="subject" class="sr-only">Subject</label>
                            <input type="text" name="contact_subject" id="username" class="form-control" placeholder="Enter your subject" required>
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="contact_email" id="email" class="form-control" placeholder="somebody@example.com" required>
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Text</label>
                            <textarea col="30" rows="8" class="form-control" name="contact_content"></textarea>
                        </div>
                        <input type="submit" name="submit_contact" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Contact me!">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/templates/footer.php";?>

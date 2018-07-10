            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <!-- Form search -->
                    <form action="search.php" method="POST">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search">
                            <span class="input-group-btn">
                                <button class="btn btn-default" name="submit" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                            </button>
                            </span>
                        </div>    
                    </form><!-- /. form tag -->                    
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <?php  

                                    show_cat();           

                                ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Log in form -->
                <div class="well">
                    <h4>Log in</h4>
                    <!-- Form search -->
                    <form action="includes/login.php" method="POST">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="login_username" placeholder="Enter username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="login_password" placeholder="Enter password">
                        </div>
                        <button class="btn btn-primary" name="login_submit" type="submit">Log In</button>
                    </form><!-- /. form tag -->                    
                    <!-- /.input-group -->
                </div>
                <!-- /.log in form -->   

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>
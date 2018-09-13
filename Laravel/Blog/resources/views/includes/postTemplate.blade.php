<!-- First Blog Post -->
<h2>
    <a href="@yield('post_link')">@yield('post_title')</a>
</h2>
<p class="lead">
    by <a href="index.php">@yield('post_author')</a>
</p>
<p><span class="glyphicon glyphicon-time"></span> @yield('post_date')</p>
<hr>
<img class="img-responsive" src="@yield('post_img')" alt="">
<hr>
<p style="word-break: break-all;">@yield('post_abstract')</p>
<a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

<hr>
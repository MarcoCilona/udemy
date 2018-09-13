 <div class="media">
<a class="pull-left" href="#">
    <img class="media-object img-rounded" height="100px" src="@yield('comment_img')" alt="">
</a>
<div class="media-body">
    <h5 class="media-heading">Created at:
        <small>@yield('comment_date')</small>
    </h5>
    @yield('comment_body')
</div>
</div>
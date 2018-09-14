<!-- First Blog Post -->
<h2>
    <a href="{{ route('post.show', $post->id) }}">{{$post->title}}</a>
</h2>
<p class="lead">
    by <a href="index.php">{{$post->author->name}}</a>
</p>
<p><span class="glyphicon glyphicon-time"></span> {{$post->created_at->diffForHumans()}}</p>
<hr>
<img class="img-responsive" src="{{ $post->photos->filePath }}" alt="">
<hr>
<p style="word-break: break-all;">{{str_limit($post->content, $limit = 100)}}</p>
<a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

<hr>
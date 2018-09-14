 <div class="media">
<a class="pull-left" href="#">
    <img class="media-object img-rounded" height="100px" src="{{ $comment->authorName->photos->filePath }}" alt="">
</a>
<div class="media-body">
    <h5 class="media-heading">Created at:
        <small>{{ $comment->created_at->diffForHumans() }}</small>
    </h5>
    {{$comment->body}}
</div>
</div>
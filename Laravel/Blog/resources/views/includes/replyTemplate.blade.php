<div class="media">
	<a class="pull-left" href="#">
	    <img class="media-object img-rounded" height="50px" src="{{ $reply->authors->photos->filePath }}" alt="">
	</a>
	<div class="media-body">
	    <h5 class="media-heading"><span class="lead">{{ $reply->authors->name }} </span>Created at:
	        <small>{{ $reply->created_at->diffForHumans() }}</small>
	    </h5>
	    <p>{{$reply->body}}</p>
	</div>
</div>
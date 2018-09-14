<div class="media">
	<a class="pull-left" href="#">
	    <img class="media-object img-rounded" height="100px" src="{{ $obj->authors->photos->filePath }}" alt="">
	</a>
	<div class="media-body">
	    <h5 class="media-heading"><span class="lead">{{ $obj->authors->name }} </span>Created at:
	        <small>{{ $obj->created_at->diffForHumans() }}</small>
	    </h5>
	    <p>{{$obj->body}}</p>
	    
	    @foreach($obj->replies as $reply)
			@include('includes.replyTemplate')
		@endforeach
		
		@if($type != 'reply')
		    {!! Form::open(['method'=>'POST', 'action'=>'AdminCommentRepliesController@store']) !!}
				
				<input type="hidden" name="parent_comment" value="{{ $comment->id }}">

				<div class="form-group">
					{!! Form::label('reply', 'Reply') !!}
					{!! Form::textarea('reply', null,['class'=>'form-control', 'rows'=>2]) !!}
				</div>

				<div class="form-group">
					{!! Form::submit('Reply', ['class'=>'btn btn-primary']) !!}
				</div>

		    {!! Form::close() !!}
		@endif
	</div>
</div>
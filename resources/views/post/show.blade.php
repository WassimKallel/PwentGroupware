@extends('projectLayout')
@section('content')
			<h2 class="post-title">
							{{$post->title}}
			</h2>
			<p>
				{{$post->body}}	
			</p>
			<hr>
			<h2 class="post-title">
					Comments :
			</h2>
			{{-- @foreach($post->Comments as $comment) --}}
				{{-- <div class="post-preview"> --}}
						{{-- <p class="post-subtitle"> --}}
							{{-- {{$comment->body}} --}}
						{{-- </p> --}}
					{{-- <p class="post-meta">Posted by <a href="#">{{$comment->user->name }}</a> {{$comment->created_at->diffForHumans()}}</p> --}}
				{{-- </div>			 --}}
			{{-- @endforeach --}}
			@foreach($post->Comments as $comment)
          	<div class="panel panel-default">
          	  <div class="panel-body">
          	    {{$comment->body}}
          	  </div>
          	  <div class="panel-footer"><span {{-- class="pull-right" --}}><img class="thumbnail-sm" src="../uploads/profiles/avatars/{{$comment->user->avatar_path}}" data-toggle="modal" data-target="#avatarModal">    Posted by <a class="username" href="{{action('UserController@show',array('id' => $comment->user->id))}}">{{$comment->user->name }}</a> {{$comment->created_at->diffForHumans()}}</span><div class="clearfix"></div></div>
          	</div> 
          	@endforeach
				<hr>
          	<div class="panel panel-default">
          		<div class="panel-body">
					<div class="form-group"></div>
						{!! Form::open() !!}
						{!! Form::label('body', 'Add Comment',['class' => 'control-label']); !!}
						{!! Form::textArea('body',null,['class' => 'form-control span6', 'rows' => '5']); !!}
						<br>
					</div>
					<div class="panel-footer">
						{!! Form::submit('Add Comment', ['class' => 'btn btn-primary pull-right']) !!}
						{!! Form::close() !!}
						<div class="clearfix"></div>
					</div>
				</div>
@stop
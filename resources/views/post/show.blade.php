@extends('layout')

@section('pagetitle')
{{ $post->project->name }}
@stop

@section('background-image')
<header class="intro-header" style="background-image: url('/img/home-bg.jpg')">
@stop

@section('title')
{{ $post->project->name }}
@stop

@section('description')
{{ $post->project->description }} - {{ $post->project->status }}
@stop


@section('pageContent')
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
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
          	  <div class="panel-footer"><span {{-- class="pull-right" --}}><img class="thumbnail-sm" src="../uploads/profiles/avatars/{{$comment->user->avatar_path}}" data-toggle="modal" data-target="#avatarModal">    Posted by <a class="username" href="#">{{$comment->user->name }}</a> {{$comment->created_at->diffForHumans()}}</span><div class="clearfix"></div></div>
          	</div> 
          	@endforeach
				<hr>
				<!-- Pager -->
				<ul class="pager">
					<li class="next">
						<a href="#">Older Posts &rarr;</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
@stop
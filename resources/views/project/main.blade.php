@extends('layout')

@section('pagetitle')
{{ $project->name }}
@stop

@section('title')
{{ $project->name }}
@stop

@section('description')
{{ $project->description }}
@stop


@section('pageContent')
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			@foreach($project->Posts as $post)
				<div class="post-preview">
					<a href="post.html">
						<h2 class="post-title">
							{{$post->title}}
						</h2>
						<h3 class="post-subtitle">
							{{$post->body}}
						</h3>
					</a>
					<p class="post-meta">Posted by <a href="#">{{$post->user->name}}</a> {{$post->created_at->diffForHumans()}}</p>
				</div>
			<hr>
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
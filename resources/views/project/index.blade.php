@foreach($projects as $project)
	<a href="/projects/{{$project->id}}"><h1>{{ $project->name }}</h1></a>
	<h3>{{ $project->status }}</h3>
	<p>{{ $project->description }}</p>
@endforeach



@extends('layout')

@section('pagetitle')
{{ "Projects" }}
@stop

@section('background-image')
<header class="intro-header" style="background-image: url('/img/home-bg.jpg')">
@stop

@section('title')
{{ "Projects" }}
@stop



@section('pageContent')
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			@foreach($projects as $project)
				<div class="post-preview">
					<a href="/projects/{{$project->id}}">
						<h2 class="post-title">
							{{$post->title}}
						</h2>
						<h3 class="post-subtitle">
							{{$post->body}}
						</h3>
					</a>
					
					<p class="post-meta">Posted by <a href="#">{{$project->user->name}}</a> {{$project->created_at->diffForHumans()}}</p>
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
@extends('layout')

@section('pagetitle')
{{ $project->name }}
@stop

@section('background-image')
<header class="intro-header" style="background-image: url('/img/home-bg.jpg')">
@stop

@section('title')
{{ $project->name }}
@stop

@section('description')
{{ $project->status }}
@stop


@section('pageContent')
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			<p>
				{{ $project->description }}	
			</p>
			<hr>
			<h2>
			Related Posts:
			</h2>
			@foreach($project->Posts as $post)
				<div class="post-preview">
					<a href="/posts/{{$post->id}}">
						<h3 class="post-title">
							{{$post->title}}
						</h3>
						<p class="post-subtitle">
							{{ str_limit($post->body, 200) }}
						</p>
					</a>
					<p class="post-meta">Posted by <a href="{{action('UserController@show',array('id' => $post->user->id))}}">{{$post->user->name}}</a> {{$post->created_at->diffForHumans()}}</p>
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
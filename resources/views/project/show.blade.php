@extends('layout')

@section('pagetitle')
{{ $project->name }}
@stop

@section('background-image')
	@if(File::exists("../uploads/projects/header_images/".$project->header_image_path))
  		<header class="intro-header" style="background-image: url('../uploads/projects/header_images/{{$project->header_image_path}}')">
  	@elseif(File::exists("../../uploads/projects/header_images/".$project->header_image_path))
  		<header class="intro-header" style="background-image: url('../../uploads/projects/header_images/{{$project->header_image_path}}')">
  	@else
  		<header class="intro-header" style="background-image: url('../../../uploads/projects/header_images/{{$project->header_image_path}}')">
  	@endif
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
				<h1>Add new post</h1>
			<hr>
			<div class="form-group"></div>
			{!! Form::open() !!}
			{!! Form::label('title', 'Title',['class' => 'control-label']); !!}
			{!! Form::text('title',null,['class' => 'form-control']); !!}
			<br>
			{!! Form::label('body', 'Body',['class' => 'control-label']); !!}
			{!! Form::textArea('body',null,['class' => 'form-control']); !!}
			<br>
			
			{!! Form::submit('Post', ['class' => 'btn btn-primary form-control']) !!}
			{!! Form::close() !!}
			<hr>
			</div>

			

		</div>
	</div>
@stop
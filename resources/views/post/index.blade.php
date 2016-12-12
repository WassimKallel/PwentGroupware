@extends('projectLayout')

@section('content')
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
				<!-- Pager -->



				{{-- TODO Pagination --}}
				{{--
				<hr>
				<ul class="pager">
					<li class="next">
						<a href="#">Older Posts &rarr;</a>
					</li>
				</ul>
				--}}





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
@stop
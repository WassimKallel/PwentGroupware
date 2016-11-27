

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
			<h1>Add new Project</h1>
			<hr>
			<div class="form-group">
				{!! Form::open(['url' => '/projects', 'files' => true]) !!}
				{!! Form::label('name','Project name',['class' => 'control-label']); !!}
				{!! Form::text('name' ,null ,['class' => 'form-control']); !!}
	
				{!! Form::label('description', 'Description',['class' => 'control-label']); !!}
				{!! Form::text('description', null,['class' => 'form-control']); !!}

				{!! Form::label('status', 'Status', ['class' => 'control-label']); !!}
				{!! Form::select('status', ['in progress' => 'In Progress', 'scheduled' => 'Scheduled', 'finshed' => 'Finished'],['class' => '	form-control'], ['class' => 'form-control']); !!}
				{!! Form::label('header', 'header'); !!}
				{!! Form::file('header', ['class' => 'form-control']) !!}
			</div>
			{!! Form::submit('Add Project', ['class' => 'btn btn-primary form-control']); !!}
			{!! Form::close() !!}

				<hr>
				<!-- Pager -->
				<ul class="pager">
					<li class="previous">
						<a href="{{action('ProjectController@index')}}">Back to Projects</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
@stop
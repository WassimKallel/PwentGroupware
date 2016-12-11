@extends('projectLayout')

@section('content')	
			<h1>Edit project</h1>
			<hr>
			<div class="form-group">
				{!! Form::model($project, array('route' => array('project.update', $project->id), 'method' => 'POST')) !!}
				{!! Form::label('name','Project name',['class' => 'control-label']); !!}
				{!! Form::text('name' ,null ,['class' => 'form-control']); !!}
	
				{!! Form::label('description', 'Description',['class' => 'control-label']); !!}
				{!! Form::text('description', null,['class' => 'form-control']); !!}

				{!! Form::label('status', 'Status', ['class' => 'control-label']); !!}
				{!! Form::select('status', ['in progress' => 'In Progress', 'scheduled' => 'Scheduled', 'finshed' => 'Finished'],['class' => '	form-control'], ['class' => 'form-control']); !!}
				{!! Form::label('header', 'header'); !!}
				{!! Form::file('header', ['class' => 'form-control']) !!}
			</div>
			{!! Form::submit('Edit Project', ['class' => 'btn btn-primary form-control']); !!}
			{!! Form::close() !!}

				<hr>
				<!-- Pager -->
				<ul class="pager">
					<li class="previous">
						<a href="{{action('ProjectController@show',array('id' => $project->id))}}">Back to Project</a>
					</li>
				</ul>

@stop
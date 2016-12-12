@extends('projectLayout')

@section('content')
			
			{{ $project->description}}
			<h2>
			Latest activities:
			</h2>
			@foreach($project->activities as $activity)
				@if($activity->type == 'addPost')
					<a href="{{Action('UserController@show',array('id'=>$activity->user->id))}}">{{$activity->user->name}}</a> posted "<a href="{{Action('PostController@show',array('id'=>$activity->post->id))}}">{{$activity->post->title}}</a>", {{$activity->created_at->diffForHumans()}}
				@elseif($activity->type == 'addComment')
					<a href="{{Action('UserController@show',array('id'=>$activity->user->id))}}">{{$activity->user->name}}</a> commented on "<a href="{{Action('PostController@show',array('id'=>$activity->post->id))}}">{{$activity->post->title}}</a>", {{$activity->created_at->diffForHumans()}}
				@elseif($activity->type == 'uploadFile')
					<a href="{{Action('UserController@show',array('id'=>$activity->user->id))}}">{{$activity->user->name}}</a> uploaded "<a href="{{Action('FilesController@show',array('id' => $activity->project->id, 'file_id' => $activity->file->id))}}">{{$activity->file->name}}</a>", {{$activity->created_at->diffForHumans()}}
				@elseif($activity->type == 'addTask')
					<a href="{{Action('UserController@show',array('id'=>$activity->user->id))}}">{{$activity->user->name}}</a> has new task called "<a href="{{Action('TaskController@index',array('id' => $activity->project->id))}}">{{$activity->task->name}}</a>", {{$activity->created_at->diffForHumans()}}
				@endif
			<hr>
			@endforeach
				<hr>
				<!-- Pager -->
@stop
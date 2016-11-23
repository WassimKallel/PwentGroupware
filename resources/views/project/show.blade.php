<h1>{{ $project->name }}</h1>
<p>by {{$project->user->name }} in {{$project->created_at->diffForHumans()}}</p>
<h3>{{ $project->status }}</h3>
<p>{{ $project->description }}</p>


<hr>

<h1>Add new post</h1>
<hr>
{!! Form::open() !!}
{!! Form::label('title', 'Title'); !!}
{!! Form::text('title'); !!}
<br>
{!! Form::label('body', 'Body'); !!}
{!! Form::text('body'); !!}
<br>

{!! Form::submit('post'); !!}
{!! Form::close() !!}
<hr>

@foreach($project->Posts as $post)
	<h2>{{$post->title}}</h2>
	<p>by {{$post->user->name }} in {{$post->created_at->diffForHumans()}}</p>
	<p>{{$post->body}}</p>
	@foreach($post->Comments as $comment)
		<p>{{$comment->user->name }} : {{$comment->body}}  in {{$comment->created_at->diffForHumans()}}</h2>
	@endforeach
	{!! Form::model($post, ['method' => 'POST', 'action' =>  [ 'CommentController@store', $post->id] ]) !!}
	{!! Form::label('body', 'Add comment'); !!}
	{!! Form::text('body'); !!}
	{!! Form::submit('comment'); !!}
	{!! Form::close() !!}
	<hr>
@endforeach
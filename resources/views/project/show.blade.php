



<h1>{{ $project->name }}</h1>
<h3>{{ $project->status }}</h3>
<p>{{ $project->description }}</p>


@foreach($project->Posts as $post)
	<h2>{{$post->title}}</h2>
	<p>{{$post->body}}</p>
	@foreach($post->Comments as $comment)
		<h2>comment : {{$comment->body}}</h2>
	@endforeach
@endforeach
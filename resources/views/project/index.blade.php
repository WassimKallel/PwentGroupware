@foreach($projects as $project)
	<a href="/projects/{{$project->id}}"><h1>{{ $project->name }}</h1></a>
	<h3>{{ $project->status }}</h3>
	<p>{{ $project->description }}</p>
@endforeach
<h1>Add new Project</h1>
<hr>
{!! Form::open(['url' => '/projects']) !!}
{!! Form::label('title', 'Project title'); !!}
{!! Form::text('title'); !!}
<br>
{!! Form::label('description', 'Description'); !!}
{!! Form::text('description'); !!}
<br>
{!! Form::label('description', 'Description'); !!}
{!! Form::select('status', ['In Progress' => 'in progress', 'Scheduled' => 'scheduled', 'Finshed' => 'finished'], 'S'); !!}
<br>
{!! Form::submit('dez'); !!}
{!! Form::close() !!}
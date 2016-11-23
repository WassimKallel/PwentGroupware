<h1>Add new Project</h1>
<hr>
{!! Form::open(['url' => '/projects']) !!}
{!! Form::label('name', 'Project name'); !!}
{!! Form::text('name'); !!}
<br>
{!! Form::label('description', 'Description'); !!}
{!! Form::text('description'); !!}
<br>
{!! Form::label('description', 'Description'); !!}
{!! Form::select('status', ['in progress' => 'In Progress', 'scheduled' => 'Scheduled', 'finshed' => 'Finished']); !!}
<br>
{!! Form::submit('zid projet'); !!}
{!! Form::close() !!}
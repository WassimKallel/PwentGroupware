<h1>Add new Project</h1>
<hr>
{!! Form::open() !!}
{!! Form::label('title', 'Project title'); !!}
{!! Form::text('title'); !!}
<br>
{!! Form::label('description', 'Description'); !!}
{!! Form::text('description'); !!}
{!! Form::close() !!}
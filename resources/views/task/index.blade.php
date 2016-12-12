@extends('projectLayout')

@section('content')
			@if($projectAdmin)
			<a href="" data-toggle="modal" data-target="#newTaskModal"> <div style="margin-bottom: 20px;" class="btn btn-block btn-primary col-lg-12">Add new Task</div> </a>

			<div class="modal fade" id="newTaskModal" role="dialog">
    		    <div class="modal-dialog">
    		      <!-- Modal content-->
    		      <div class="modal-content">
    		        <div class="modal-header">
    		          <button type="button" class="close" data-dismiss="modal">&times;</button>
    		          <h4 class="modal-title">New Task</h4> 
    		        </div>
    		        <div class="modal-body">
    		          	{!! Form::open(['route' => array('task.store', $project->id)]) !!}
						
						    <!-- Subject Form Input -->
						    <div class="form-group">
						        {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
						        {!! Form::text('name', null, ['class' => 'form-control']) !!}
						    </div>
						
						    <!-- Message Form Input -->
						    <div class="form-group">
						        {!! Form::label('details', 'Details', ['class' => 'control-label']) !!}
						        {!! Form::textarea('details', null, ['class' => 'form-control']) !!}
						    </div>
						
						    @if($users->count() > 0)
						    	<div class="form-group">
								  <label for="sel1">In charge:</label>
								  <select name="user" class="form-control" id="sel1">
									@foreach($users as $user)
								    	<option value="{{ $user->id }}">{{$user->name}}</option>
								  	@endforeach
								  </select>
								</div>
						    @endif                
    		        </div>
    		        <div class="modal-footer">
    		        	{!! Form::submit('Add Task', ['class' => 'btn btn-primary form-control', 'style' => '{margin-bottom:200px;}']) !!}
    		        	{!! Form::close() !!}
    		        </div>
    		      </div>
    		    </div>
    		  </div>
    		  @endif
        	<div class="clearfix"></div>
			<div class="panel panel-default">
  				<!-- Default panel contents -->
			  <div class="panel-heading">All Tasks</div>
			
			  <!-- Table -->
			  	<table id="tasksTable"  data-toggle="table" data-detail-view="true" data-detail-formatter="detailFormatter" class="table">
			  	<thead>
    			  <tr >
    			    <th>Name</th>
    			    <th>in charge</th>
    			    <th>progress</th>
    			  </tr>
    			</thead>
    			<tbody>
			  @foreach($project->tasks as $task)
			  <tr data-toggle="collapse" data-target="#demo{{$task->id}}" class="accordion-toggle">
			  	<td>{{$task->name}}</td>
			  	<td>{{$task->user->name}}</td>
			  	<td>
			  	<div style="margin-top: 5px" class="progress">
				  <div class="progress-bar
				  @if($task->progress <= 20)
				  progress-bar-danger
				  @elseif($task->progress == 100)
				  progress-bar-success
				  @endif
				  " role="progressbar" aria-valuenow="{{$task->progress}}"
				  aria-valuemin="0" aria-valuemax="100" style="width:{{$task->progress}}%;">
				    {{$task->progress}}%
				  </div>
				</div>
				</td>
                 <tr><td colspan="3" class="hiddenRow"><div class="accordian-body collapse" id="demo{{$task->id}}"> <strong class="bold">Details:</strong><br><pre>{{$task->details}}</pre>
                 @if(Auth::user() == $task->user)
                 	{!! Form::open(['route' => array('task.update', $task->id)]) !!}
                 	<div class="col-md-8">
                 	<div class="form-group">
						<label for="progress">Update progress:</label>
						<select name="progress" class="form-control" id="progress">
							@for ($i = 0; $i <= 100; $i+=10)
								<option value="{{ $i }}">{{$i}}%</option>
							@endfor
						</select>
					</div>
					</div>
					<div class="col-md-4">
					<br>
					{!! Form::submit('update progress', ['class' => 'btn-sm btn-warning' ,'style' => 'margin-top: 5px']) !!}
    		        	{!! Form::close() !!}
    		        	<br>
    		        </div>
                 @endif
                 <div class="clearfix"></div>
                    </div> </td></tr>
			  </tr>
			   @endforeach
			   </tbody>
			  </table>
			</div>

@stop
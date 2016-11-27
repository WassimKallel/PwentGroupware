@extends('layout')

@section('pagetitle')
{{ $project->name }}
@stop

@section('background-image')
<header class="intro-header" style="background-image: url('../../../uploads/projects/header_images/{{$project->header_image_path}}')">
@stop

@section('title')
{{ $project->name }}
@stop

@section('description')
{{ $project->status }}
@stop

@section('pageContent')
<div class="entries_container">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <div class="row">
          <div class="col-lg-12">
	   @foreach($project->uploadedFiles as $file)
			       <div class="entry col-md-3">
             <div class="row">
             <div class="col-lg-12 col-lg-offset-1 col-md-12 col-md-offset-1">
    	       	  <div class="panel panel-primary">
    	       	      <div class="panel-heading">
    	       	          <h3 class="panel-title entry-text">{{ $file->name }}</h3>
    	       	      </div>
    	       	      <div class="panel-body">
    	       	          <p class="entry-text">{{ $file->description }}</p>
    	       	      </div>
    	       	      <div class="panel-footer">
    	       	          <span class="pull-left"><a href="#{{-- {{ action('ExecutableController@edit', $exe) }} --}}"><i class="glyphicon glyphicon-info-sign"></i></a></span>
                        <span class="pull-right"><a class="ask_confirm" href="{{-- {{ action('ExecutableController@destroy', $exe) }} --}}"><i class="glyphicon glyphicon-download-alt"></i></a></span>
    	       	          <div class="clearfix"></div>
    	       	      </div>
    	       	  </div>
                </div>
                </div>
  		        </div>
	 @endforeach
            </div>
         </div>
       </div>
     </div>
  </div>
</div>
@stop
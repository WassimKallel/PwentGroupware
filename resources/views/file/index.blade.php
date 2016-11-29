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
        <a href="{{action('FilesController@create', array('id' => $project->id ))}}"> <div style="margin-bottom: 20px;" class="btn btn-block btn-primary col-lg-12">Add new file</div> </a>
        <div class="clearfix"></div>
          <div class="col-lg-12">

	   @foreach($project->uploadedFiles as $file)
			       <div class="col-lg-3 col-md-3 col-xs-12 col-sm-6">
             <div class="row">
             <div class="col-lg-12 col-md-12">
    	       	  <div class="panel panel-primary">
    	       	      <div class="panel-heading">
    	       	          <h3 class="panel-title entry-text">{{ str_limit($file->name, 20) }}</h3>
    	       	      </div>
    	       	      <div class="panel-body">
    	       	          <p class="entry-text">{{ str_limit($file->description, 20) }}</p>
    	       	      </div>
    	       	      <div class="panel-footer">
    	       	          <span class="pull-left"><a href="{{action('FilesController@show', array('id' => $file->project->id , 'file_id' => $file->id))}}"><i class="glyphicon glyphicon-info-sign"></i></a></span>
                        <span class="pull-right">
                          <a class="ask_confirm" href="{{action('FilesController@download', array('id' => $file->project->id , 'file_id' => $file->id))}}"><i class="glyphicon  glyphicon-download-alt"></i></a>
                        </span>
    	       	          <div class="clearfix"></div>
    	       	      </div>
    	       	  </div>
                </div>
                <div class="col-lg-1"></div>
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
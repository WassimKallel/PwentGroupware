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

	   
             <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    	       	  <div class="panel panel-primary">
    	       	      <div class="panel-heading">
    	       	          <h3 class="panel-title">{{ str_limit($file->name,30) }}</h3>
    	       	      </div>
    	       	      <div class="panel-body">
    	       	          <p>{{ $file->description }}</p>
    	       	      </div>
    	       	      <div class="panel-footer">
                        <span class="pull-right">
                          <a class="ask_confirm" href="{{action('FilesController@download', array("id" => $file->project->id , "file_id" => $file->id))}}"><i class="glyphicon  glyphicon-download-alt"></i></a>
                        </span>
    	       	          <div class="clearfix"></div>
    	       	      </div>
    	       	  </div>
                </div>
                </div>
                  <ul class="pager">
                    <li class="previous">
                      <a href="{{action('FilesController@index',array("id" => $file->project->id))}}">&larr; Back</a>
                    </li>
                  </ul>
            </div>
         </div>
       </div>
     </div>
  </div>
</div>
@stop
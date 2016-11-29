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


@section('side-menu')
<div class="sidebar-nav col-lg-2">
    <div class="well">
    <ul class="nav nav-list"> 
      <li class="nav-header">{{$project->name}}</li>        
      <li><a href="{{action('ProjectController@show',array('id'=> $project->id))}}"><i class="icon-home"></i> Index <span class="badge badge-info">4</span></a></li>
      <li><a href="{{action('ProjectController@show',array('id'=> $project->id))}}"><i class="icon-home"></i> Posts <span class="badge badge-info">4</span></a></li>
      <li><a href="{{action('FilesController@index',array('id'=> $project->id))}}"><i class="icon-envelope"></i> Files <span class="badge badge-info">5</span></a></li>
      <li><a href="#"><i class="icon-comment"></i> Calendar <span class="badge badge-info">10</span></a></li>
      <li class="active"><a href="#"><i class="icon-user"></i> Members</a></li>
      <li class="divider"></li>
      <li><a href="#"><i class="icon-comment"></i> Edit </a></li>
    </ul>
  </div>
</div>
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
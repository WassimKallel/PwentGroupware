@extends('layout')

@section('pagetitle')
{{ $project->name }}
@stop

@section('background-image')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
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
      <li><a href="{{action('ProjectController@show',array('id'=> $project->id))}}"><i class="icon-home"></i> Index <span class="badge badge-info">{{$project->activities->count()}}</span></a></li>
      <li><a href="{{action('PostController@index',array('id'=> $project->id))}}"><i class="icon-home"></i> Posts <span class="badge badge-info">{{ $project->posts->count()}}</span></a></li>
      <li><a href="{{action('FilesController@index',array('id'=> $project->id))}}"><i class="icon-envelope"></i> Files <span class="badge badge-info">{{ $project->UploadedFiles->count()}}</span></a></li>
      <li><a href="{{action('CalendarController@index',array('id'=> $project->id))}}"><i class="icon-comment"></i> Calendar <span class="badge badge-info">10</span></a></li>
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

    	       	   @yield('content')
    				      
            </div>
            </div>
            </div>
         </div>
       </div>
     </div>
  </div>
</div>
@stop

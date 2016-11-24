@extends('layout')

@section('pagetitle')
{{ $user->name }}'s Profile
@stop
@section('title')
{{ $user->name }}'s Profile
@stop

@section('background-image')
    <header class="intro-header" style="background-image: url('../uploads/profiles/header_images/{{$user->header_image_path}}')">
@stop

@section('pageContent')
<style type="text/css">

    .image figure {
        left:0px;
        margin-top:-150px;
        width: 200px;
        height: 200px;
        vertical-align: top;
        align-content: center;
        border-radius: 50%;
        background: #000;
    }
    .image figure img {
        width: 200px;
        height: 200px;
        vertical-align: top;
        align-content: center;
        border-radius: 50%;
        opacity: 1;
        -webkit-transition: .3s ease-in-out;
        transition: .3s ease-in-out;
    }


</style>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
            <div class="image">
                <figure>
                    <img src="../uploads/profiles/avatars/{{$user->avatar_path}}" data-toggle="modal" data-target="#avatarModal">
                </figure>
            </div>
            </div>
        </div>
    </div>

  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
      <ul class="nav nav-tabs nav-justified">
        <li class="active" role="presentation" class="active"><a data-toggle="tab" href="#about">About</a></li>
        <li role="presentation"><a data-toggle="tab" href="#projects">Projects</a></li>
        <li role="presentation"><a data-toggle="tab" href="#posts">Posts</a></li>
      </ul>
      <div class="tab-content">
        <div id="about" class="tab-pane fade in active">
          <h3>About</h3>
          <hr>
          <div class="col-lg-6 col-xs-12">Name</div>
          <div class="col-lg-4 col-xs-8">{{$user->name}}</div>
          <div class="col-lg-6 col-xs-12">E-mail</div>
          <div class="col-lg-4 col-xs-8">{{$user->email}}</div>
        </div>
        <div id="projects" class="tab-pane fade">
          <h3>Projects</h3>
          <hr>
          @foreach($user->projects as $project)
          <div class="panel panel-default">
            <div class="panel-heading">{{$project->name}}</div>
            <div class="panel-body">
              {{$project->description}}
              <button type="button" class="btn btn-default pull-right"><a href="{{ action("ProjectController@main",array('id' => $project->id)) }}">Check Project</a></button>
            </div>
          </div> 
          @endforeach
        </div>
        <div id="posts" class="tab-pane fade">
          <h3>Posts</h3>
          <hr>
          @foreach($user->posts as $post)
          <div class="panel panel-default">
            <div class="panel-heading">"{{$post->title}}" in "{{$post->project->name}}"</div>
            <div class="panel-body">
              {{$post->body}}
              <button type="button" class="btn btn-default pull-right"><a href="{{ action("ProjectController@main",array('id' => $project->id)) }}">Check Post</a></button>
            </div>
          </div> 
          @endforeach
        </div>
      </div>
        <hr>
        <!-- Pager -->
      </div>
    </div>
  </div>
    
@stop
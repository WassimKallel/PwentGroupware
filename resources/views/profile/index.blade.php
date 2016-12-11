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



@section('profile-edit-content')
<style type="text/css">

    .image figure {
        position: relative
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
    .image figure button {
        margin-top: -215px;
        text-align: center;
        width: 200px;
        opacity: 0;
    }
    @if($editableProfile)
    .image figure:hover img {
        opacity: .5;
    }
    .image figure:hover button {
        opacity: 1;
        color:white;
    }
    @endif

</style>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
            <div class="image">
                <figure>
                    <img src="../uploads/profiles/avatars/{{$user->avatar_path}}" data-toggle="modal" data-target="#avatarModal">
                    @if($editableProfile)
                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#avatarModal"><span class="glyphicon glyphicon-user"></span>Update avatar</button>
                    @endif
                </figure>
            </div>
            </div>
        </div>
    </div>
    @if($editableProfile)
    <div class="container">

      <!-- Modal -->
      <div class="modal fade" id="avatarModal" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Update avatar</h4> 
            </div>
            <div class="modal-body">
              <form enctype="multipart/form-data" action="/profile" method="POST">
                    <label>Update Profile Image</label>
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-default btn-primary">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <button style="margin-top: -165px; color:white;" type="button" class="btn btn-link btn-xsp pull-right" data-toggle="modal" data-target="#headerModal"><span class="glyphicon glyphicon-picture"></span>Update header</button>

    <div class="container">

      <!-- Modal -->
      <div class="modal fade" id="headerModal" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Update header</h4> 
            </div>
            <div class="modal-body">
              <form enctype="multipart/form-data" action="/profile" method="POST">
                    <label>Update Header Image</label>
                    <input type="file" name="header">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-default btn-primary">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    @endif
@stop

@section('pageContent')

<div class="container" style="margin-top: 100px;">
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
          @if($editableProfile)
          <div class="col-lg-2 col-xs-4"><span class="glyphicon glyphicon-wrench"></span></div>
          @endif
          <div class="col-lg-6 col-xs-12">E-mail</div>
          <div class="col-lg-4 col-xs-8">{{$user->email}}</div>
          @if($editableProfile)
          <div class="col-lg-2 col-xs-4"><span class="glyphicon glyphicon-wrench"></span></div>
          <div class="col-lg-6 col-xs-12">Password</div>
          <div class="col-lg-4 col-xs-8">***********</div>
          <div class="col-lg-2 col-xs-4"><span class="glyphicon glyphicon-wrench"></span></div>
          @endif
        </div>
        <div id="projects" class="tab-pane fade">
          <h3>Projects</h3>
          <hr>
          @foreach($user->projects as $project)
          <div class="panel panel-default">
            <div class="panel-heading">{{$project->name}}</div>
            <div class="panel-body">
              {{$project->description}}
              <button type="button" class="btn btn-default pull-right"><a href="{{ action("ProjectController@show",array('id' => $project->id)) }}">Check Project</a></button>
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
              <button type="button" class="btn btn-default pull-right"><a href="{{ action("PostController@show",array('id' => $post->id)) }}">Check Post</a></button>
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
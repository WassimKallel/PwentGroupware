@extends('layout')

@section('pagetitle')
{{ $user->name }}'s Profile
@stop
@section('title')
{{ $user->name }}'s Profile
@stop

@section('background-image')
    <header class="intro-header" style="background-image: url('uploads/profiles/header_images/{{$user->header_image_path}}')">
@stop

@section('pageContent')
<style type="text/css">

    .image figure {
        left:0px;
        margin-top:-130px;
        width: 150px;
        height: 150px;
        vertical-align: top;
        align-content: center;
        border-radius: 50%;
        background: #000;
    }
    .image figure img {
        width: 150px;
        height: 150px;
        vertical-align: top;
        align-content: center;
        border-radius: 50%;
        opacity: 1;
        -webkit-transition: .3s ease-in-out;
        transition: .3s ease-in-out;
    }
    .image figure div {
        margin-top: -110px;
        text-align: center;
        width: 150px;
        opacity: 0;
    }
    .image figure:hover img {
        opacity: .5;
    }
    .image figure:hover div {
        opacity: 1;
        color:grey;
    }

</style>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
            <div class="image">
                <figure>
                    <img src="uploads/profiles/avatars/{{$user->avatar_path}}" data-toggle="modal" data-target="#avatarModal">
                    <div><span class="glyphicon glyphicon-user"></span><br>Update avatar</div>
                </figure>
            </div>
            </div>
        </div>
    </div>
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

    <button type="button" class="btn" data-toggle="modal" data-target="#headerModal">header</button>

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

@stop
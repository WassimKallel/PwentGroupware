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
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">Add File</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">Add File</div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-xs-12">

                    <form enctype="multipart/form-data" action="{{action('FilesController@store',array('id' => $project->id))}}" method="POST">
                    <div class="form-group">
                    <label for="description" class="control-label">Description</label>
                    <textarea name="description" class="form-control" rows="5" id="comment"></textarea>
                    </div>
                    <div class="form-group">
                    <label for="file" class="control-label">Upload File</label>
                    <input class="form-control" type="file" name="file">
                    </div>
                    
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="btn btn-default btn-primary pull-right" value="Upload">
                    
                    </form>

                  </div>
        
                </div>
              </div>
            </div>
            <ul class="pager">
                    <li class="previous">
                      <a href="{{action('FilesController@index',array("id" => $project->id))}}">&larr; Back</a>
                    </li>
                  </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop
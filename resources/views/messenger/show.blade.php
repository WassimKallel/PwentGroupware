@extends('layout')

@section('pagetitle')
Messages
@stop

@section('background-image')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
<header class="intro-header" style="background-image: url('{{ URL::to('/') . '/img/home-bg.jpg'}}')">
@stop

@section('title')
    Subject: {{$thread->subject}}
@stop

@section('pageContent')
    <div class="col-md-offset-3 col-md-6">
        {{-- <h1>{{ $thread->subject }}</h1> --}}

        @foreach($thread->messages as $message)
            <div class="media">
                <a class="pull-left" href="#">
                    <img style="height: 64px; width: 64px;" src="../uploads/profiles/avatars/{{$message->user->avatar_path}}" alt="{{ $message->user->name }}" class="img-circle">
                </a>
                <div class="media-body">
                    <h5 class="media-heading">{{ $message->user->name }}</h5>
                    <p>{{ $message->body }}</p>
                    <div class="text-muted"><small>Posted {{ $message->created_at->diffForHumans() }}</small></div>
                </div>
            </div>
        @endforeach

        {{-- <h2>Add a new message</h2> --}}
        <br>
        {!! Form::open(['route' => ['messages.update', $thread->id], 'method' => 'PUT']) !!}
        <!-- Message Form Input -->
        <div class="form-group">
            {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
        </div>

        @if($users->count() > 0)
        <div class="checkbox">
            @foreach($users as $user)
                <label title="{{ $user->name }}"><input type="checkbox" name="recipients[]" value="{{ $user->id }}">{{ $user->name }}</label>
            @endforeach
        </div>
        @endif

        <!-- Submit Form Input -->
        <div class="form-group">
            {!! Form::submit('Send', ['class' => 'btn btn-primary form-control']) !!}
        </div>
        {!! Form::close() !!}
        <br>
            <ul class="pager">
           <li class="previous">
             <a href="{{action('MessagesController@index')}}">&larr; Back to all messages</a>
           </li>
         </ul>
    </div>

@stop

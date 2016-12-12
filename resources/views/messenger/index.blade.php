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
    Messages
@stop

@section('pageContent')
    <div class="col-md-offset-3 col-md-6">
    @if (Session::has('error_message'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('error_message') }}
        </div>
    @endif
    @if($threads->count() > 0)
        @foreach($threads as $thread)
        <?php $class = $thread->isUnread($currentUserId) ? 'alert-info' : ''; ?>
        <div class="media alert {{ $class }}">
            <h4 class="media-heading">{!! link_to('messages/' . $thread->id, $thread->subject) !!}</h4>
            <p>{{ $thread->latestMessage->body }}</p>
            <p><small><strong>Creator:</strong> {{ $thread->creator()->name }}</small></p>
            <p><small><strong>Participants:</strong> {{ $thread->participantsString(Auth::id()) }}</small></p>
        </div>
        <hr>
        @endforeach
    @else
        <p>Sorry, no threads.</p>
    @endif
@stop

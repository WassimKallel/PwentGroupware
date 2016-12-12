<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
	@yield('pagetitle') - PwentGroupeware
	</title>

	<!-- Bootstrap Core CSS -->
	{!! Html::style('vendor/bootstrap/css/bootstrap.min.css') !!}

	<!-- Theme CSS -->
	{!! Html::style('css/clean-blog.min.css') !!}
	{{-- Personalized style --}}
	{!! Html::style('css/style.css') !!}

	<!-- Custom Fonts -->
	{!! Html::style('vendor/font-awesome/css/font-awesome.min.csss') !!}

	<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>


<body>

	<!-- Navigation -->
	<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header page-scroll">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					Menu <i class="fa fa-bars"></i>
				</button>
				<a class="navbar-brand" href="{{action('ProjectController@index')}}">PwentGroupeware</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
				@if(Auth::user()->id == 1)
					<li class="dropdown">
        			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin space<span class="caret">			</span></a>
        			  <ul class="dropdown-menu">
        			    <li><a href="{{Action('AdminController@showAddUserForm')}}" style="color:grey">Add User</a></li>
        			  </ul>
        			</li>
        		@endif
					<li>
						<a href="{{action('ProjectController@index')}}">All Projects</a>
					</li>
					<li class="dropdown">
        			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Messages<span class="caret">			</span></a>
        			  <ul class="dropdown-menu">
        			  	@if($threads->count() > 0)
    					    @foreach($threads as $thread)
    					        {{-- <h4 class="media-heading">{!! link_to('messages/' . $thread->id, $thread->subject) !!}</h4> --}}
    					        {{-- <p></p> --}}
    					        <li><a href="{{ Action('MessagesController@show', $thread->id)}}" style="color:grey"><div style="display: inline-block;">
    					        <img src="{{ URL::to('/') . '/uploads/profiles/avatars/' . $thread->creator()->avatar_path}}" class="msg-thumbnail">


    					        </div><div style="display: inline-block;">{{ $thread->creator()->name }} <br><small>{{ str_limit($thread->latestMessage->body,15) }}</small></div></a></li>
    					        {{-- <p><small><strong>Participants:</strong> {{ $thread->participantsString(Auth::id()) }}</small></p> --}}
    					    @endforeach
    					@else
    					    <li>Sorry, no threads.</li>
    					@endif
        			    
        			    <li role="separator" class="divider"></li>
        			    
        			    <li><a href="{{Action('MessagesController@index')}}" style="color:grey">All Messages</a></li>
        			    <li role="separator" class="divider"></li>
        			    <li><a href="#" style="color:grey" data-toggle="modal" data-target="#newMessageModal">New Message</a></li>
        			  </ul>
        			</li>
					<li>
						<a href="{{Action('UserController@index')}}"> 
					 		<img src="{{ URL::to('/') .'/uploads/profiles/avatars/' . Auth::user()->avatar_path}}" class="profile-avatar-header">
						</a>
					</li>
					<li>
					<i><a href="{{action('\App\Http\Controllers\Auth\LoginController@logout')}}"><span class="glyphicon glyphicon-log-out"></span></a></i>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Page Header -->
	@yield('background-image')
	
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
					<div class="site-heading">
						<h1>@yield('title')</h1>
						<hr class="small">
						<span class="subheading">@yield('description')</span>
					</div>
				</div>
			</div>
		</div>
	</header>

@yield('profile-edit-content')

@yield('side-menu')



@yield('pageContent')
	<!-- Main Content -->


	<hr>

	<!-- Footer -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
					<ul class="list-inline text-center">
						<li>
							<a href="#">
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
								</span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
								</span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-github fa-stack-1x fa-inverse"></i>
								</span>
							</a>
						</li>
					</ul>
					<p class="copyright text-muted">Copyright &copy; PwentGroupware 2016</p>
				</div>
			</div>
		</div>
	</footer>

	<!-- jQuery -->
	<script src=""></script>
	{!! Html::script('vendor/jquery/jquery.min.js') !!}
	<!-- Bootstrap Core JavaScript -->
	<script src=""></script>
	{!! Html::script('vendor/bootstrap/js/bootstrap.min.js') !!}

	<!-- Theme JavaScript -->
	{!! Html::script('js/clean-blog.min.js') !!}




<div class="container">

      <!-- Modal -->
      <div class="modal fade" id="newMessageModal" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">New Message</h4> 
            </div>
            <div class="modal-body">
              	{!! Form::open(['route' => 'messages.store']) !!}
				
				    <!-- Subject Form Input -->
				    <div class="form-group">
				        {!! Form::label('subject', 'Subject', ['class' => 'control-label']) !!}
				        {!! Form::text('subject', null, ['class' => 'form-control']) !!}
				    </div>
				
				    <!-- Message Form Input -->
				    <div class="form-group">
				        {!! Form::label('message', 'Message', ['class' => 'control-label']) !!}
				        {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
				    </div>
				
				    @if($users->count() > 0)
				    <div class="checkbox">
				        @foreach($users as $user)
				            <label title="{{ $user->name }}"><input type="checkbox" name="recipients[]" value="{{ $user->id }}">{!!$user->name!!}</label>
				        @endforeach
				    </div>
				    @endif
				    

				
				
                
            </div>
            <div class="modal-footer">
            	{!! Form::submit('Submit', ['class' => 'btn btn-primary form-control', 'style' => '{margin-bottom:200px;}']) !!}
            	{!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
</div>



</body>
</html>
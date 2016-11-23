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
				<a class="navbar-brand" href="index.html">PwentGroupeware</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="index.html">Project home</a>
					</li>
					<li>
						<a href="about.html">About Creator</a>
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
					<p class="copyright text-muted">Copyright &copy; Your Website 2016</p>
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

</body>
</html>
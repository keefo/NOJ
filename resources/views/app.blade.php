<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>NUC Online Judge v3</title>

	<link id="page_favicon" href="{{ url('/favicon.ico') }}" rel="shortcut icon" type="image/x-icon" />
	<link rel="stylesheet" href="{{ elixir('css/app.css') }}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/"><img class="navbar-logo" src="{{ url('/img/logo.png') }}" /> NOJ</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			
				<form class="navbar-form form-horizontal navbar-left" role="search">
				  <div class="form-group form-group-sm">
				    <input type="text" class="form-control" placeholder="Search">
				  </div>
				</form>
				
				<ul class="nav navbar-nav">
					<li><a href="/problems/">Problems</a></li>
					<li><a href="#">Judge</a></li>
					<li><a href="#">Tutorial</a></li>
					<li><a href="#">Blog</a></li>
					<li><a href="#">Help</a></li>
        		</ul>
				
				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li class="btnli"><a class="btn btn-xs btn-success" href="{{ url('/auth/register') }}">Sign up</a></li>
						<li class="btnli"><a class="btn btn-xs btn-default" href="{{ url('/auth/login') }}">Sign in</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Sign out</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')

	<!-- Site footer -->
	<div class="container">
		<footer class="footer">
			<div class="row">
				<div class="col-md-5">
					<ul class="list-inline">
						<li>&copy; NOJ 2015</li>
						<li><a href="#">Terms</a></li>
						<li><a href="#">Privacy</a></li>
						<li><a href="#">Contact</a></li>
					</ul>
				</div>
				<div class="col-md-2 text-center">
					<img class="footer-logo" src="{{ url('/img/footer-logo.png') }}" />
				</div>
				<div class="col-md-5 text-right">
					<ul class="list-inline">
						<li><a href="#">Status</a></li>
						<li><a href="#">Blog</a></li>
						<li><a href="#">About</a></li>
					</ul>
				</div>
			</div>
		</footer>
	</div>
	
	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>

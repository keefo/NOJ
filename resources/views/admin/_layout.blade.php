<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>NUC Online Judge Admin v3</title>

	<link id="page_favicon" href="{{ url('/favicon.ico') }}" rel="shortcut icon" type="image/x-icon" />
	<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
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
	
<div id="wrapper">
	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/admin/"><img class="navbar-logo" src="{{ url('/img/logo.png') }}" /> NOJ Admin</a>
		</div>
		
		<ul class="nav navbar-top-links navbar-right">
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">
					<i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
				</a>
				<ul class="dropdown-menu dropdown-user">
					<li><a href="{{ url('admin/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
				</ul>
			</li>
		</ul>

		<div class="navbar-default sidebar" role="navigation">
			<div class="sidebar-nav navbar-collapse">
				<ul class="nav collapse in" id="side-menu">
									<li class="active"><a href="http://sleepingowladmindemo.cloudcontrolled.com/admin" class="active"><i class="fa fa-fw fa-dashboard"></i> Start page</a></li>
									<li><a href="http://sleepingowladmindemo.cloudcontrolled.com/admin/contacts"><i class="fa fa-fw fa-users"></i> Contacts</a></li>
									<li><a href="http://sleepingowladmindemo.cloudcontrolled.com/admin/companies"><i class="fa fa-fw fa-building"></i> Companies</a></li>
									<li><a href="http://sleepingowladmindemo.cloudcontrolled.com/admin/countries"><i class="fa fa-fw fa-globe"></i> Countries</a></li>
									<li><a href="#"><i class="fa fa-fw fa-bookmark"></i> Custom<span class="fa arrow"></span></a><ul class="nav nav-second-level collapse"><li><a href="http://sleepingowladmindemo.cloudcontrolled.com/admin/my_second_admin_page"><i class="fa fa-fw "></i> Custom admin page</a></li><li><a href="http://sleepingowladmindemo.cloudcontrolled.com/admin/subdir/demo"><i class="fa fa-fw "></i> Custom url</a></li></ul></li>
				</ul>
			</div>
		</div>
		
	</nav>
	
	@yield('content')

</div>

<!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>

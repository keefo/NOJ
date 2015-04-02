@extends('app')

@section('content')
<div class="signupbanner attachtonavbar">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<h1>Brain Battle</h1>
				<h3>A better programming contests training site.</h3>
			</div>
			<div class="col-md-5">
				<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
	
					<div class="form-group">
						<div class="col-md-12">
							<input type="text" class="form-control" name="name" placeholder="Pick a username" value="{{ old('name') }}">
						</div>
					</div>
	
					<div class="form-group">
						<div class="col-md-12">
							<input type="email" class="form-control" name="email" placeholder="Your email" value="{{ old('email') }}">
						</div>
					</div>
	
					<div class="form-group">
						<div class="col-md-12">
							<input type="password" class="form-control" name="password" placeholder="Password">
						</div>
					</div>
	
					<div class="form-group">
						<div class="col-md-12">
							<input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
						</div>
					</div>
	
					<div class="form-group">
						<div class="col-md-12">
							<button type="submit" class="btn btn-success col-md-12">Sign up</button>
						</div>
					</div>
					
					
					<div class="form-group">
						<div class="col-md-12 text-muted small">
							By clicking "Sign up for NOJ", you agree to our <a href="#">terms of service</a> and <a href="#">privacy policy</a>. We will send you account related emails occasionally.
						</div>
					</div>
					
					
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

{{--
<html>
	<head>
		<title>Laravel</title>
		
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 96px;
				margin-bottom: 40px;
			}

			.quote {
				font-size: 24px;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="content">
				<div class="title">Laravel 5</div>
				<div class="quote">{{ Inspiring::quote() }}</div>
			</div>
		</div>
	</body>
</html>
--}}

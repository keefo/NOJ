@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Sign in</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-7 right-vertical-divider">
							@if (count($errors) > 0)
								<div class="alert alert-danger">
									<strong>Whoops!</strong> There were some problems with your input.<br><br>
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif
							
							{{ $github_login_url }}
							
							<div class="col-md-10 col-md-offset-1">
							<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
		
								<div class="form-group">
									<label class="control-label"><strong>Email</strong></label>
									<div class="">
										<input type="email" class="form-control" name="email" value="{{ old('email') }}">
									</div>
								</div>
		
								<div class="form-group">
									<label class="control-label"><strong>Password</strong> (<a href="{{ url('/password/email') }}">Forgot password</a>)</label>
									<input type="password" class="form-control" name="password">
								</div>
		
								<div class="form-group">
									<div class="checkbox">
										<label>
											<input type="checkbox" name="remember"> Remember Me
										</label>
									</div>
								</div>
		
								<div class="form-group">
										<button type="submit" class="btn btn-default">Sign in</button>
								</div>
							</form>
							</div>
						</div>
						<div class="col-md-5">
							<div class="col-md-10 col-md-offset-1">
								<strong>Or you can sign in with:</strong>
								<a href="#" class="login_github loginbtn"><i class="fa fa-github"></i> Sign in with Github</a>
								<a href="#" class="login_google loginbtn"><i class="fa fa-google"></i> Sign in with Google</a>
							</div>
						</div>
					</div>
					
					
					
				</div>
			</div>
		</div>
	</div>
	
</div>



@endsection

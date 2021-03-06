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
							
							<div class="col-md-10 col-md-offset-1">
							<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
		
								<div class="form-group">
									<label class="control-label"><strong>Username or Email</strong></label>
									<div class="">
										{!! Form::text('username', Input::old('username'), array('tabindex' => '1', 'class' => 'form-control')) !!}
									</div>
								</div>
		
								<div class="form-group">
									<label class="control-label"><strong>Password</strong> (<a href="{{ url('/password/email') }}" tabindex="5">Forgot password</a>)</label>
									{!! Form::password('password', array('tabindex' => '2', 'class' => 'form-control')) !!}
								</div>
		
								<div class="form-group">
									<div class="checkbox">
										
										<label>
											{!! Form::checkbox('remember', Input::old('remember'), 'on', array('tabindex' => '3')) !!}
											Remember Me
										</label>
									</div>
								</div>
		
								<div class="form-group">
										<button type="submit" class="btn btn-default" tabindex="4">Sign in</button>
								</div>
							</form>
							</div>
						</div>
						<div class="col-md-5">
							<div class="col-md-10 col-md-offset-1">
								<strong>Or you can sign in with:</strong>
								<a href="{{ url('/login/github') }}" class="login_github loginbtn"><i class="fa fa-github"></i> Sign in with Github</a>
<!-- 								<a href="{{ url('/login/twitter') }}" class="login_twitter loginbtn"><i class="fa fa-twitter"></i> Sign in with Twitter</a>
								<a href="{{ url('/login/google') }}" class="login_google loginbtn"><i class="fa fa-google"></i> Sign in with Google</a> -->

							</div>
						</div>
					</div>
					
					
					
				</div>
			</div>
		</div>
	</div>
	
</div>

@endsection

@section('scripts')
<script>
$(function(){
	$('.loginbtn').click(function(){
		$(this).prop('disabled', true).attr('disabled', true).addClass('disabled');
	})
});
</script>
@stop



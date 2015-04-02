@extends('signup')

@section('content')
<div class="container setup-form">

	<div class="row">
		<div class="col-md-12">
			<h1>Join NOJ</h1>
			<div class="text-muted">In algorithms, as in life, persistence usually pays off.</div>
		</div>
	</div>

	<div class="row setup-form-step1">
		<div class="col-md-8">
			<h2 class="setup-form-title">Create your personal account</h2>
			
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
			
			<form class="" role="form" method="POST" action="{{ url('/auth/register') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="form-group">
					<label class="control-label">Name</label>
					<input type="text" class="form-control input-sm" name="name" value="{{ old('name') }}">
				</div>

				<div class="form-group">
					<label class="control-label">E-Mail Address</label>
					<input type="email" class="form-control input-sm" name="email" value="{{ old('email') }}">
				</div>

				<div class="form-group">
					<label class="control-label">Password</label>
					<input type="password" class="form-control input-sm" name="password">
				</div>

				<div class="form-group">
					<label class="control-label">Confirm Password</label>
					<input type="password" class="form-control input-sm" name="password_confirmation">
				</div>
				
				<div class="form-group text-muted small">
				<hr/>
					By clicking "Create an account", you agree to our <a href="#">terms of service</a> and <a href="#">privacy policy</a>. We will send you account related emails occasionally.<hr/>

				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-success btn-sm pull-right">Create an account</button>
				</div>
			</form>

		</div>
		<div class="col-sm-3 col-sm-offset-1">
			sidebar
		</div>
	</div>
		

</div>
@endsection

@extends('app')

@section('content')
<div class="container">
	
	<div class="panel panel-default">
		<div class="panel-heading">Message</div>
		<div class="panel-body">
			@if ($message)
				<div class="alert alert-danger">
					{{ $message }}
				</div>
			@endif
		</div>
	</div>
	
</div>
@endsection

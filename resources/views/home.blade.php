@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-9">
			
			@foreach ($submits as $submit)
				<div class="feed-item">
					{!! $submit->feedContent() !!}
				</div>
			@endforeach
			
		</div>
		<div class="col-md-3">
			xxxxx
		</div>
	</div>
</div>
@endsection

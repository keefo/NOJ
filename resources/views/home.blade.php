@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-9">
			
			@foreach ($submits as $submit)
				<div class="feed-item">
					<a href="{{ url('/user') }}">{{ $submit->username }}</a>
					{!! submitResultVerb($submit->result) !!}
					<a href="{{ url('/problems') }}">{{ $submit->problemtitle }}</a>
					<span class="date">{{ $submit->relativeCreatedDate() }}</span>
				</div>
			@endforeach
			
		</div>
		<div class="col-md-3">
			xxxxx
		</div>
	</div>
</div>
@endsection

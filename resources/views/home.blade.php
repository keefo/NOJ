@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<h4><small><i class="fa fa-rss"></i> News Feed:</small></h4>
			
			@foreach ($submits as $submit)
				<div class="feed-item">
					{!! $submit->feedContent() !!}
				</div>
			@endforeach
			
		</div>
		<div class="col-md-3">
			<h4><small><i class="fa fa-users"></i> Online Users:</small></h4>
			<div class="text-muted">{{ $totalUsers }} users and <span>{{ $totalGuests }} guests:</span></div>
				
			<div class="panel panel-default">
				
				<div class="panel-body text-muted">
				@foreach ($onlineUsers as $online)
				<div><a href="{{ url('user', $online->user->name) }}">{{ $online->user->name }}</a></div>
				@endforeach
			  </div>
			</div>
			
		</div>
	</div>
	
	<br/><br/><br/>
	
</div>
@endsection

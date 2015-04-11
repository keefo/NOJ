@extends('app')
	
@section('content')

<div class="container">
	<ol class="breadcrumb">
	  <li><a href="/">Home</a></li>
	  <li><a href="{{ url('/submit') }}">Judge</a></li>
	  <li class="active">{{ $submit->id }}</li>
	</ol>
</div>

<div class="container problem">

	<div class="page-header text-center">
		<h2><a href="{{ url('/users', $submit->name) }}" target="_blank">{{ $submit->screen_name }}</a></h2>
		<h4><a href="{{ url('/problems', $submit->slug) }}" target="_blank">{{ $submit->title }}</a></h4>
		<h5>
		<span class="text-muted">Time:</span> {{ $submit->time }}ms 
		&nbsp;&nbsp;&nbsp; 
		<span class="text-muted">Memory:</span> {{ $submit->memory }}K
		</h5>
		<h5 class="text-muted">{{ $submit->created_at }}</h5>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<pre>{{ $submit->code }}</pre>
		</div>
	</div>

</div>
@endsection

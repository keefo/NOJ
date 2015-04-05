@extends('app')
	
@section('content')

<div class="container">
	<ol class="breadcrumb">
	  <li><a href="/">Home</a></li>
	  <li><a href="{{ url('/problems?page='.ceil($problem->id/100)) }}">Problems</a></li>
	  <li class="active">{{ $problem->title }}</li>
	</ol>
</div>

<div class="container problem">

	<div class="page-header text-center">
		<h1>{{ $problem->title }}</h1>
		<div>
			<h5>
			<span class="text-muted">Time Limit:</span> {{ $problem->time_limit }}ms 
			&nbsp;&nbsp;&nbsp; 
			<span class="text-muted">Memory Limit:</span> {{ $problem->memory_limit }}K
			</h5>
		</div>
		<div>
			<h5>
			<span class="text-muted">Total Submissions:</span> {{ $problem->submit_count }} 
			&nbsp;&nbsp;&nbsp; 
			<span class="text-muted">Accepted:</span> {{ $problem->accept_count }}
			</h5>
		</div>
		@if($problem->is_special_judge)
		<div>
			<h5 class="text-danger"><abbr title="This problem has multiple possible answers.">Special Judge</abbr></h5>
		</div>
		@endif
	</div>
	
	<h2>Description</h2>
	<div class="row description">
		<div class="col-md-12">
			{!! $problem->description !!}
		</div>
	</div>
	
	<h2>Input</h2>
	<div class="row input">
		<div class="col-md-12">
			{!! $problem->input !!}
		</div>
	</div>
	
	<h2>Output</h2>
	<div class="row output">
		<div class="col-md-12">
			{!! $problem->output !!}
		</div>
	</div>
	
	<h2>Sample Input</h2>
	<div class="row sinput">
		<div class="col-md-12">
			<pre>{!! $problem->sample_input !!}</pre>
		</div>
	</div>
	
	<h2>Sample Output</h2>
	<div class="row soutput">
		<div class="col-md-12">
			<pre>{!! $problem->sample_output !!}</pre>
		</div>
	</div>
	
	@if($problem->hint)
	<h2>Hint</h2>
	<div class="row hint">
		<div class="col-md-12">
			{!! $problem->hint !!}
		</div>
	</div>
	@endif
	
	@if(!Auth::guest() && false && $problem->analysis)
	<h2>Analysis</h2>
	<div class="row analysis">
		<div class="col-md-12">
			{!! $problem->analysis !!}
		</div>
	</div>
	@endif
	
	<h2>Source</h2>
	<div class="row source">
		<div class="col-md-12">
			@if($problem->source_url)
			<a href="{{ $problem->source_url }}">{!! $problem->source !!}</a>
			@else
			{!! $problem->source !!}
			@endif
		</div>
	</div>
	
</div>
@endsection

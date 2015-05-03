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
		<h2><a href="{{ url('/problems', $submit->slug) }}" target="_blank">{{ $submit->title }}</a></h2>
		<h4>By <a href="{{ url('/users', $submit->name) }}" target="_blank">{{ $submit->screen_name }}</a></h4>
		<h5>
		<span class="text-muted">Time:</span> {{ $submit->time }}ms 
		&nbsp;&nbsp;&nbsp; 
		<span class="text-muted">Memory:</span> {{ $submit->memory }}K
		</h5>
		<h5 class="text-muted">{{ $submit->created_at }}</h5>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<pre id="code">{{ $submit->code }}</pre>
		</div>
	</div>

</div>
@endsection


@section('scripts')
<script>
var editor = ace.edit("code");
editor.setOptions({
	maxLines: Infinity
});
editor.setReadOnly(true);
editor.setTheme("ace/theme/theme-github");
editor.getSession().setMode("ace/mode/c_cpp");
</script>
@stop

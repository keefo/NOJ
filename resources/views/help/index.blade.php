@extends('app')

@section('content')
<div class="container faq">

	<div class="page-header">
	  <h1>{{ $article->title }}</h1>
	</div>
	
	<div class="page-content">
	  <h1>{!! $article->content !!}</h1>
	</div>


</div>
@endsection

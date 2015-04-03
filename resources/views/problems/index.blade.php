@extends('app')

@section('content')
<div class="container">
	
	<div class="pagehead">
		<h1>Problem Set {{ numberToRoman($problems->currentPage()) }}</h1>
	</div>
	
	<div class="pages">{!! $problems->render(new App\Presenters\ProblemsPaginationPresenter($problems)) !!}</div>
	
	<table class="table table-striped table-condensed">
		<thead class="">
			<tr>
			@if (!Auth::guest())
				<th width="2%"><h5>Solved</h5></th>
			@endif
				<th class="text-center" width="8%"><h5>#</h5></th><th><h5>Title</h5></th><th width="18%" class="text-center"><h5>Ratio ( AC / submit )</h5></th><th width="5%" class="text-center"><h5>Difficulty</h5></th></tr>
		</thead>
		<tbody>
		@foreach ($problems as $problem)
			@if ($problem->published)
			<tr class="plist-item" id="p_{{ $problem->id }}">
				@if (!Auth::guest())
				<td class="text-center">
					
				</td>
				@endif
				<td class="text-center">{{ $problem->id+999 }}</td>
				<td>
					<a href="{{ url('/problems', $problem->slug) }}">{{ $problem->title }}</a>
					@if($problem->analysis)
						<span title="has Analysis" class="text-muted glyphicon glyphicon-info-sign"></span>
					@endif
				</td>
				<td class="text-center">
				@if($problem->submit_count>0)
					{{ round($problem->accept_count/$problem->submit_count*100) }}% ({{ $problem->accept_count }}/{{ $problem->submit_count }})
				@else 
					0%(0/0)
				@endif</td>
				<td class="text-center">{{ $problem->difficulty_level }}</td>
			</tr>
			@endif
		@endforeach
		</tbody>
	</table>
</div>


@endsection

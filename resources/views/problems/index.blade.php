@extends('app')

@section('content')
<div class="container">
	
	<div class="pagehead">
		<h1>Problem Set {{ numberToRoman($problems->currentPage()) }}</h1>
	</div>
	
	<table class="table table-striped table-condensed">
		<thead>
			<tr>
			@if (!Auth::guest())
				<th width="2%">Solved</th>
			@endif
				<th class="text-center" width="8%">#</th><th>Title</th><th width="18%" class="text-center">Ratio ( AC / submit )</th><th width="5%" class="text-center">Difficulty</th></tr>
		</thead>
		<tbody>
		@foreach ($problems as $problem)
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
		@endforeach
		</tbody>
		<tfoot>
			<tr>
			@if (Auth::guest())
			<th colspan="5">
			@else
			<th colspan="4">
			@endif
			<div class="pagenation">{!! $problems->render(new App\Presenters\ProblemsPaginationPresenter($problems)) !!}</div>
	
			</th>
			</tr>
			
		</tfoot>
	</table>
</div>


@endsection

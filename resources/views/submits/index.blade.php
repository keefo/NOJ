@extends('app')

@section('content')
<div class="container submits">
	
	<div class="page-header">
	  <h1>Judge status</h1>
	</div>

	<table class="table table-striped table-condensed">
		<thead class="">
			<tr>
				<th class="text-center" width="8%"><h5>#</h5></th>
				<th><h5>User</h5></th>
				<th><h5>Problem</h5></th>
				<th class="text-center"><h5>Result</h5></th>
				<th class="text-center"><h5>Time</h5></th>
				<th class="text-center"><h5>Memory</h5></th>
				<th class="text-right"><h5>Date</h5></th>
			</tr>
		</thead>
		<tbody>
		@foreach ($submits as $submit)
			<tr class="plist-item" id="p_{{ $submit->id }}">
				<td class="text-center">{{ $submit->id }}</td>
				<td>
					<a href="{{ url('/user') }}">{{ $submit->username }}</a>
				</td>
				<td>
					<a href="{{ url('/problems', $submit->problemslug) }}">{{ $submit->problemtitle }}</a>
				</td>
				<td class="text-center">{!! submitResultStatus($submit->result,$submit->id) !!}</td>
				<td class="text-center">
					{{ $submit->time }}ms
				</td>
				<td class="text-center">
					{{ $submit->memory }}K
				</td>
				<td class="text-right">
					{{ $submit->created_at }}
				</td>
			</tr>
		@endforeach
		</tbody>
		<tfoot>
			<tr><td class="text-center" colspan="7">{!! $submits->render(new Illuminate\Pagination\SimpleBootstrapThreePresenter($submits)) !!}</td></tr>
		</tfoot>
	</table>
	
</div>


@endsection

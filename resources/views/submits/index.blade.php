@extends('app')

@section('content')
<div class="container submits">
	
	<div class="page-header">
	  <h1>Judge status</h1>
	</div>

	<table class="table table-striped table-condensed">
		<thead class="">
			<tr>
				<th width="140px"><h5>Date</h5></th>
				<th><h5>User</h5></th>
				<th><h5>Problem</h5></th>
				<th class="text-center"><h5>Result</h5></th>
				<th class="text-center"><h5>Time</h5></th>
				<th class="text-center"><h5>Memory</h5></th>
				<th class="text-center"><h5>Language</h5></th>
			</tr>
		</thead>
		<tbody>
		@foreach ($submits as $submit)
			<tr class="plist-item" id="p_{{ $submit->id }}">
				<td title="{{ $submit->created_at }}">
					{{ $submit->relativeCreatedDate() }}
				</td>
				<td>
					<a href="#">{{ $submit->username }}</a>
				</td>
				<td>
					<a href="{{ url('/problems', $submit->problemslug) }}">{{ $submit->problemtitle }}</a>
				</td>
				<td class="text-center">{!! $submit->resultStatus() !!}</td>
				<td class="text-center">
					{!! $submit->time() !!}
				</td>
				<td class="text-center">
					{!! $submit->memory() !!}
				</td>
				<td class="text-center">
					{!! $submit->language() !!}
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


@section('scripts')
<script>
$(function(){
	/*$('.codelink').click(function(){
		var h = 840;
		var w = 800;
		var url = $(this).attr('href');
		window.open(url, '', 'scrollbars=1,height=' + h + ', width=' + w + ', top=150,left=50, toolbar=no, menubar=no,');
		return false;
	});*/
});
</script>
@stop
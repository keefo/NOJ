@extends('admin._layout')

{{-- Web site Title --}}
@section('title') {{{ $title }}} :: @parent @stop

{{-- Content --}}

@section('content')

    <div class="page-header">
        <h3>
            <i class="fa fa-fw fa-book"></i> {{$title}}
        </h3>
    </div>
    
    <div class="row">
        <div class="col-lg-12 col-md-12">
	        <table class="{{ $tableclass }}">
				<thead class="">
					<tr>
						<th width="50px"><h5>Action</h5></th>
						<th width="50px"><h5>Id</h5></th>
						<th><h5>Title</h5></th>
						<th class="text-center"><h5>Solved/Submit</h5></th>
						<th class="text-center"><h5>Data</h5></th>
					</tr>
				</thead>
				<tbody>
				@foreach ($list as $item)
					@if($item->published)
					<tr class="plist-item" id="p_{{ $item->id }}">
					@else
					<tr class="plist-item danger" id="p_{{ $item->id }}">
					@endif
						<td class="dropdown">
							  <button class="btn btn-default btn-xs dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true"> Actions  <span class="caret"></span></button>
							  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
								  @if($item->published)
								  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">UnPublish</a></li>
								  @else
								  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Publish</a></li>
								  @endif
							  </ul>
						</td>
						<td>
							{{ $item->id+999 }}
						</td>
						<td>
							<a href="{{ url('/problems', $item->slug) }}">{{ $item->title }}</a>
						</td>
						<td class="text-center">
							<a href="#">{{ $item->accept_count }}</a>/<a href="#">{{ $item->submit_count }}</a>
						</td>
						<td>
							data
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
        </div>
        <div class="col-lg-12 col-md-12 text-center">
    	{!! $list->render() !!}
    	</div>        
    </div>

@endsection

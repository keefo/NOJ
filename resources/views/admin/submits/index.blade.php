@extends('admin._layout')

{{-- Web site Title --}}
@section('title') {{{ $title }}} :: @parent @stop

{{-- Content --}}

@section('content')

    <div class="page-header">
        <h3>
            <i class="fa fa-fw fa-list"></i> {{$title}}
        </h3>
    </div>
    
    <div class="row submits">
        <div class="col-lg-12 col-md-12">
	        <table class="{{ $tableclass }}">
				<thead class="">
					<tr>
						<th width="60px"><h5>Id</h5></th>
						<th width="140px"><h5>Date</h5></th>
						<th><h5>Author</h5></th>
						<th><h5>Title</h5></th>
						<th class="text-center"><h5>Status</h5></th>
						<th class="text-center"><h5>Action</h5></th>
					</tr>
				</thead>
				<tbody>
				@foreach ($list as $item)
					<tr class="plist-item" id="p_{{ $item->id }}">
						<td>
							{{ $item->id }}
						</td>
						<td>
							{{ $item->created_at }}
						</td>
						<td>
							<a href="{{ url('/users', $item->username) }}">{{ $item->screen_name }}</a>
						</td>
						<td>
							<a href="{{ url('/problems', $item->problemslug) }}">{{ $item->problemtitle }}</a>
						</td>
						<td class="text-center">
							{!! $item->resultStatus() !!}
						</td>
						<td class="text-center">
							
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

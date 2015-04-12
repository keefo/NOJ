@extends('admin._layout')

{{-- Web site Title --}}
@section('title') {{{ $title }}} :: @parent @stop

{{-- Content --}}

@section('content')

    <div class="page-header">
        <h3>
            <i class="fa fa-fw fa-newspaper-o"></i> {{$title}}
        </h3>
    </div>
    
    <div class="row">
        <div class="col-lg-12 col-md-12">
	        <table class="{{ $tableclass }}">
				<thead class="">
					<tr>
						<th width="50px"><h5>Action</h5></th>
						<th width="50px"><h5>Id</h5></th>
						<th width="140px"><h5>Date</h5></th>
						<th><h5>Author</h5></th>
						<th><h5>Title</h5></th>
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
								  @if(!$item->verified)
								  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Send Verification Email</a></li>
								  @endif
								  @if(!$item->published)
								  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">UnPublish</a></li>
								  @else
								  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Publish</a></li>
								  @endif
							  </ul>
						</td>
						<td title="{{ $item->created_at }}">
							{{ $item->relativeCreatedDate() }}
						</td>
						<td>
							<a href="#">{{ $item->authorName }}</a>
						</td>
						<td>
							<a href="{{ url('/articles', $item->slug) }}">{{ $item->title }}</a>
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

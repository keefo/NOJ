@extends('admin._layout')

{{-- Web site Title --}}
@section('title') {{{ $title }}} :: @parent @stop

{{-- Content --}}

@section('content')

    <div class="page-header">
        <h3>
            <i class="fa fa-fw fa-users"></i> {{$title}}
        </h3>
    </div>
    
    <div class="row">
        <div class="col-lg-12 col-md-12">
	        <table class="{{ $tableclass }}">
				<thead class="">
					<tr>
						<th width="50px"><h5>Action</h5></th>
						<th width="50px"><h5>Id</h5></th>
						<th><h5>Username</h5></th>
						<th><h5>Email</h5></th>
						<th><h5>From</h5></th>
						<th><h5>Solved/Submit</h5></th>
						<th class="sorting" data-field="price" data-sortable="true" data-sorter="logincount"><h5>login count <i class="fa fa-sort-desc"></i></h5></th>
					</tr>
				</thead>
				<tbody>
				@foreach ($list as $item)
					@if($item->disabled)
					<tr class="plist-item danger" id="p_{{ $item->id }}" title="disabled by admin">
					@elseif($item->verified)
					<tr class="plist-item success" id="p_{{ $item->id }}">
					@else
					<tr class="plist-item warning" id="p_{{ $item->id }}" title="email is not verified, non-actived account">
					@endif
					
						<td class="dropdown">
							  <button class="btn btn-default btn-xs dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true"> Actions  <span class="caret"></span></button>
							  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
								  @if(!$item->verified)
								  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Send Verification Email</a></li>
								  @endif
								  @if($item->disabled)
								  <li role="presentation"><a role="menuitem" tabindex="-1" href="#" class="toggle" onclick="toggleuser({{ $item->id }})">Enable this user</a></li>
								  @else
								  <li role="presentation"><a role="menuitem" tabindex="-1" href="#" class="toggle" onclick="toggleuser({{ $item->id }})">Disable this user</a></li>
								  @endif
							  </ul>
						</td>
						<td>
							{{ $item->id }}
						</td>
						<td>
							<a href="{{ url('/users', $item->username) }}">{{ $item->screen_name }}</a>
						</td>
						<td>
							<a href="#">{{ $item->email }}</a>
							@if($item->verified)
								<i class="fa fa-fw fa-check-circle text-success" title="email verified"></i>
							@endif
						</td>
						<td>
							{{ $item->register_ip }}
						</td>
						<td>
							<a href="#">{{ $item->solved }}</a>/<a href="#">{{ $item->submit }}</a>
						</td>
						<td>
							<a href="#">{{ $item->login_count }}</a>
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

@section('scripts')

<script>
function toggleuser(id){
    $.get('/admin/users/'+id+'/toggle',function(r){
        if(r=='disabled'){
            $('#p_'+id).removeClass('success danger warning').addClass('danger');
            $('#p_'+id).find('.toggle').html('Enabled this user');
        }
        else if(r=='verified'){
            $('#p_'+id).removeClass('success danger warning').addClass('success');
            $(this).find('.toggle').html('Disable this user');
        }
        else if(r=='unverified'){
            $('#p_'+id).removeClass('success danger warning').addClass('warning');
            $(this).find('.toggle').html('Disable this user');
        }
    });
}

$(function(){
   console.log('toggleuser'); 
});
</script>


@endsection


<a href="{{ route('admin.orders.show',$query->id) }}" class="btn btn-outline-info mr-2 p-2">@lang('show')</a>
@if($query->status=='pending')
<a href="{{ route('admin.orders.edit',$query->id) }}" class="btn btn-outline-success mr-2 p-2">@lang('edit')</a>
@endif
@if($query->status=='rejected' || $query->status=='delivered')
<button type="submit" class="btn btn-outline-danger mr-2 p-2 " form="DeleteForm"
        onclick="DeleteElement(this)">@lang('delete')</button>
<form action="{{ route('admin.orders.destroy',$query->id) }}" id="DeleteForm" method="POST">@method('delete')
  @csrf
</form>
@endif

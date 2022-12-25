
<a href="{{ route('admin.admins.edit',$query->id) }}" class="btn btn-outline-success mr-2 p-2">@lang('edit')</a>
@if($query->user_type != 'admin')
<button type="submit" class="btn btn-outline-danger mr-2 p-2 " form="DeleteForm"
        onclick="DeleteElement(this)">@lang('delete')</button>
<form action="{{ route('admin.admins.destroy',$query->id) }}" id="DeleteForm" method="POST">@method('delete')
    @csrf
</form>
@endif

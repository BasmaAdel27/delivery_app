<a href="{{ route('admin.customers.edit',$query->id) }}" class="btn btn-outline-success mr-2 p-2">@lang('edit')</a>

<button type="submit" class="btn btn-outline-danger mr-2 p-2 " form="DeleteForm"
        onclick="DeleteElement(this)">@lang('delete')</button>
<form action="{{ route('admin.customers.destroy',$query->id) }}" id="DeleteForm" method="POST">@method('delete')
  @csrf
</form>

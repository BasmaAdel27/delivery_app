<a href="{{ route('admin.trucks.show',$query->id) }}" class="btn btn-outline-info mr-2 p-2">@lang('show')</a>

<a href="{{ route('admin.trucks.edit',$query->id) }}" class="btn btn-outline-success mr-2 p-2">@lang('edit')</a>

<button type="submit" class="btn btn-outline-danger mr-2 p-2 " form="DeleteForm"
        onclick="DeleteElement(this)">@lang('delete')</button>
<form action="{{ route('admin.trucks.destroy',$query->id) }}" id="DeleteForm" method="POST">@method('delete')
  @csrf
</form>

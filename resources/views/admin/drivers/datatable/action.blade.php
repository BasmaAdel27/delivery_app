<a href="{{ route('admin.drivers.financial_dues',$query->id) }}" class="btn btn-outline-info mr-2 p-2">@lang('financial_dues')</a>
<a href="{{ route('admin.drivers.show',$query->id) }}" class="btn btn-outline-info mr-2 p-2">@lang('show')</a>
<a href="{{ route('admin.drivers.edit',$query->id) }}" class="btn btn-outline-success mr-2 p-2">@lang('edit')</a>

<button type="submit" class="btn btn-outline-danger mr-2 p-2 " form="DeleteForm"
        onclick="DeleteElement(this)">@lang('delete')</button>
<form action="{{ route('admin.drivers.destroy',$query->id) }}" id="DeleteForm" method="POST">@method('delete')
    @csrf
</form>

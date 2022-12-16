
@if($query->status == 'pending')
    <button type="submit" class="btn btn-success mr-2 p-2 " form="deliveredForm"
            onclick="deliveredElement(this)">@lang('delivered')</button>
  <form action="{{ route('admin.orders.delivered',$query->id) }}" id="deliveredForm" method="POST"  style="display:inline-block">@method('PUT')
    @csrf
  </form>
    <button type="submit" class="btn btn-danger mr-2 p-2 " form="rejectedForm"
            onclick="rejectedElement(this)">@lang('rejected')</button>
    <form action="{{ route('admin.orders.rejected',$query->id) }}" id="rejectedForm" method="POST"  style="display:inline-block">@method('PUT')
      @csrf
    </form>
@endif


@if($query->status == 'pending')
    <button type="submit" class="btn btn-danger mr-2 p-2 " form="deliveredForm"
            onclick="deliveredElement(this)">@lang('delivered')</button>
  <form action="{{ route('admin.orders.delivered',$query->id) }}" id="deliveredForm" method="POST">@method('PUT')
    @csrf
  </form>
    <button type="submit" class="btn btn-danger mr-2 p-2 " form="rejectedForm"
            onclick="rejectedElement(this)">@lang('rejected')</button>
    <form action="{{ route('admin.subscriptions.inactive',$query->id) }}" id="rejectedForm" method="POST">@method('PUT')
      @csrf
    </form>
@endif

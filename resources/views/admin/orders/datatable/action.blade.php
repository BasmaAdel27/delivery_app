<button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-primary mr-2 p-2">@lang('change_driver')</button>
<form action="{{ route('admin.orders.change_driver',$query->id) }}" method="post" enctype="multipart/form-data" style="display: inline-block;">
@csrf
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">@lang('change_driver')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="form-group col-6">
            <label>@lang('driver_name')</label>
            <select name="driver_id" id="driver" class="form-control">
              <option value="">@lang('select')</option>
              @foreach ($drivers as $id => $name)
                <option value="{{$id}}" {{$id==old('driver_id',$query->driver->id) ? 'selected':''}}>{{$name}}</option>
              @endforeach
            </select>
          </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('cancel')</button>
        <input type="submit" class="btn btn-primary" value="@lang('save')">
      </div>
    </div>
  </div>
</div>
</form>
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

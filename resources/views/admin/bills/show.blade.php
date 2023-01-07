@extends('admin.app')
@section('title') @lang('bills') @endsection
@section('content')

  <div class="card mt-5">
    <div class="card-header d-flex justify-content-between">
      <h2 class="mb-4">@lang('bills')</h2>
      <a href="{{ route('admin.bills.index') }}" class="btn btn-outline-dark btn-lg font-weight-bold">@lang('back')</a>
    </div>
    <div class="card-body">
      <p class="card-description">
        @lang('bill_details')
      </p>
      <div class="row">
        <div class="form-group col-6">
          <label><strong>@lang("name") :</strong></label>
          {{$bill->driver?->getFullNameAttribute()}}
        </div>

          <div class="form-group col-6">
          <label><strong>@lang("truck_number") :</strong></label>
          {{$bill->truck?->plate_number}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("amount") :</strong></label>
          {{$bill->amount}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("description") :</strong></label>
          {{$bill->description}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("date") :</strong></label>
          {{$bill?->date}}
        </div>
      </div>



      </div>

    </div>
  </div>

@endsection

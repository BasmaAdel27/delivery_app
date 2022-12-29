@extends('admin.app')
@section('title') @lang('drivers') @endsection
@section('content')

  <div class="card mt-5">
    <div class="card-header d-flex justify-content-between">
      <h2 class="mb-4">@lang('drivers')</h2>
      <a href="{{ route('admin.drivers.index') }}" class="btn btn-outline-dark btn-lg font-weight-bold">@lang('back')</a>
    </div>
    <div class="card-body">
      <p class="card-description">
        @lang('driver_details')
      </p>
      <div class="row">
        <div class="form-group col-6">
          <label><strong>@lang("name") :</strong></label>
          {{$driver->getFullNameAttribute()}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("license_number") :</strong></label>
          {{$driver->license_number}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("License_expiry") :</strong></label>
          {{$driver->License_expiry}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("card") :</strong></label>
          @if($driver->card == 0)
            @lang('no')
          @else
            @lang('yes')
          @endif
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("card_expiry") :</strong></label>
          {{$driver->card_expiry}}
        </div>

        <div class="form-group col-6">
          <label><strong>@lang("identity_number") :</strong></label>
          {{$driver->identity_number}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("phone") :</strong></label>
          {{$driver->phone}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("delegation") :</strong></label>
          @if($driver->delegation == 0)
            @lang('no')
          @else
            @lang('yes')
          @endif
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("delegation_date") :</strong></label>
          {{$driver->delegation_date}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("email") :</strong></label>
          {{$driver->email}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("address") :</strong></label>
          {{$driver->address}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("salary") :</strong></label>
          {{$driver->salary}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("truck_number") :</strong></label>
          {{$driver->truck?->plate_number}}
        </div>


      </div>



      </div>

    </div>
  </div>

@endsection

@extends('admin.app')
@section('title') @lang('الشاحنات') @endsection
@section('content')

  <div class="card mt-5">
    <div class="card-header d-flex justify-content-between">
      <h2 class="mb-4">@lang('الشاحنات')</h2>
      <a href="{{ route('admin.trucks.index') }}" class="btn btn-outline-dark btn-lg font-weight-bold">@lang('back')</a>
    </div>
    <div class="card-body">
      <p class="card-description">
        @lang('truck_details')
      </p>
      <div class="row">
        <div class="form-group col-6">
          <label><strong>@lang("plate_number") :</strong></label>
          {{$truck->plate_number}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("truck_type") :</strong></label>
          {{$truck->truck_type}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("truck_model") :</strong></label>
          {{$truck->truck_model}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("Examination_date") :</strong></label>
         {{$truck->Examination_date}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("license_number") :</strong></label>
          {{$truck->license_number}}
        </div>

        <div class="form-group col-6">
          <label><strong>@lang("License_expiry") :</strong></label>
          {{$truck->license_expiry}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("operating_card") :</strong></label>
          {{$truck->operating_card}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("operating_cardDate") :</strong></label>
         {{$truck->operating_cardDate}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("application_date") :</strong></label>
          {{$truck->application_date}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("insurance_date") :</strong></label>
          {{$truck->insurance_date}}
        </div>


      </div>



    </div>

  </div>
  </div>

@endsection

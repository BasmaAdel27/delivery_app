@extends('admin.app')
@section('styles')
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title')@lang('trucks')@endsection
@section('content')
  <div class="container">

    <div class="card mt-5">
      <div class="card-header d-flex justify-content-between">
        <h2 class="mb-4">@lang('trucks')</h2>
        <a href="{{ route('admin.trucks.index') }}"
           class="btn btn-outline-dark btn-lg font-weight-bold">@lang('back')</a>
      </div>
      <div class="card-body table-responsive">
        <form action="{{ route('admin.trucks.store') }}" method="post" enctype="multipart/form-data">@csrf
          <div class="row">
            <div class="form-group col-6">
              <label>@lang("plate_number")</label>
              <input type="text" class="form-control" name='plate_number' value="{{ old('plate_number')}}">
            </div>
            <div class="form-group col-6">
              <label>@lang("truck_type")</label>
              <input type="text" class="form-control" name='truck_type' value="{{ old('truck_type')}}">
            </div>
            <div class="form-group col-6">
              <label>@lang("truck_model")</label>
              <input type="text" class="form-control" name='truck_model' value="{{ old('truck_model')}}">
            </div>
            <div class="form-group col-6">
              <label>@lang("Examination_date")</label>
              <input type="date" class="form-control" name='Examination_date' value="{{ old('Examination_date')}}">
            </div>
            <div class="form-group col-6">
              <label>@lang("license_number")</label>
              <input type="text" class="form-control" name='license_number' value="{{ old('license_number')}}">
            </div>
            <div class="form-group col-6">
              <label>@lang('License_expiry')</label>
              <input type="date" name="License_expiry" class="form-control" value="{{ old('License_expiry')}}">
            </div>
            <div class="form-group col-6">
              <label>@lang('operating_card')</label>
              <input type="text" name="operating_card" class="form-control" value="{{ old('operating_card')}}">
            </div>
            <div class="form-group col-6">
              <label>@lang("operating_cardDate")</label>
              <input type="date" class="form-control" name='operating_cardDate' value="{{ old('operating_cardDate')}}">
            </div>
            <div class="form-group col-6">
              <label>@lang('application_date')</label>
              <input type="date" name="application_date" class="form-control" value="{{ old('application_date')}}">
            </div>

          </div>
            <div class="row">
            <div class="form-group col-6">
              <input type="submit" class="btn btn-dark" value="@lang('submit')">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection

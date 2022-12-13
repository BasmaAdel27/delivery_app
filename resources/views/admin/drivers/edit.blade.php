@extends('admin.app')
@section('styles')
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title')@lang('drivers')@endsection
@section('content')
  <div class="container">

    <div class="card mt-5">
      <div class="card-header d-flex justify-content-between">
        <h2 class="mb-4">@lang('drivers')</h2>
        <a href="{{ route('admin.drivers.index') }}"
           class="btn btn-outline-dark btn-lg font-weight-bold">@lang('back')</a>
      </div>
      <div class="card-body table-responsive">
        <form action="{{ route('admin.drivers.update',$driver) }}" method="post" >@csrf
          @method('PUT')
          <div class="row">
            <div class="form-group col-6">
              <label>@lang("first_name")</label>
              <input type="text" class="form-control" name='first_name' value="{{$driver->first_name}}">
            </div>
            <div class="form-group col-6">
              <label>@lang("last_name")</label>
              <input type="text" class="form-control" name='last_name' value="{{$driver->last_name}}">
            </div>
            <div class="form-group col-6">
              <label>@lang("license_number")</label>
              <input type="text" class="form-control" name='license_number' value="{{$driver->license_number}}">
            </div>
            <div class="form-group col-6">
              <label>@lang('License_expiry')</label>
              <input type="date" name="License_expiry" class="form-control"  value="{{$driver->License_expiry}}">
            </div>

            <div class="form-group col-6">
              <label>@lang("identification_Number")</label>
              <input type="text" class="form-control" name='identification_Number' value="{{$driver->identification_Number}}" >
            </div>


            <div class="form-group col-6">
              <label>@lang("phone")</label>
              <input type="text" class="form-control" name='phone' value="{{$driver->phone}}">
            </div>
            <div class="form-group col-6">
              <label>@lang("email")</label>
              <input type="email" class="form-control" name='email' value="{{$driver->email}}">
            </div>
            <div class="form-group col-6">
              <label>@lang("address")</label>
              <input type="text" class="form-control" name='address' value="{{$driver->address}}">
            </div>


            <div class="form-group col-6">
              <label>@lang('password')</label>
              <input type="password" class="form-control" placeholder="@lang('password')" name="password">
            </div>
            <div class="form-group col-6">
              <label>@lang('password_confirmation')</label>
              <input type="password" class="form-control" placeholder="@lang('password_confirmation')"
                     name="password_confirmation">
            </div>

            <div class="form-group col-6">
              <label>@lang('truck_number')</label>
              <select name="truck_id" id="truck" class="form-control">
                <option value="">@lang('select')</option>
                @foreach ($trucks as $id => $name)
                  <option value="{{$id}}" {{$id==$driver->truck->id ?'selected': '' }}>{{$name}}</option>
                @endforeach
              </select>
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

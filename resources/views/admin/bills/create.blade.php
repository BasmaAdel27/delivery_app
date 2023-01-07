@extends('admin.app')
@section('styles')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title')@lang('bills')@endsection
@section('content')
<div class="container">

  <div class="card mt-5">
    <div class="card-header d-flex justify-content-between">
      <h2 class="mb-4">@lang('bills')</h2>
      <a href="{{ route('admin.bills.index') }}"
        class="btn btn-outline-dark btn-lg font-weight-bold">@lang('back')</a>
    </div>
    <div class="card-body table-responsive">
      <form action="{{ route('admin.bills.store') }}" method="post" enctype="multipart/form-data">@csrf
        <div class="row">
          <div class="form-group col-6">
            <label>@lang('driver_name')</label>
            <select name="user_id" id="driver" class="form-control">
              <option value="">@lang('select')</option>
              @foreach ($drivers as $id => $name)
                <option value="{{$id}}"  {{ old('driver_id') == $id ? 'selected' : '' }}>{{$name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group col-6">
            <label>@lang('truck_number')</label>
            <select name="truck_id" id="truck" class="form-control">
              <option value="">@lang('select')</option>
              @foreach ($trucks as $id => $name)
                <option value="{{$id}}"  {{ old('truck_id') == $id ? 'selected' : '' }}>{{$name}}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group col-12">
            <label>@lang("description")</label>
            <textarea  class="form-control" name='description' >{{ old('description')}}</textarea>
          </div>
          <div class="form-group col-6">
            <label>@lang("amount")</label>
            <input type="text" class="form-control" name='amount' value="{{ old('amount')}}">
          </div>

          <div class="form-group col-6">
            <label>@lang("date")</label>
            <input type="date" class="form-control" name='date' value="{{ old('date')}}">
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

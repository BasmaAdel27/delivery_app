@extends('admin.app')
@section('title')@lang('customers')@endsection
@section('content')
  <div class="container">

    <div class="card mt-5">
      <div class="card-header d-flex justify-content-between">
        <h2 class="mb-4">@lang('customers')</h2>
        <a href="{{ route('admin.customers.index') }}"
           class="btn btn-outline-dark btn-lg font-weight-bold">@lang('back')</a>
      </div>
      <div class="card-body table-responsive">
        <form action="{{ route('admin.customers.store') }}" method="post" enctype="multipart/form-data">@csrf
          <div class="row">
            <div class="form-group col-6">
              <label>@lang("first_name")</label>
              <input type="text" class="form-control" name='first_name'>
            </div>
            <div class="form-group col-6">
              <label>@lang("last_name")</label>
              <input type="text" class="form-control" name='last_name'>
            </div>
            <div class="form-group col-6">
              <label>@lang("company_name")</label>
              <input type="text" class="form-control" name='company_name'>
            </div>
            <div class="form-group col-6">
              <label>@lang("commercial_register")</label>
              <input type="text" class="form-control" name='commercial_register'>
            </div>
            <div class="form-group col-6">
              <label>@lang('phone')</label>
              <input type="text" name="phone" class="form-control">
            </div>

            <div class="form-group col-6">
              <label>@lang("contact_number")</label>
              <input type="text" class="form-control" name='contact_number'>
            </div>


            <div class="form-group col-6">
              <label>@lang("address")</label>
              <input type="text" class="form-control" name='address'>
            </div>
            <div class="form-group col-6">
              <label>@lang("district_name")</label>
              <input type="text" class="form-control" name='district_name'>
            </div>
            <div class="form-group col-6">
              <label>@lang("build_number")</label>
              <input type="text" class="form-control" name='build_number'>
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

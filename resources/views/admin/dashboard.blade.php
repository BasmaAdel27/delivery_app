@extends('admin.app')
@section('title') @lang('dashboard') @endsection
@section('content')

  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-between flex-wrap">
        <div class="d-flex align-items-end flex-wrap">
          <div class="mr-md-3 mr-xl-5"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body dashboard-tabs p-0">
          <div class="tab-content py-0 px-0">
            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
              <div class="d-flex flex-wrap justify-content-xl-between">
                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                  <i class="mdi mdi-timer mr-3 icon-lg text-danger"></i>
                  <div class="d-flex flex-column justify-content-around">
                    <p class="mb-1 text-muted">@lang('orders_pending')</p>
                    <h5 class="mr-2 mb-0">{{$order_pending}}</h5>
                  </div>
                </div>
                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                  <i class="mdi mdi-truck-delivery mr-3 icon-lg text-success"></i>
                  <div class="d-flex flex-column justify-content-around">
                    <p class="mb-1 text-muted">@lang('orders_delivered')</p>
                    <h5 class="mr-2 mb-0">{{$order_delivered}}</h5>
                  </div>
                </div>
                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                  <i class="mdi mdi-cash-multiple mr-3 icon-lg text-success"></i>
                  <div class="d-flex flex-column justify-content-around">
                    <p class="mb-1 text-muted">@lang('bills')</p>
                    <h5 class="mr-2 mb-0">{{$bills}}</h5>
                  </div>
                </div>

                </div>


              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body dashboard-tabs p-0">
          <div class="tab-content py-0 px-0">
            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
              <div class="d-flex flex-wrap justify-content-xl-between">
                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                  <i class="mdi mdi-truck mr-3 icon-lg text-success"></i>
                  <div class="d-flex flex-column justify-content-around">
                    <p class="mb-1 text-muted">@lang('trucks')</p>
                    <h5 class="mr-2 mb-0">{{$trucks}}</h5>
                  </div>
                </div>
                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                  <i class="mdi mdi-account-group mr-3 icon-lg text-success"></i>
                  <div class="d-flex flex-column justify-content-around">
                    <p class="mb-1 text-muted">@lang('drivers')</p>
                    <h5 class="mr-2 mb-0">{{$drivers}}</h5>
                  </div>
                </div>
                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                  <i class="mdi mdi-account-multiple mr-3 icon-lg text-success"></i>
                  <div class="d-flex flex-column justify-content-around">
                    <p class="mb-1 text-muted">@lang('customers')</p>
                    <h5 class="mr-2 mb-0">{{$customers}}</h5>
                  </div>

                </div>


              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection



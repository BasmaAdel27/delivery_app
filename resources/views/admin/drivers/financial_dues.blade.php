@extends('admin.app')
@section('title') @lang('financial_dues') @endsection
@section('content')
  <div class="card mt-5">
    <div class="card-header d-flex justify-content-between">
      <h2 class="mb-4">@lang('financial_dues')</h2>
    </div>
    <div class="card-header">
      @include('admin.orders._date_search')
    </div>
    @if(request()->date_from && request()->date_to)
      <div class="card-body">
        <br>
        <div class="row">
          <div class="form-group col-6">
            <label><strong>@lang("financial_dues") :</strong></label>
            {{$financial_dues}}
          </div>
        </div><hr><br>
        <p class="card-description">
          @lang('details')
        </p>
        <div class="row">
          <div class="form-group col-6">
            <label><strong>@lang("name") :</strong></label>
            {{$driver->getFullNameAttribute()}}
          </div>
          <div class="form-group col-6">
            <label><strong>@lang("salary") :</strong></label>
            {{$driver->salary}}
          </div>
          <div class="form-group col-6">
            <label><strong>@lang("bills_total") :</strong></label>
            {{$bills_sum}}
          </div>
          <div class="form-group col-6">
            <label><strong>@lang("pockets_total") :</strong></label>
            {{$orders_sum}}
          </div>

        </div>
        <p class="card-description">
          @lang('orders_details')
        </p>
        <table class="table table-bordered">
          <thead>
          <tr>
            <th scope="col">@lang('order_number')</th>
            <th scope="col">@lang('customer_name')</th>
            <th scope="col">@lang('order_pocket')</th>
          </tr>
          </thead>
          <tbody>
          @foreach($orders as $order)
          <tr>
            <th scope="row"><a href="{{route('admin.orders.show',$order->id)}}">{{$order->order_number}}</a></th>
            <td>{{$order->customer->first_name}} {{$order->customer->last_name}}</td>
            <td>{{$order->order_pocket}}</td>
          </tr>
          @endforeach
          <tr>
            <td colspan="3" style="text-align: center"><h5>@lang('total'): {{$orders_sum}}</h5></td>
          </tr>

          </tbody>
        </table>
        <br><hr><br>

        <p class="card-description">
          @lang('bills_details')
        </p>
        <table class="table table-bordered">
          <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">@lang('amount')</th>
            <th scope="col">@lang('description')</th>
            <th scope="col">@lang('created_at')</th>
          </tr>
          </thead>
          <tbody>
          @foreach($bills as $bill)
            <tr>
              <th scope="row"><a href="{{route('admin.bills.show',$bill->id)}}">{{$bill->id}}</a></th>
              <td>{{$bill->amount}}</td>
              <td>{{$bill->description}}</td>
              <td>{{$bill->created_at}}</td>
            </tr>
          @endforeach
          <tr>
            <td colspan="3" style="text-align: center"><h5>@lang('total'): {{$bills_sum}}</h5></td>
          </tr>

          </tbody>
        </table>

      </div>
    @endif
  </div>
@endsection

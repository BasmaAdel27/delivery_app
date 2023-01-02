@extends('admin.app')
@section('title') @lang('order') @endsection
@section('content')

  <div class="card mt-5">
    <div class="card-header d-flex justify-content-between">
      <h2 class="mb-4">@lang('order')</h2>
      <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-dark btn-lg font-weight-bold">@lang('back')</a>
    </div>
    <div class="card-body">
      <p class="card-description">
        @lang('order_details')
      </p>
      <div class="row">
            <div class="form-group col-6">
              <label><strong>@lang("order_number") :</strong></label>
              {{$order->order_number}}
            </div>
            <div class="form-group col-6">
              <label><strong>@lang("price") :</strong></label>
             {{$order->price}}
            </div>
           <div class="form-group col-6">
              <label><strong>@lang("quantity") :</strong></label>
             {{$order->quantity}}
            </div>
           <div class="form-group col-6">
              <label><strong>@lang("weight") :</strong></label>
             {{$order->weight}}
            </div>
           <div class="form-group col-6">
              <label><strong>@lang("moves_number") :</strong></label>
             {{$order->moves_number}}
            </div>
        <div class="form-group col-6">
              <label><strong>@lang("order_pocket") :</strong></label>
             {{$order->order_pocket}}
            </div>

              <div class="form-group col-6">
                <label><strong>@lang("status") :</strong></label>
               @lang($order->status)
              </div>

        <p class="card-description col-12">
          @lang('order_start')
        </p>
        <div class="form-group col-12">
          <label><strong>@lang("address") :</strong></label>
          {{$order->address_start}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("latitude") :</strong></label>
          {{$order->lat_start}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("longitude") :</strong></label>
          {{$order->lng_start}}
        </div>
        <div class="form-group col-12">
          <div class="col-lg-9">
            <div id="map" style="width: 100%; height: 400px;"></div>
            <input type="hidden" name="lat" id="lat"
                   value="{{ $order->lat_start}}">
            <input type="hidden" name="lng" id="lng"
                   value="{{ $order->lng_start}}">

          </div>
        </div>

        <p class="card-description col-12">
          @lang('order_end')
        </p>
        <div class="form-group col-12">
          <label><strong>@lang("address") :</strong></label>
          {{$order->address_end}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("latitude") :</strong></label>
          {{$order->lat_end}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("longitude") :</strong></label>
          {{$order->lng_end}}
        </div>
        <div class="form-group col-12">
          <div class="col-lg-9">
            <div id="map2" style="width: 100%; height: 400px;"></div>
            <input type="hidden" name="lat" id="lat2"
                   value="{{ $order->lat_end}}">
            <input type="hidden" name="lng" id="lng2"
                   value="{{ $order->lng_end}}">

          </div>
        </div>




      </div>
      <hr>
      <p class="card-description">
        @lang('customer_details')
      </p>
      <div class="row">
        <div class="form-group col-6">
          <label><strong>@lang("customer_name") :</strong></label>
          {{$order->customer->first_name}} {{$order->customer->last_name}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("contact_number") :</strong></label>
          {{$order->customer->contact_number}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("commercial_register") :</strong></label>
          {{$order->customer->commercial_register}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("address") :</strong></label>
          {{$order->customer->address}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("district_name") :</strong></label>
          {{$order->customer->district_name}}
        </div>

        <div class="form-group col-6">
          <label><strong>@lang("build_number") :</strong></label>
          {{$order->customer->build_number}}
        </div>






      </div>

      <hr>
      <p class="card-description">
        @lang('driver_details')
      </p>
      <div class="row">
        <div class="form-group col-6">
          <label><strong>@lang("driver_name") :</strong></label>
          {{$order->driver->first_name}} {{$order->driver->last_name}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("identity_number") :</strong></label>
          {{$order->driver->identity_number}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("commercial_register") :</strong></label>
          {{$order->customer->commercial_register}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("phone") :</strong></label>
          {{$order->driver->phone}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("truck_number") :</strong></label>
          {{$order->driver->truck->plate_number}}
        </div>





      </div>

    </div>
  </div>

@endsection
@section('scripts')
  <script>
    window.onload=function (){
      map1();
      map2();
    }
  </script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByZjtFr8NH-E60v7emstu9TW9XcHS-BYI"
          type="text/javascript"></script>
  <script type="text/javascript">
          function map1 () {
      var latlng = new google.maps.LatLng({{ $order->lat_start}}, {{ $order->lng_start}})
      var map = new google.maps.Map(document.getElementById('map'), {
        center: latlng,
        zoom: 9,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });
      var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        title: 'Set lat/lon values for this property',
        draggable: false
      });
      google.maps.event.addListener(marker, 'dragend', function (a) {
        $("#lat").val(a.latLng.lat());
        $("#lng").val(a.latLng.lng());
      });
    };
     function map2() {
      var latlng = new google.maps.LatLng({{ $order->lat_end}}, {{ $order->lng_end}})
      var map = new google.maps.Map(document.getElementById('map2'), {
        center: latlng,
        zoom: 9,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });
      var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        title: 'Set lat/lon values for this property',
        draggable: false
      });
      google.maps.event.addListener(marker, 'dragend', function (a) {
        $("#lat2").val(a.latLng.lat());
        $("#lng2").val(a.latLng.lng());
      });
    };
  </script>
@endsection

@extends('admin.app')
@section('title')@lang('orders')@endsection
@section('content')
  <div class="container">

    <div class="card mt-5">
      <div class="card-header d-flex justify-content-between">
        <h2 class="mb-4">@lang('orders')</h2>
        <a href="{{ route('admin.orders.index') }}"
           class="btn btn-outline-dark btn-lg font-weight-bold">@lang('back')</a>
      </div>
      <div class="card-body table-responsive">
        <form action="{{ route('admin.orders.update',$order) }}" method="post" wire:submit.prevent="savePersonalData" onkeydown="return event.key != 'Enter';">@csrf
          @method('PUT')
          <div class="row">
            <div class="form-group col-6">
              <label>@lang("price")</label>
              <input type="text" class="form-control" name='price' value="{{old('price',$order->price)}}">
            </div>
            <div class="form-group col-6">
              <label>@lang("product_type")</label>
              <input type="text" class="form-control" name='product_type' value="{{old('product_type',$order->product_type)}}">
            </div>
            <div class="form-group col-6">
              <label>@lang("quantity")</label>
              <input type="number" class="form-control" name='quantity' value="{{old('quantity',$order->quantity)}}">
            </div>
            <div class="form-group col-6">
              <label>@lang("weight")</label>
              <input type="text" class="form-control" name='weight' value="{{old('weight',$order->weight)}}">
            </div>
            <div class="form-group col-6">
              <label>@lang('moves_number')</label>
              <input type="number" name="moves_number" class="form-control" value="{{old('moves_number',$order->moves_number)}}">
            </div>

            <div class="form-group col-6">
              <label>@lang('customer_name')</label>
              <select name="customer_id" id="truck" class="form-control">
                <option value="">@lang('select')</option>
                @foreach ($customers as $id => $name)
                  <option value="{{$id}}" {{$id==old('customer_id',$order->customer->id) ? 'selected':''}}>{{$name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-6">
              <label>@lang('driver_name')</label>
              <select name="driver_id" id="driver" class="form-control">
                <option value="">@lang('select')</option>
                @foreach ($drivers as $id => $name)
                  <option value="{{$id}}" {{$id==old('driver_id',$order->driver->id) ? 'selected':''}}>{{$name}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group col-6">
              <label>@lang('order_pocket')</label>
              <input type="text" name="order_pocket" class="form-control" value="{{old('order_pocket',$order->order_pocket)}}" >
            </div>
            <p class="card-description col-12">
              @lang('address_start')
            </p>
            <div class="col-12">
              <fieldset class="content-group">
                <legend class="text-bold"></legend>
                <input id="searchInput" class="input-controls" type="text" placeholder="ادخل العنوان" name="searchInput"
                       style="width: 28%;height: 35px;" value="{{old('searchInput')}}">

                <div class="map" lat="{{$order->lat_start}}" lng="{{$order->lng_start}}" id="map"
                     style="width: 100%; height: 300px;"></div>

              </fieldset>
            </div>

            <div class="form-group col-6" style="margin-top: 10px">
              <label>@lang('latitude')</label>
              <input type="text" class="form-control" name="lat_start" id="lat" value="{{old('lat_start',$order->lat_start)}}">
            </div>
            <div class="form-group col-6" style="margin-top: 10px">
              <label>@lang('longitude')</label>
              <input type="text" name="lng_start" id="lng"  class="form-control" value="{{old('lng_start',$order->lng_start)}}">
            </div>
            <div class="form-group col-12" style="margin-top: 10px">
              <label>@lang("address")</label>
              <input type="text" class="form-control" name='address_start' id="location" value="{{old('address_start',$order->address_start)}}">
            </div>
            <hr>
            <p class="card-description">
              @lang('address_end')
            </p>
            <div class="col-12">
              <fieldset class="content-group">
                <legend class="text-bold"></legend>
                <input id="searchInput2" class="input-controls" type="text" placeholder="ادخل العنوان" name="searchInput2"
                       style="width: 28%;height: 35px;" value="{{old('searchInput2')}}">

                <div class="map2" lat="{{$order->lat_end}}" lng="{{$order->lng_end}}" id="map2"
                     style="width: 100%; height: 300px;"></div>


              </fieldset>
            </div>
            <div class="form-group col-6" style="margin-top: 10px">
              <label>@lang('latitude')</label>
              <input type="text" class="form-control" name="lat_end" id="lat2" value="{{old('lat_end',$order->lat_end)}}">
            </div>
            <div class="form-group col-6" style="margin-top: 10px">
              <label>@lang('longitude')</label>
              <input type="text" name="lng_end" id="lng2"  class="form-control" value="{{old('lng_end',$order->lng_end)}}">
            </div>
            <div class="form-group col-12" style="margin-top: 10px">
              <label>@lang("address")</label>
              <input type="text" class="form-control" name='address_end' id="location2" value="{{old('address_end',$order->address_end)}}">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-6">
              <input type="submit" class="btn btn-dark" value="@lang('submit')" style="margin-top: 7px">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
@section('scripts')
  <script>
    function initialize(){
      initMap();
      initMap2()
    }
  </script>
  <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDaFbSOerPJ0NF5IArDBvQ_dX3ODWnln5c&language=ar&libraries=places&callback=initialize"
        async defer></script>

  <script>
    /* script */

    function initMap() {
      var m = document.getElementById('map');
      var lng = m.getAttribute('lng');
      var lat = m.getAttribute('lat');
      var latlng = new google.maps.LatLng(lat, lng);
      var map = new google.maps.Map(document.getElementById('map'), {
        center: latlng,
        zoom: 13
      });
      var marker = new google.maps.Marker({
        map: map,
        position: latlng,
        draggable: true,
        anchorPoint: new google.maps.Point(0, -29)
      });
      var input = document.getElementById('searchInput');
      map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
      var geocoder = new google.maps.Geocoder();
      var autocomplete = new google.maps.places.Autocomplete(input);
      autocomplete.bindTo('bounds', map);
      var infowindow = new google.maps.InfoWindow();
      autocomplete.addListener('place_changed', function () {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
          window.alert("Autocomplete's returned place contains no geometry");
          return;
        }

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
          map.fitBounds(place.geometry.viewport);
        } else {
          map.setCenter(place.geometry.location);
          map.setZoom(17);
        }

        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

        bindDataToForm(place.formatted_address, place.geometry.location.lat(), place.geometry.location.lng());
        infowindow.setContent(place.formatted_address);
        infowindow.open(map, marker);

      });
      // this function will work on marker move event into map
      google.maps.event.addListener(marker, 'dragend', function () {
        geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            if (results[0]) {
              bindDataToForm(results[0].formatted_address, marker.getPosition().lat(), marker.getPosition().lng());
              infowindow.setContent(results[0].formatted_address);
              infowindow.open(map, marker);
            }
          }
        });
      });
    }

    function bindDataToForm(address, lat, lng) {
      document.getElementById('location').value = address;
      document.getElementById('lat').value = lat;
      document.getElementById('lng').value = lng;
      console.log(document.getElementById('lat').value)
    }
    function initMap2() {
      var m = document.getElementById('map2');
      var lng = m.getAttribute('lng');
      var lat = m.getAttribute('lat');
      var latlng = new google.maps.LatLng(lat, lng);
      var map = new google.maps.Map(document.getElementById('map2'), {
        center: latlng,
        zoom: 13
      });
      var marker = new google.maps.Marker({
        map: map,
        position: latlng,
        draggable: true,
        anchorPoint: new google.maps.Point(0, -29)
      });
      var input = document.getElementById('searchInput2');
      map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
      var geocoder = new google.maps.Geocoder();
      var autocomplete = new google.maps.places.Autocomplete(input);
      autocomplete.bindTo('bounds', map);
      var infowindow = new google.maps.InfoWindow();
      autocomplete.addListener('place_changed', function () {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
          window.alert("Autocomplete's returned place contains no geometry");
          return;
        }

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
          map.fitBounds(place.geometry.viewport);
        } else {
          map.setCenter(place.geometry.location);
          map.setZoom(17);
        }

        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

        bindDataToForm2(place.formatted_address, place.geometry.location.lat(), place.geometry.location.lng());
        infowindow.setContent(place.formatted_address);
        infowindow.open(map, marker);

      });
      // this function will work on marker move event into map
      google.maps.event.addListener(marker, 'dragend', function () {
        geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            if (results[0]) {
              bindDataToForm2(results[0].formatted_address, marker.getPosition().lat(), marker.getPosition().lng());
              infowindow.setContent(results[0].formatted_address);
              infowindow.open(map, marker);
            }
          }
        });
      });
    }

    function bindDataToForm2(address, lat, lng) {
      document.getElementById('location2').value = address;
      document.getElementById('lat2').value = lat;
      document.getElementById('lng2').value = lng;
      console.log(document.getElementById('lat').value)
    }


    //    google.maps.event.addDomListener(window, 'load', initialize);
  </script>
@endsection

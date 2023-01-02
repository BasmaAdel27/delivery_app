<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">

    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.dashboard') }}">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">@lang('dashboard')</span>
      </a>
    </li>
   @if(auth()->user()->user_type=='admin')
    <li class="nav-item">
      <a class="nav-link" href="{{route('admin.admins.index')}}">
        <i class="mdi mdi-account-multiple menu-icon"></i>
        <span class="menu-title">@lang('admins')</span>
      </a>
    </li>
    @endif
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-account-group menu-icon"></i>
        <span class="menu-title">@lang('drivers')</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('admin.drivers.create')}}"> @lang('add_driver') </a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('admin.drivers.index')}}"> @lang('drivers_list') </a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('admin.reports.index')}}">
        <i class="mdi mdi-receipt menu-icon"></i>
        <span class="menu-title">@lang('reports_drivers')</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('admin.bills.index')}}">
        <i class="mdi mdi-cash-multiple menu-icon"></i>
        <span class="menu-title">@lang('bills')</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#trucks" aria-expanded="false" aria-controls="trucks">
        <i class="mdi mdi-truck menu-icon"></i>
        <span class="menu-title">@lang('trucks')</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="trucks">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('admin.trucks.create')}}"> @lang('add_truck') </a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('admin.trucks.index')}}"> @lang('trucks_list') </a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#customers" aria-expanded="false" aria-controls="customers">
        <i class="mdi mdi-account-multiple menu-icon"></i>
        <span class="menu-title">@lang('customers')</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="customers">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('admin.customers.create')}}"> @lang('add_customer') </a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('admin.customers.index')}}"> @lang('customers_list') </a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#orders" aria-expanded="false" aria-controls="orders">
        <i class="mdi mdi-truck-delivery menu-icon"></i>
        <span class="menu-title">@lang('orders')</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="orders">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('admin.orders.create')}}"> @lang('add_order') </a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('admin.orders.index')}}"> @lang('orders_list') </a></li>
        </ul>
      </div>
    </li>




  </ul>


</nav>

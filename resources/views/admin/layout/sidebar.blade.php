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
      <a class="nav-link" href="{{route('admin.drivers.index')}}">
        <i class="mdi mdi-account-group menu-icon"></i>
        <span class="menu-title">@lang('drivers')</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('admin.bills.index')}}">
        <i class="mdi mdi-cash-multiple menu-icon"></i>
        <span class="menu-title">@lang('bills')</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('admin.trucks.index')}}">
        <i class="mdi mdi-truck menu-icon"></i>
        <span class="menu-title">@lang('trucks')</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('admin.customers.index')}}">
        <i class="mdi mdi-account-multiple menu-icon"></i>
        <span class="menu-title">@lang('customers')</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{route('admin.orders.index')}}">
        <i class="mdi mdi-truck-delivery menu-icon"></i>
        <span class="menu-title">@lang('orders')</span>
      </a>
    </li>

  </ul>


</nav>

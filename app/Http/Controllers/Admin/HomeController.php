<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Customer;
use App\Models\Order;

use App\Models\Truck;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['home']);
    }

    public function home()
    {
        $order_pending=Order::where('status','pending')->count();
        $order_delivered=Order::where('status','delivered')->count();
        $customers=Customer::count();
        $drivers=User::where('user_type','driver')->count();
        $trucks=Truck::count();
        $bills=Bill::sum('amount');

        return view('admin.dashboard',compact('order_delivered','order_pending','customers','trucks','bills','drivers'));
    }


}

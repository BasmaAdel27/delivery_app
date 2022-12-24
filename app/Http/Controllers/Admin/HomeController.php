<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Subscription;
use App\Models\Trainer;
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

        return view('admin.dashboard',compact('order_delivered','order_pending'));
    }


}

<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\OrdersDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OrderRequest;
use App\Models\Customer;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{


    public function index(OrdersDataTable $ordersDataTable)
    {
        return $ordersDataTable->render('admin.orders.index');
    }


    public function create()
    {
        $drivers=User::whereHas('truck',fn($q) => $q->where('user_id','!=',null))
              ->select(DB::raw("CONCAT (first_name,' ',last_name) as name, id"))->pluck('name', 'id');;
        $customers=Customer::select(DB::raw("CONCAT (first_name,' ',last_name) as name, id"))
              ->pluck('name', 'id');
        return view('admin.orders.create',compact('drivers','customers'));
    }


    public function store(OrderRequest $request,Order $order)
    {
        $data=$request->validated();
        $order->fill($data)->save();
        $pin = mt_rand(10000000, 99999999);
        $order_number=str_shuffle($pin);
        $order->order_number=$order_number;
        $order->save();
        return redirect()->route('admin.orders.index')->with('success',trans('created_successfully'));


    }


    public function show(Order $order)
    {
        return view('admin.orders.show',compact('order'));

    }


    public function edit(Order $order)
    {
        $drivers=User::whereHas('truck',fn($q) => $q->where('user_id','!=',null))
              ->orwhereHas('truck',fn($q) => $q->where('user_id',$order->driver->id))
              ->select(DB::raw("CONCAT (first_name,' ',last_name) as name, id"))->pluck('name', 'id');;
        $customers=Customer::select(DB::raw("CONCAT (first_name,' ',last_name) as name, id"))
              ->pluck('name', 'id');
        return view('admin.orders.edit',compact('order','customers','drivers'));
    }


    public function update(OrderRequest $request, Order $order)
    {
        $data=$request->validated();
        $order->fill($data)->save();
        return redirect()->route('admin.orders.index')->with('success',trans('updated_successfully'));


    }


    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success',trans('deleted_successfully'));

    }

    public function delivered($id)
    {
        $order= Order::find($id);
        $order->status='delivered';
        $order->save();
        return redirect()->back()->with('success', trans('updated_successfully'));
    }



    public function rejected($id)
    {
        $order= Order::find($id);
        $order->status='rejected';
        $order->save();
        return redirect()->back()->with('success', trans('updated_successfully'));
    }

    public function change_driver(Request $request,$id){
        $this->validate($request, [
              'driver_id' => 'required',
        ],[
              'driver_id.required'=>'اسم السائق مطلوب'
        ]);
        $order= Order::find($id);
        $order->driver_id=$request->driver_id;
        $order->save();
        return redirect()->back()->with('success', trans('updated_successfully'));

    }
}

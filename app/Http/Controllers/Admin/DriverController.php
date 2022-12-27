<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\DriversDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DriverRequest;
use App\Models\Bill;
use App\Models\Order;
use App\Models\Truck;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function __construct()
    {

        $this->date_from = Carbon::parse(request('date_from'))->startOfDay()->toDateTimeString();
        $this->date_to   = Carbon::parse(request('date_to'))->endOfDay()->toDateTimeString();
    }

    public function index(DriversDataTable $driversDataTable)
    {
        return $driversDataTable->render('admin.drivers.index');
    }


    public function create()
    {
        $trucks=Truck::where('user_id',null)->pluck('plate_number', 'id');;
        return view('admin.drivers.create',compact('trucks'));
    }

    public function store(DriverRequest $request,User $driver)
    {
        $data=$request->validated();
        $driver->fill(array_except($data, 'truck_id'))->save();
        if ($data['truck_id']) {
            $truck = Truck::find($data['truck_id']);
            $truck->user_id = $driver->id;
        }
        $driver->user_type='driver';
        $driver->save();
        return redirect()->route('admin.drivers.index')->with('success', trans('created_successfully'));
    }


    public function show(User $driver)
    {
        return view('admin.drivers.show',compact('driver'));
    }


    public function edit(User $driver)
    {
        $trucks=Truck::where('user_id',null)
              ->orWhere('user_id', $driver->id)->pluck('plate_number', 'id');
        return view('admin.drivers.edit',compact('driver','trucks'));
    }


    public function update(DriverRequest $request, User $driver)
    {
        $data = $request->validated();
        $driver->fill(array_except($data, 'truck_id'))->save();
        if ($data['truck_id']) {

        $truck = Truck::find($data['truck_id']);
        $truck->user_id = $driver->id;
        $truck->save();
        }
        $driver->user_type='driver';
        $driver->save();
        return redirect()->route('admin.drivers.index')->with('success', trans('updated_successfully'));

    }


    public function destroy(User $driver)
    {
        $driver->delete();

        return redirect()->route('admin.drivers.index')->with('success', trans('deleted_successfully'));
    }

    public function financial_dues($id){
        $driver=User::find($id);
        if ($this->date_from && $this->date_to){
          $orders=Order::where('driver_id',$id)->whereBetween('created_at',[$this->date_from, $this->date_to])->get();
            $orders_sum = Order::where('driver_id',$id)->whereBetween('created_at',[$this->date_from, $this->date_to])->sum('order_pocket');
            $bills=Bill::where('user_id',$id)->whereBetween('created_at',[$this->date_from, $this->date_to])->get();
          $bills_sum = Bill::where('user_id',$id)->whereBetween('created_at',[$this->date_from, $this->date_to])->sum('amount');
            $financial_dues=($driver->salary + $orders_sum) - $bills_sum;
          return view('admin.drivers.financial_dues',compact('driver','orders','bills','bills_sum','orders_sum','financial_dues'));

        }
        return view('admin.drivers.financial_dues',compact('driver'));

    }
}

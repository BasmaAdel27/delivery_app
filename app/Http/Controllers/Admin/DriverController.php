<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\DriversDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DriverRequest;
use App\Models\Truck;
use App\Models\User;
use Illuminate\Http\Request;

class DriverController extends Controller
{

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
}

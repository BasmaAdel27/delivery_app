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
        $trucks=Truck::pluck('id','plate_number');
        return view('admin.drivers.create',compact('trucks'));
    }

    public function store(DriverRequest $request,User $driver)
    {
        $data=$request->validated();
        $driver->fill($data);
        $driver->user_type='driver';
        $driver->save();
        return redirect()->route('admin.drivers.index')->with('success', trans('created_successfully'));
    }


    public function show($id)
    {
        //
    }


    public function edit(User $driver)
    {
        $trucks=Truck::pluck('id','plate_number');
        return view('admin.drivers.edit',compact('driver','trucks'));
    }


    public function update(DriverRequest $request, User $driver)
    {
        $data=$request->validated();
        $driver->fill($data);
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

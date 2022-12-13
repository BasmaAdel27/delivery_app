<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\TrucksDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TruckRequest;
use App\Models\Truck;
use Illuminate\Http\Request;

class TruckController extends Controller
{

    public function index(TrucksDataTable $trucksDataTable)
    {
        return $trucksDataTable->render('admin.trucks.index');
    }


    public function create()
    {
        return view('admin.trucks.create');
    }


    public function store(TruckRequest $request,Truck $truck)
    {
        $data=$request->validated();
        $truck->fill($data)->save();
        return redirect()->route('admin.trucks.index')->with('success',trans('created_successfully'));
    }


    public function show($id)
    {
        //
    }


    public function edit(Truck $truck)
    {
        return view('admin.trucks.edit',compact('truck'));
    }


    public function update(TruckRequest $request, Truck $truck)
    {
        $data=$request->validated();
        $truck->fill($data)->save();
        return redirect()->route('admin.trucks.index')->with('success',trans('updated_successfully'));
    }


    public function destroy(Truck $truck)
    {
        $truck->delete();
        return redirect()->route('admin.trucks.index')->with('success',trans('deleted_successfully'));
    }
}

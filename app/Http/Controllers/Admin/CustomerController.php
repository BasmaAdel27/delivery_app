<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\CustomersDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index(CustomersDataTable $customersDataTable)
    {
        return $customersDataTable->render('admin.customers.index');
    }


    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(CustomerRequest $request,Customer $customer)
    {
        $data=$request->validated();
        $customer->fill($data)->save();
        return redirect()->route('admin.customers.index')->with('success',trans('created_successfully'));
    }

    public function show($id)
    {
        //
    }


    public function edit(Customer $customer)
    {
     return view('admin.customers.edit',compact('customer'));
    }

    public function update(CustomerRequest $request, Customer $customer)
    {
        $data=$request->validated();
        $customer->fill($data)->save();
        return redirect()->route('admin.customers.index')->with('success',trans('updated_successfully'));
    }


    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->back()->with('success',trans('deleted_successfully'));

    }
}

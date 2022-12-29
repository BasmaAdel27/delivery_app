<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\BillsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BillRequest;
use App\Models\Bill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{

    public function index(BillsDataTable $billsDataTable)
    {
        return $billsDataTable->render('admin.bills.index');
    }


    public function create()
    {
        $drivers = User::select(DB::raw("CONCAT (first_name,' ',last_name) as name, id"))->where('user_type','driver')->pluck('name', 'id');
        return view('admin.bills.create', compact('drivers'));
    }


    public function store(BillRequest $request, Bill $bill)
    {
        $data = $request->validated();
        $bill->fill($data)->save();
        return redirect()->route('admin.bills.index')->with('success', trans('created_successfully'));
    }


    public function show(Bill $bill)
    {
        return view('admin.bills.show',compact('bill'));
    }


}

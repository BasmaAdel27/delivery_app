<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\AdminsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index(AdminsDataTable $adminsDataTable)
    {
        if (auth()->user()->user_type=='admin') {
            return $adminsDataTable->render('admin.admins.index');
        }
            return abort(403);

    }


    public function create()
    {
        if (auth()->user()->user_type=='admin') {
            return view('admin.admins.create');
        }
        return abort(403);
    }


    public function store(AdminRequest $request,User $admin)
    {
        if (auth()->user()->user_type=='admin') {
            $data=$request->validated();
            $admin->fill($data);
            $admin->user_type='employee';
            $admin->save();
            return redirect()->route('admin.admins.index')->with('success',trans('created_successfully'));
        }
        return abort(403);

    }


    public function show($id)
    {
        //
    }


    public function edit(User $admin)
    {
        if (auth()->user()->user_type=='admin') {
            return view('admin.admins.edit',compact('admin'));
        }
        return abort(403);
    }


    public function update(AdminRequest $request, User $admin)
    {
        if (auth()->user()->user_type=='admin') {
            $data=$request->validated();
            $admin->fill($data)->save();
            return redirect()->route('admin.admins.index')->with('success',trans('updated_successfully'));
        }
        return abort(403);

    }


    public function destroy(User $admin)
    {
        if (auth()->user()->user_type=='admin') {
            $admin->delete();
            return redirect()->route('admin.admins.index')->with('success',trans('deleted_successfully'));

        }
        return abort(403);

    }
}

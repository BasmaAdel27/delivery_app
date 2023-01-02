<?php

namespace App\DataTables\Admin;

use App\Models\User;use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AdminsDataTable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
              ->eloquent($query)
              ->editColumn('first_name', function ($query) {
                  return $query->first_name .' '. $query->last_name;
              })->editColumn('Action', function ($query) {
                  return view('admin.admins.datatable.action', compact('query'));
              })->rawColumns(['first_name','Action']);
    }


    public function query()
    {
        return User::whereIn('user_type',['employee','admin'])->select('users.*')->newQuery();
    }


    public function html()
    {
        return $this->builder()
              ->columns($this->getColumns())
              ->minifiedAjax()
              ->dom('lBfrtip')
              ->orderBy(1)
              ->lengthMenu([7, 10, 25, 50, 75, 100])
              ->buttons(
                    Button::make('create'),
                    Button::make('export'),
                    Button::make('print'),
                    Button::make('reset'),
                    Button::make('reload')
              );
    }

    protected function getColumns()
    {
        return [
              Column::make('id')->title(trans('ID')),
              Column::make('first_name')->orderable(true)->title(trans('name')),
              Column::make('user_type')->orderable(true)->title(trans('user_type')),
              Column::make('email')->orderable(true)->title(trans('email')),
              Column::make('phone')->orderable(true)->title(trans('phone')),
              Column::make('address')->orderable(true)->title(trans('address')),
              Column::make('created_at')->title(trans('created_at')),
              Column::make('updated_at')->title(trans('updated_at')),
              Column::make('Action')->title(trans('action'))->searchable(false)->orderable(false)
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Admin/Admins_' . date('YmdHis');
    }
}

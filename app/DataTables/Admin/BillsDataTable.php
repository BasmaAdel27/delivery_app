<?php

namespace App\DataTables\Admin;

use App\Models\Bill;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BillsDataTable extends DataTable
{

    public function dataTable($query)
    {

        return datatables()
              ->eloquent($query)
              ->editColumn('user_id', function ($query) {
                  return $query->driver->getFullNameAttribute();
              })->editColumn('Action', function ($query) {
                  return view('admin.bills.datatable.action', compact('query'));
              })->rawColumns(['user_id','Action']);
    }

    public function query()
    {
        return Bill::with('driver')->select('bills.*')->newQuery();
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
              Column::make('user_id')->orderable(true)->title(trans('name')),
              Column::make('amount')->orderable(true)->title(trans('amount')),
              Column::make('created_at')->title(trans('created_at')),
              Column::make('Action')->title(trans('action'))->searchable(false)->orderable(false)
        ];
    }


    protected function filename()
    {
        return 'Admin/Bills_' . date('YmdHis');
    }
}

<?php

namespace App\DataTables\Admin;

use App\Models\Bill;
use Carbon\Carbon;
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
              ->editColumn('driver.first_name', function ($query) {
                  return $query->driver?->getFullNameAttribute();
              })->editColumn('truck.plate_number', function ($query) {
                  return $query->truck?->plate_number;

              })->editColumn('created_at', function ($query) {
                  return Carbon::parse($query->created_at)->format('Y-m-d');
              })->editColumn('Action', function ($query) {
                  return view('admin.bills.datatable.action', compact('query'));
              })->rawColumns(['truck.plate_number','driver.first_name','created_at','Action']);
    }

    public function query()
    {
        $bills=Bill::with('driver','truck')->select('bills.*')->latest()->newQuery();
        if ($this->request()->get('date_from') && $this->request()->get('date_to')){
            return Bill::with('driver','truck')->select('bills.*')->
            whereBetween('bills.created_at',[$this->request->date_from, $this->request->date_to])->newQuery();
        }
        else{
            return $bills;
        }
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
              Column::make('driver.first_name')->orderable(true)->title(trans('name')),
              Column::make('truck.plate_number')->orderable(true)->title(trans('truck_number')),
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

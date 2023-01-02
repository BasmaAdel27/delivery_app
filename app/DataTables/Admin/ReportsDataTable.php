<?php

namespace App\DataTables\Admin;

use App\Models\User;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ReportsDataTable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
              ->eloquent($query)
              ->editColumn('first_name', function ($query) {
                  return $query->first_name .' '. $query->last_name;
              })->editColumn('bill', function ($query) {
                  return $query->SumBills($query->id);
              })->editColumn('order_count', function ($query) {
                  return $query->countOrders($query->id);
              })->editColumn('order_pocket', function ($query) {
                  return $query->SumPockets($query->id);
              })->editColumn('total', function ($query) {
                  return ($query->salary + $query->SumPockets($query->id)) - $query->SumBills($query->id) ;
              })->editColumn('created_at', function ($query) {
                  return Carbon::parse($query->created_at)->format('Y-m-d');
              })->editColumn('Action', function ($query) {
                  return view('admin.reports.datatable.action', compact('query'));
              })->rawColumns(['bill','order_count','order_pocket','total','created_at','Action']);
    }


    public function query()
    {
        $drivers= User::where('user_type','driver')->select('users.*')->newQuery();
        return $drivers;

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

                    Button::make('excel'),

              );
    }


    protected function getColumns()
    {
        return [
              Column::make('id')->title(trans('ID')),
              Column::make('first_name')->orderable(true)->title(trans('driver_name')),
              Column::make('salary')->orderable(true)->title(trans('salary')),
              Column::make('bill')->orderable(true)->title(trans('bills'))->searchable(false)->orderable(false),
              Column::make('order_count')->orderable(true)->title(trans('order_counts'))->searchable(false)->orderable(false),
              Column::make('order_pocket')->orderable(true)->title(trans('order_pockets'))->searchable(false)->orderable(false),
              Column::make('total')->orderable(true)->title(trans('total'))->searchable(false)->orderable(false),
              Column::make('Action')->title(trans('action'))->searchable(false)->orderable(false)
        ];
    }


    protected function filename()
    {
        return 'Admin_Reports_' . date('YmdHis');
    }
}

<?php

namespace App\DataTables\Admin;

use App\Models\Order;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrdersDataTable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
              ->editColumn('user.first_name', function ($query) {
                  return $query->user?->first_name .' '. $query->user?->last_name;
              })->editColumn('customer.first_name', function ($query) {
                  return $query->customer?->first_name .' '. $query->customer?->last_name;
              }) ->editColumn('order_status', function ($query) {
                  if (app()->getLocale() == 'ar') {
                      return $query->status_ar;
                  } else {
                      return $query->order_status;
                  }
              })->editColumn('Action', function ($query) {
                  return view('admin.orders.datatable.action', compact('query'));
              })->editColumn('status', function ($query) {
                  return view('admin.orders.datatable.status', compact('query'));
              })->rawColumns(['status','Action']);
    }


    public function query($model)
    {
        return Order::select('orders.*')->with(['user','customer'])->newQuery();
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
              Column::make('order_number')->orderable(true)->title(trans('order_number')),
              Column::make('customer.first_name')->orderable(true)->title(trans('customer_name')),
              Column::make('user.first_name')->orderable(true)->title(trans('driver_name')),
              Column::make('order_weight')->orderable(true)->title(trans('order_weight')),
              Column::make('order_quantity')->orderable(true)->title(trans('order_quantity')),
              Column::make('price')->orderable(true)->title(trans('price')),
              Column::make('moves_number')->orderable(true)->title(trans('moves_number')),
              Column::make('created_at')->title(trans('created_at')),
              Column::make('updated_at')->title(trans('updated_at')),
              Column::make('status')->title(trans('status'))->searchable(false)->orderable(false),
              Column::make('Action')->title(trans('action'))->searchable(false)->orderable(false)
        ];
    }

    protected function filename()
    {
        return 'Admin/Orders_' . date('YmdHis');
    }
}

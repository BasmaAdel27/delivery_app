<?php

namespace App\DataTables\Admin;

use App\Models\Order;
use Carbon\Carbon;
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
              ->editColumn('driver.first_name', function ($query) {
                  return $query->driver?->first_name .' '. $query->driver?->last_name;
              })->editColumn('customer.first_name', function ($query) {
                  return $query->customer?->first_name .' '. $query->customer?->last_name;
              })->editColumn('time', function ($query) {
                  return date('H:i:s A', strtotime($query->created_at));
              })->editColumn('created_at', function ($query) {
                  return Carbon::parse($query->created_at)->format('Y-m-d');
              })->editColumn('updated_at', function ($query) {
                  return $query->updated_at->toDateString();
              })->editColumn('Action', function ($query) {
                  return view('admin.orders.datatable.action', compact('query'));
              })->editColumn('statuses', function ($query) {
                  return view('admin.orders.datatable.status', compact('query'));
              })->rawColumns(['created_at','time','statuses','Action']);
    }


    public function query()
    {
        $orders= Order::select('orders.*')->with(['driver','customer'])->latest()->newQuery();
        if ($this->request()->get('date_from') && $this->request()->get('date_to')){
            return Order::select('orders.*')->with(['driver','customer'])->
            whereBetween('created_at',[$this->request->date_from, $this->request->date_to])->latest()->newQuery();
        }
        else{
            return $orders;
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

                    Button::make('excel'),

              );
    }

    protected function getColumns()

    {
        if (app()->getLocale() == 'ar') {
            $statusColumn = Column::make('status_ar')->title(trans('status_ar'))->orderable(true);
        } else {
            $statusColumn = Column::make('status')->title(trans('status'))->orderable(true);
        }
        return [
              Column::make('id')->title(trans('ID')),
              Column::make('order_number')->orderable(true)->title(trans('order_number')),
              Column::make('customer.first_name')->orderable(true)->title(trans('customer_name')),
              Column::make('driver.first_name')->orderable(true)->title(trans('driver_name')),
              Column::make('order_pocket')->orderable(true)->title(trans('order_pocket')),
              Column::make('weight')->orderable(true)->title(trans('weight'))->searchable(false)->orderable(false),
              Column::make('quantity')->orderable(true)->title(trans('quantity'))->searchable(false)->orderable(false)->searchable(false)->orderable(false),
              Column::make('price')->orderable(true)->title(trans('price'))->searchable(false)->orderable(false),
              Column::make('moves_number')->orderable(true)->title(trans('moves_number'))->searchable(false)->orderable(false),
              Column::make('time')->title(trans('time'))->searchable(false)->orderable(false)->searchable(false)->orderable(false),
              Column::make('created_at')->title(trans('created_at')),
              Column::make('updated_at')->title(trans('updated_at')),
              $statusColumn,
              Column::make('statuses')->title(trans('statuses'))->searchable(false)->orderable(false),
              Column::make('Action')->title(trans('action'))->searchable(false)->orderable(false)
        ];
    }

    protected function filename()
    {
        return 'Admin_Orders_' . date('YmdHis');
    }
}

<?php

namespace App\DataTables\Admin;

use App\Models\Customer;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CustomersDataTable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('first_name', function ($query) {
                  return $query->first_name .' '. $query->last_name;
            })->editColumn('created_at', function ($query) {
                  return Carbon::parse($query->created_at)->format('Y-m-d');
              })->editColumn('Action', function ($query) {
                  return view('admin.customers.datatable.action', compact('query'));
            })->rawColumns(['first_name','Action']);
    }


    public function query()
    {
        return Customer::select('customers.*')->newQuery();
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
              Column::make('first_name')->orderable(true)->title(trans('name')),
              Column::make('company_name')->orderable(true)->title(trans('company_name')),
              Column::make('commercial_register')->orderable(true)->title(trans('commercial_register')),
              Column::make('tax_number')->orderable(true)->title(trans('tax_number')),
              Column::make('contact_number')->orderable(true)->title(trans('contact_number')),
              Column::make('phone')->orderable(true)->title(trans('phone')),
              Column::make('address')->orderable(true)->title(trans('address')),
              Column::make('district_name')->orderable(true)->title(trans('district_name')),
              Column::make('build_number')->orderable(true)->title(trans('build_number')),
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
        return 'Admin_Customers_' . date('YmdHis');
    }
}

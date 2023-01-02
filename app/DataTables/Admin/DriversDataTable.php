<?php

namespace App\DataTables\Admin;

use App\Models\User;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DriversDataTable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
             ->editColumn('first_name', function ($query) {
                return $query->first_name .' '. $query->last_name;
            })->editColumn('truck.plate_number', function ($query) {
                return $query->truck?->plate_number;
            })->editColumn('created_at', function ($query) {
                return Carbon::parse($query->created_at)->format('Y-m-d');
            })->editColumn('Action', function ($query) {
                return view('admin.drivers.datatable.action', compact('query'));
            })->rawColumns(['created_at','first_name','Action']);

    }

    public function query()
    {
        return User::where('user_type','driver')->select('users.*')->with('truck')->oldest()->newQuery();
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
              Column::make('truck.plate_number')->orderable(true)->title(trans('plate_number')),
              Column::make('identity_number')->orderable(true)->title(trans('identity_number')),
              Column::make('license_number')->orderable(true)->title(trans('license_number')),
              Column::make('license_expiry')->orderable(true)->title(trans('license_expiry')),
              Column::make('phone')->orderable(true)->title(trans('phone')),
              Column::make('address')->orderable(true)->title(trans('address')),
              Column::make('created_at')->orderable(true)->title(trans('created_at')),
              Column::make('updated_at')->orderable(true)->title(trans('updated_at')),
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
        return 'Admin_Drivers_' . date('YmdHis');
    }
}

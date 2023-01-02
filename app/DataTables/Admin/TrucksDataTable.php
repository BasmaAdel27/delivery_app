<?php

namespace App\DataTables\Admin;

use App\Models\Truck;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TrucksDataTable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('driver.first_name', function ($query) {
                return $query->driver?->first_name .' '. $query->driver?->last_name;
            })->editColumn('created_at', function ($query) {
                  return Carbon::parse($query->created_at)->format('Y-m-d');
              })->editColumn('Action', function ($query) {
                return view('admin.trucks.datatable.action', compact('query'));
            })->rawColumns(['Action']);    }


    public function query()
    {
        return Truck::select('trucks.*')->with('driver')->newQuery();
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
              Column::make('plate_number')->orderable(true)->title(trans('plate_number')),
              Column::make('driver.first_name')->orderable(true)->title(trans('driver.first_name')),
              Column::make('truck_type')->orderable(true)->title(trans('truck_type')),
              Column::make('truck_model')->orderable(true)->title(trans('truck_model')),
              Column::make('license_number')->orderable(true)->title(trans('license_number')),
              Column::make('license_expiry')->orderable(true)->title(trans('license_expiry')),
              Column::make('created_at')->orderable(true)->title(trans('created_at'))->searchable(true),
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
        return 'Admin_Trucks_' . date('YmdHis');
    }
}

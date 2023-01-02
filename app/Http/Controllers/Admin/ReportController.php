<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ReportsDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(ReportsDataTable $reportsDataTable)
    {
        return $reportsDataTable->render('admin.reports.index');
    }


}

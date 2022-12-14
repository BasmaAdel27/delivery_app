<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\HomeResource;
use App\Http\Resources\PaginationResource;
use App\Models\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::where('driver_id', auth()->id())
              ->when($request->status, fn($q) => $q->where('order_status', $request->status))
              ->orderBy('created_at', 'desc')
              ->paginate($request->per_page ?? 15);

        return successResponse(HomeResource::collection($orders), PaginationResource::make($orders));


    }
}

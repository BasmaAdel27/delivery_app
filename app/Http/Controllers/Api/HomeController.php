<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\HomeResource;
use App\Http\Resources\PaginationResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

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

    public function updateOrder(Request $request, $id)
    {
        $order = Order::where(['driver_id' => auth()->id()])->findOrFail($id);
        if(!$order)
        {
            return failedResponse(Lang::get('order_not_exists'));
        }
        if ($order->status == Order::DELIVERED) {
            return failedResponse(Lang::get('can_not_updated_delivered_order'));
        }
        $order->update([
              'status' => $order->status
        ]);

        // TODO:: send email or notification to admin
        return successResponse(Lang::get('updated_successfully'));
    }
}

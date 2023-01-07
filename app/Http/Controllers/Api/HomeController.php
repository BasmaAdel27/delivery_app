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
              ->when($request->status, fn($q) => $q->where('status', $request->status))
              ->when($request->created_from, fn($q) => $q->where('created_at', '>=', $request->created_from))
              ->when($request->created_to, fn($q) => $q->where('created_at', '<=', $request->created_to))
              ->orderBy('created_at', 'desc')
              ->paginate($request->per_page ?? 15);

        return successResponse(HomeResource::collection($orders), PaginationResource::make($orders));
    }

    public function updateOrder(Request $request)
    {
        $this->validate($request, [
              'order_id' => 'required',
              'status' => 'required',
        ]);
        $order = Order::where(['driver_id' => auth()->id()])->find($request->order_id);
        if (!$order) {
            return failedResponse(Lang::get('order_not_exists'));
        }
        if ($order->status == Order::DELIVERED) {
            return failedResponse(Lang::get('can_not_updated_delivered_order'));
        }
        $order->update([
              'status' => $request->status,
              'status_ar' => __('mobile.orders.status.' . $request->status),
        ]);
        // TODO:: send email or notification to admin
        return successResponse(Lang::get('updated_successfully'));
    }
}

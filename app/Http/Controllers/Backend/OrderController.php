<?php

namespace App\Http\Controllers\Backend;

use App\Order;
use App\Http\Requests\Backend\OrderStatusRequest;

class OrderController extends BackendController
{
    public function index()
    {
        $orders = Order::orderBy("created_at", "DESC")->paginate(20);
        return view("backend.order.index", [
            "orders" => $orders,
        ]);
    }

    public function show(Order $order)
    {
        return view("backend.order.show", [
            "order" => $order,
        ]);
    }

    public function update(OrderStatusRequest $request, Order $order)
    {
        $order->status = $request->get("status");
        $order->save();

        alert()->success("Sipariş durumu değiştirildi!");
        return redirect()->route("backend.order.show", $order->id);
    }
}

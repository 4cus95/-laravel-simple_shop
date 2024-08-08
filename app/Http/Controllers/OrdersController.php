<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Service\OrderService;

class OrdersController extends Controller
{
    public function index(OrderService $orderService)
    {
        $orders = $orderService->getAll();
        return view('orders.index', compact('orders'));
    }

    public function store(OrderService $orderService) {
        $orderService->create();
        return redirect()->route('orders.index')->with('success', __('orders.created'));
    }

    public function destroy(Order $order, OrderService $orderService) {
        $this->authorize('delete', $order);

        $orderService->destroy($order);
        return redirect()->route('orders.index')->with('success', __('orders.deleted'));
    }
}

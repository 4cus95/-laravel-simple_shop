<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Service\OrderService;

class OrdersController extends Controller
{
    public function index(OrderService $orderService)
    {
        $this->authorize('viewAny', Order::class);

        $orders = $orderService->getAll();
        $totalSum = $orderService->countTotalSum($orders);
        return view('orders.index', compact('orders', 'totalSum'));
    }

    public function store(OrderService $orderService) {
        $this->authorize('create', Order::class);

        $orderService->create();
        return redirect()->route('orders.index')->with('success', __('orders.created'));
    }

    public function destroy(Order $order, OrderService $orderService) {
        $this->authorize('delete', $order);

        $orderService->destroy($order);
        return redirect()->route('orders.index')->with('success', __('orders.deleted'));
    }
}

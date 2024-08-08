<?php


namespace App\Service;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class OrderService
{
    public function getAll() {
        return Auth::user()->orders()->with('items')->get();
    }

    public function countTotalSum(Collection $orders):int {
        $totalSum = 0;

        $allItems = $orders->flatMap->items;
        foreach ($allItems as $item) {
            $totalSum += $item->price * $item->count;
        }

        return $totalSum;
    }

    public function create() {
        $cart = (new CartService())->getUserCart();
        if($cart->products->isEmpty()) {
            return;
        }

        $order = Auth::user()->orders()->create([
            'created_at' => now()
        ]);

        $items = [];
        foreach ($cart->products as $product) {
            $items[] = [
                'name' => $product->name,
                'count' => $product->pivot->count,
                'price' => $product->price
            ];
        }

        $order->items()->createMany($items);
        $cart->products()->detach();
    }

    public function destroy(Order $order) {
        if(Auth::user()->id != $order->user_id) {
            return;
        }

        $order->delete();
    }
}

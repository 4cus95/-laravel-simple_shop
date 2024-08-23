<?php


namespace App\Service;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartService
{
    public function getUserCart() {
        return Cart::query()->with('products')->firstOrCreate([
            'user_id' => Auth::user()->id
        ]);
    }

    public function addProduct(int $productId, int $count = 1) {
        $cart = $this->getUserCart();
        $product = Product::query()->findOrFail($productId);

        $productRow = $cart->products()->where('product_id', $product->id)->first();
        if($productRow) {
            $newCount = $productRow->pivot->count + $count;
            $cart->products()->updateExistingPivot($product->id, ['count' => $newCount]);
        } else {
            $cart->products()->attach($product->id, ['count' => $count]);
        }
    }
}

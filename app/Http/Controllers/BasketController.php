<?php

namespace App\Http\Controllers;

use App\Service\CartService;

class BasketController extends Controller
{
    public function __invoke(CartService $cartService)
    {
        $cart = $cartService->getUserCart();
        $products = $cart->products;
        return view('basket.index', compact('products', 'cart'));
    }
}

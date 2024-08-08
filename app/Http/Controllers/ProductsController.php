<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsRequest;
use App\Models\Product;
use App\Service\CartService;
use App\Service\ProductService;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductService $productService)
    {
        $products = $productService::getProducts();
        return view('shop.index', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductsRequest $request, CartService $cartService)
    {
        $cartService->addProduct($request->product_id, $request->product_count);
        return redirect()->back()->with('success', __('shop.added'));
    }
}

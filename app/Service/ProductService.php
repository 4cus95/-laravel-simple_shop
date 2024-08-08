<?php


namespace App\Service;


use App\Models\Product;

class ProductService
{
    public static function getProducts() {
        return Product::all();
    }
}

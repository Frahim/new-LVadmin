<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();       
        return response()->json($products);
    }

    public function show($identiPro)
    {
        $products = Product::where('slug', $identiPro)->orWhere('id', $identiPro)->first();

        if (!$products) {
            return response()->json(['error' => 'Brand not found'], 404);
        }

        return response()->json($products);
    }
}

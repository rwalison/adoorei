<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    //Método para retorna todos os produtos cadastrados.
    public function index()
    {
        $products = Product::select('id as product_id', 'name', 'price', 'description')->get();
        return response()->json($products);
    }
}

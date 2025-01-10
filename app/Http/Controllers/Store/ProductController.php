<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Product $product)
    {
        $products = $product->all();
        return view('store.product.index', compact('products'));
    }

    public function create()
    {
        return view('store.product.create');
    }

    public function store(Request $request, Product $product)
    {
        $data = $request->all();
        $product = $product->create($data);
        return redirect()->route('index.store.products');
    }

    public function show( string|int $id)
    {
        
    }
}

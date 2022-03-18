<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view("products.index", compact("products"));
    }

    public function create()
    {
        return view("products.create");
    }

    public function store()
    {
        # code...
    }

    public function show()
    {
        # code...
    }

    public function edit()
    {
        # code...
    }

    public function update()
    {
        # code...
    }

    public function destroy(Product $product)
    {
        if($product->delete()):
            return back();
        endif;
    }
}

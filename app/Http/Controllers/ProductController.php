<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

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

    public function store(Request $request)
    {
        //fa-exclamation-triangle
        $product = new Product();
        $product->user_id = Auth::user()->id;
        $product->title = $request->title;
        $product->photo = $request->photo;
        $product->moneda = $request->cup;
        $product->description = $request->description;
        $product->pricing = $request->pricing;

        if($product->save()):
            return redirect()->route("products.index")->with("icon", "fa-check")->with("message", "Producto creado con éxito!")->with("typealert", "success");
        endif;
    }

    public function show(Product $product)
    {
        $products = Product::all();
        return view("products.show", compact("product", "products"));
    }

    public function edit(Product $product)
    {
        return view("products.edit", compact("product"));
    }

    public function update(Product $product, Request $request)
    {
        $product->title = $request->title;
        $product->description = $request->description;
        $product->pricing = $request->pricing;

        if($product->update()):
            return back()->with("icon", "fa-check")->with("message", "Producto actualizado con éxito!")->with("typealert", "success");
        endif;
    }

    public function destroy(Product $product)
    {
        if($product->delete()):
            return back()->with("icon", "fa-check")->with("message", "Producto eliminado con éxito!")->with("typealert", "success");
        endif;
    }
}

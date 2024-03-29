<?php

namespace App\Http\Controllers;

use App\Models\InShoppingCart;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InShoppingCartController extends Controller
{
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shopping_cart_id = Session::get('shopping_cart_id');

        $shopping_cart = ShoppingCart::findOrCreateSessionID($shopping_cart_id);
        
        $cart = InShoppingCart::where('shopping_cart_id', $shopping_cart_id)->where('product_id', $request->product_id);
  
        if (!$cart->count()) {

            $response = InShoppingCart::create([
                "shopping_cart_id" => $shopping_cart->id,
                "product_id" => $request->product_id,
                "cantidad" => $request->cantidad
            ]);
            
        } else {

            $carrito = $cart->first();
            $carrito->cantidad += $request->cantidad;

            $response = $carrito->update();

        }

        if($response):
            return redirect()->route("carrito.index")->with("icon", "fa-check")->with("message", "Producto agregado con éxito!")->with("typealert", "success");
        else:
            return back()->with("icon", "fa-exclamation-triangle")->with("message", "No fue completado")->with("typealert", "danger");
        endif;


    }   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InShoppingCart  $inShoppingCart
     * @return \Illuminate\Http\Response
     */
    public function destroy(InShoppingCart $inShoppingCart)
    {
        //
    }
}

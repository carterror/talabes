<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Telegram\Bot\Laravel\Facades\Telegram;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shopping_cart_id = Session::get('shopping_cart_id');

        $shopping_cart = ShoppingCart::findOrCreateSessionID($shopping_cart_id);

        $shopping_cart->approve();

        // return redirect()->route('orders.show', $shopping_cart->customid);
        $text = '<b>        Detalles de la orden
        ID: <a href="'.route("orders.edit", $shopping_cart_id).'" style="background-color: red; padding: 5px;">'.$shopping_cart_id.'</a>
        </b>';

        Telegram::sendMessage([
            'chat_id' => config('telegram.bots.mybot.channel'),
            'parse_mode' => 'HTML',
            'text' => $text,
        ]);

        Session::remove('shopping_cart_id');

        return redirect()->route('orders.show', $shopping_cart->customid);
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shoppingcart = ShoppingCart::find($request->carrito);

        if ($shoppingcart->status == "Aprovado") {
            if ($request->paypal) {
                return redirect()->route('make.payment', $shoppingcart);
            } else {

                $request->validate([
                    'recipient_name1' => 'required',
                    'recipient_name2' => 'required',
                    'line1' => 'required',
                    'phone' => 'required|numeric',
                    'email' => 'required|email',
                    'state' => 'required',
                ]);

                $request['recipient_name'] = $request->recipient_name1." ".$request->recipient_name2;
                $order = Order::createFromPayPalResponse(False, $request->except(['_token','recipient_name1', 'recipient_name2']), $shoppingcart);
                    
                return back()->with("icon", "fa-check")->with("message", "Pago realizado con exito")->with("typealert", "success");

            }
        } else {
            return back()->with("icon", "fa-exclamation-triangle")->with("message", "Su orden no ha sido aprovada")->with("typealert", "danger");
        }
        

        
        return "nada";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($customid)
    {
        $order = ShoppingCart::where("customid", $customid)->first();

        $products = $order->products()->get();
        $total = $order->total();

        // return $products;
        return view("orders.index", compact("order", "products", "total"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carrito = ShoppingCart::with(['products'])->find($id);
        $products = $carrito->products;

        return view("orders.show", compact("products"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}

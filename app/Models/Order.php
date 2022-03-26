<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'line1',
        'line2',
        'city',
        'postal_code',
        'country_code',
        'state',
        'recipient_name',
        'email',
        'status',
        'guide_number',
        'total',
        'shopping_cart_id'
    ];

    public static function createFromPayPalResponse($paypal, $response, $shopping_cart)
    {
        if ($paypal) {

            $payer = $response->payer;
            $orderData = (array) $payer->payer_info->shiping_address;
            
            $orderData = $orderData[key($orderData)];

            $orderData['email'] = $payer->payer_info->email;
            $orderData['total'] = $shopping_cart->total();
            $orderData['shopping_cart_id'] = $shopping_cart->id;

            return Order::create($orderData);

        } else {

            $response['total'] = $shopping_cart->total();
            $response['shopping_cart_id'] = $shopping_cart->id;
            $response['city'] = "La Habana";
            $response['postal_code'] = "000000";
            $response['country_code'] = "000000";

            return Order::create($response);
        }
        
    }
}

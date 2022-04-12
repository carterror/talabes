<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'pricing',
        'user_id',
        'photo',
        'moneda',
    ];

    public function cantidad()
    {
        $cantidad = InShoppingCart::where('product_id', $this->pivot->product_id)->where('shopping_cart_id', $this->pivot->shopping_cart_id)->first();
        return $cantidad;
    } 

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
    ];

    public function inShoppingCarts()
    {
        return $this->hasMany(InShoppingCart::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, "in_shopping_carts");
    }

    public function productsSize()
    {
        return $this->products()->count();
    }

    public function total()
    {
        return $this->products()->sum("pricing");
    }

    public static function findOrCreateSessionID ($shopping_cart_id) {

        if ($shopping_cart_id) {
            # buscar
            return ShoppingCart::findBySession($shopping_cart_id);
        } else {
            # crear
            return ShoppingCart::createWithoutSession();
        }

    }

    public static function findBySession ($shopping_cart_id) {

        return ShoppingCart::find($shopping_cart_id);

    }

    public static function createWithoutSession () {

        return ShoppingCart::create([
            "status" => "incompleted"
        ]);

    }
}

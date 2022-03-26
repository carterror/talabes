<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $fillable = [
        'status', "customid",
    ];


    public function approve()
    {
        $this->updateCustomIdApprove();
    }


    public function generateCustomId()
    {
        return md5("$this->id $this->updated_at");
    }

    public function updateCustomIdApprove()
    {
        $this->status = "En proceso";
        $this->customid = $this->generateCustomId();
        $this->save();
    }

    public function updateCustomId()
    {
        $this->customid = $this->generateCustomId();
        $this->save();
    }

    public function inShoppingCarts()
    {
        return $this->hasMany(InShoppingCart::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class)->first();
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
        $r = $this->products()->get();
        $s=0;
        foreach ($r as $buy){

            $s += $buy->pricing * InShoppingCart::where('shopping_cart_id', $buy->pivot->shopping_cart_id)->where('product_id', $buy->pivot->product_id)->first()->cantidad;
        
        }

        return $s;
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

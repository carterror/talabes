<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InShoppingCart extends Model
{
    use HasFactory;
    
    protected $fillable = ["shopping_cart_id" , "product_id"];
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInShoppingCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('in_shopping_carts', function (Blueprint $table) {
            $table->id();

            $table->bigInteger("product_id")->unsigned();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->bigInteger("shopping_cart_id")->unsigned();

            $table->foreign("shopping_cart_id")->references("id")->on("shopping_carts");

            $table->integer("cantidad")->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('in_shopping_carts');
    }
}

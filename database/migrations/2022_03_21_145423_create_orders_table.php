<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->bigInteger("shopping_cart_id")->unsigned();
            $table->foreign("shopping_cart_id")->references("id")->on("shopping_carts");

            $table->string("line1");
            $table->string("line2")->nullable();
            $table->string("city");
            $table->string("postal_code");
            $table->string("country_code");
            $table->string("state");
            $table->string("recipient_name");
            $table->string("email");
            $table->string("status")->default("creado");
            $table->string("guide_number")->nullable();
            $table->integer("total");
        
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
        Schema::dropIfExists('orders');
    }
}

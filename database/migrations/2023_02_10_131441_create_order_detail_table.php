<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('order_id');
            $table->integer('product_id');
            $table->string('product_name', 255);
            $table->integer('quantity');
            $table->integer('price');
            $table->timestamps();
//             $table->foreign('product_id')->references('id')->on('products');
//             $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_detail');
    }
};

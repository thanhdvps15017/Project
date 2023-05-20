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
        Schema::create('product_comments', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('product_id');
            $table->integer('user_id');
            $table->text('message');
            $table->tinyInteger('appear')->default(1);
            $table->timestamps();
//             $table->foreign('product_id')->references('id')->on('products');
//             $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_comments');
    }
};

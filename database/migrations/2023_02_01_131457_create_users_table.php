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
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('name', 50);
            $table->string('email', 100);
            $table->string('password', 255);
            $table->string('avatar', 100)->default('images/avatar/default_ava.png');
            $table->string('phone', 10);
            $table->string('address', 100)->nullable();
            $table->string('description', 50)->nullable();
            $table->string('remember_token')->nullable();
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
        Schema::dropIfExists('users');
    }
};

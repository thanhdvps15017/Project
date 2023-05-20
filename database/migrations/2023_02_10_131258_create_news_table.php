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
        Schema::create('news', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('user_id'); //Người đăng
            $table->integer('category_id');
            $table->string('image', 100);
            $table->string('title', 255);
            $table->string('slug', 255)->unique();
            $table->string('summary', 1000)->nullable();
            $table->text('content');
            $table->string('keywords', 500)->nullable(); // Từ khoá SEO
//            $table->bigInteger('sort')->unsigned()->nullable();
            $table->integer('view')->default(0);
            $table->tinyInteger('hot')->default(0);
            $table->tinyInteger('appear')->default(1);
            $table->timestamps();
//             $table->foreign('user_id')->references('id')->on('users');
//             $table->foreign('category_id')->references('id')->on('news_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
};

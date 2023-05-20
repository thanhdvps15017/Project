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
        Schema::create('page_meta', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('page_id');
            $table->string('meta_key', 100);
            $table->string('meta_label', 100);
            $table->string('meta_type', 50);
            $table->longText('meta_value')->nullable();
            $table->timestamps();
//            $table->foreign('page_id')->references('id')->on('pages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('templates');
    }
};

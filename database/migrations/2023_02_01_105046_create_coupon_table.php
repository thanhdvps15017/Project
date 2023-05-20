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
        Schema::create('coupon', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('coupon_code', 100); //Mã giảm giá
            $table->string('user_id', 1000)->nullable(); //Lưu dạng mảng, id những người đã sử dụng coupon [1,2,3]
            $table->tinyInteger('coupon_type')->default(0); //Loại mã giảm giá (0 là %, 1 là vnđ)
            $table->string('description', 255)->nullable(); //mô tả mã giảm giá
            $table->integer('discount'); //Số tiền giảm giá
            $table->integer('min_total')->default(0); //Tổng bill tối thiểu để áp dụng
            $table->integer('max_discount')->nullable(); //Số tiền tối đa được giảm
            $table->date('date_start')->nullable(); //Ngày bắt đầu
            $table->date('date_expire')->nullable(); //Ngày hết hạn
            $table->integer('quantity'); //Số lượng coupon
            $table->integer('remaining'); //Số lượng còn lại
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
        Schema::dropIfExists('coupon');
    }
};

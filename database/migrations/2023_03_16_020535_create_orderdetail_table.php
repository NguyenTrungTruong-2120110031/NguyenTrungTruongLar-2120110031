<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ntt_orderdetail', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');//ma dh
            $table->integer('product_id');//ma sp
            $table->float('price');//giá sp
            $table->integer('number');//số lượng
            $table->double('amount', 12, 2);//thành tiền 
            //Khai báo các trường trong bảng

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ntt_orderdetail');
    }
};

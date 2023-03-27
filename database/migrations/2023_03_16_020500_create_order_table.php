<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ntt_order', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('fullname');
            $table->string('phone');
            $table->string('email');
            $table->string('address');//địa chỉ giao hàng
            $table->text('note');
            $table->integer('updated_by');//cập nhật 
            $table->integer('status');//trạng thái 
            //Khai báo các trường trong bảng
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ntt_order');
    }
};

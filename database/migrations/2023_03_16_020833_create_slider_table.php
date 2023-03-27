<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ntt_slider', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('link');
            $table->integer('sort_order');
            $table->string('img');
            $table->string('posistion');
            $table->integer('created_by');//tạo 
            $table->integer('updated_by');//cập nhật 
            $table->integer('status');//trạng thái 
            //Khai báo các trường trong bảng

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ntt_slider');
    }
};

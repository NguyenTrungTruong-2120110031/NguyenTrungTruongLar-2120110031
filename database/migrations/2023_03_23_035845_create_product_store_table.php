<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ntt_product_store', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');//ma sp
            $table->float('price');//giá sp
            $table->integer('created_by');//tạo 
            $table->integer('updated_by');//cập nhật 
            //Khai báo các trường trong bảng
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ntt_product_store');
    }
};

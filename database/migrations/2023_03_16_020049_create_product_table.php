<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ntt_product', function (Blueprint $table) {
            $table->id();//id
            $table->integer('cate_id');
            $table->integer('brand_id');
            $table->string('name');
            $table->string('slug');//lưu trữ tên sp
            $table->string('img');
            $table->float('price');//giá sp
            $table->string('detail');//chi tiết sp
            $table->integer('number');//số lượng sp
            $table->string('metakey');//từ khoá tìm kiếm
            $table->string('metadesc');//mô tả sp
            $table->integer('created_by');//tạo 
            $table->integer('updated_by');//cập nhật 
            $table->integer('status');//trạng thái 
            //Khai báo các trường trong bảng


            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ntt_product');
    }
};

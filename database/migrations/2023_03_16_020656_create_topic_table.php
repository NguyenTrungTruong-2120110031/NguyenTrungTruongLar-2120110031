<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ntt_topic', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');//lưu trữ tên sp
            $table->integer('parent_id');
            $table->integer('sort_order');
            $table->string('img');
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
        Schema::dropIfExists('ntt_topic');
    }
};

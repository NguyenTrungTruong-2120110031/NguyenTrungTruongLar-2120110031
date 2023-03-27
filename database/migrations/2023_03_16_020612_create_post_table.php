<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ntt_post', function (Blueprint $table) {
            $table->id();
            $table->integer('topic_id');
            $table->string('title');
            $table->string('slug');
            $table->longtext('detail');
            $table->string('img');
            $table->string('type');
            $table->string('metakey');
            $table->string('metadesc');
            $table->integer('created_by');//tạo 
            $table->integer('updated_by');//cập nhật 
            $table->integer('status');//trạng thái 
            //Khai báo các trường trong bảng

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ntt_post');
    }
};

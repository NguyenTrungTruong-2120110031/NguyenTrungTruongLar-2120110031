<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ntt_menu', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('link');
            $table->integer('parent_id');
            $table->integer('orders');
            $table->integer('table_id');
            $table->string('type');
            $table->integer('status');//trạng thái 
            //Khai báo các trường trong bảng

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ntt_menu');
    }
};

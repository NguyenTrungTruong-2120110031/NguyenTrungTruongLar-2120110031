<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ntt_user', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Họ ');
            $table->string('username');
            $table->string('password');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('gender');
            $table->string('roles');
            $table->string('img');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->integer('status');//trạng thái 
            //Khai báo các trường trong bảng

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ntt_user');
    }
};

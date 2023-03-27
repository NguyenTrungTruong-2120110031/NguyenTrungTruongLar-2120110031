<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ntt_contact', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('title');
            $table->text('content');
            $table->integer('replay_id');
            $table->integer('updated_by');//cap nhat
            $table->integer('status');//trạng thái 
            //Khai báo các trường trong bảng

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ntt_contact');
    }
};

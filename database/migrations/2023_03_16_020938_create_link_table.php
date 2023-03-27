<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ntt_link', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->integer('table_id');
            $table->string('type');
            //Khai báo các trường trong bảng
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ntt_link');
    }
};

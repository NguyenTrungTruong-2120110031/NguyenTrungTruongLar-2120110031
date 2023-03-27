<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ntt_config', function (Blueprint $table) {
            $table->id();
            $table->string('site_name');
            $table->string('hotline');
            $table->string('email');
            $table->string('logo');
            $table->string('icon');
            $table->string('metakey');
            $table->string('metadesc');
            $table->string('images');
            $table->integer('status');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ntt_config');
    }
};

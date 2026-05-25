<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laboratoriums', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('fakultas');
            $table->string('gedung');
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable();
            $table->unsignedBigInteger('id_laboran')->nullable();
            $table->string('warna')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laboratoriums');
    }
};

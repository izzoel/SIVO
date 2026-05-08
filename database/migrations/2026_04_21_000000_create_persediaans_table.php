<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('persediaans', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');
            $table->string('nama');
            $table->unsignedInteger('stok')->default(0);
            $table->string('spesifikasi');
            $table->unsignedBigInteger('id_satuan')->default(1);
            $table->unsignedBigInteger('id_laboratorium')->default(1);
            $table->unsignedBigInteger('id_lokasi')->default(1);
            $table->unsignedBigInteger('id_status')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('persediaans');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('asset_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aset_id')->nullable()->constrained('assets')->onDelete('set null');
            $table->string('title');        // dari status asset (aktif, nonaktif, perbaikan)
            $table->string('nama_aset');    // redundan dari assets.nama
            $table->string('kategori');     // redundan dari assets.kategori
            $table->text('deskripsi');      // penjelasan tentang kondisi/laporan
            $table->enum('status', ['ditanggapi', 'belum_ditanggapi', 'selesai'])->default('belum_ditanggapi');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('asset_reports');
    }
};

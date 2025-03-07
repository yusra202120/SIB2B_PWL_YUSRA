<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('m_barang', function (Blueprint $table) {
            $table->id('barang_id'); // Primary Key
            $table->unsignedBigInteger('kategori_id'); // Foreign Key ke m_kategori
            $table->string('barang_kode', 10)->unique();
            $table->string('barang_nama', 100); // Nama barang (diperbaiki dari string(100) tanpa nama)
            $table->string('harga_beli'); // Harga beli sebagai string (bisa diubah ke decimal jika diperlukan)
            $table->integer('harga_jual'); // Harga jual sebagai integer
            $table->timestamps();

            // Foreign Key ke m_kategori
            $table->foreign('kategori_id')->references('kategori_id')->on('m_kategori')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_barang');
    }
};

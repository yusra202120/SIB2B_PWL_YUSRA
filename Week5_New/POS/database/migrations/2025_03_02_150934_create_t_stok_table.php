<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('t_stok', function (Blueprint $table) {
            $table->id('stok_id'); // Primary Key
            $table->unsignedBigInteger('barang_id'); // Foreign Key ke m_barang
            $table->unsignedBigInteger('user_id'); // Foreign Key ke m_user
            $table->dateTime('stok_tanggal'); // Tanggal stok masuk/koreksi
            $table->integer('stok_jumlah'); // Jumlah stok yang ditambahkan/dikurangi
            $table->timestamps();

            // Foreign Key ke m_barang
            $table->foreign('barang_id')->references('barang_id')->on('m_barang')->onDelete('cascade');
            // Foreign Key ke m_user
            $table->foreign('user_id')->references('user_id')->on('m_user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_stok');
    }
};

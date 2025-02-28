<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();               // Menambahkan kolom 'id' sebagai primary key
            $table->string('name');      // Menambahkan kolom 'name' dengan tipe string
            $table->text('description'); // Menambahkan kolom 'description' dengan tipe text
            $table->timestamps();       // Menambahkan kolom 'created_at' dan 'updated_at'
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};

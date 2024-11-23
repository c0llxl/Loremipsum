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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama produk
            $table->string('type'); // Jenis produk (misalnya, jagung manis, jagung pakan ternak)
            $table->string('quality'); // Kualitas produk (A, B, C)
            $table->string('origin'); // Asal produk (contoh: nama petani atau distributor)
            $table->text('description')->nullable(); // Deskripsi tambahan
            $table->integer('quantity')->default(0); // Kuantitas produk yang tersedia
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

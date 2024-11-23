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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Relasi ke tabel produk
            $table->enum('type', ['in', 'out']); // Tipe transaksi: masuk/keluar
            $table->integer('quantity'); // Jumlah barang dalam transaksi
            $table->string('source')->nullable(); // Sumber barang (contoh: nama distributor/petani)
            $table->string('destination')->nullable(); // Tujuan barang (contoh: lokasi distribusi)
            $table->date('date'); // Tanggal transaksi
            $table->text('note')->nullable(); // Catatan tambahan
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi ke pengguna (pencatat)
            $table->timestamps(); // Tanggal pembuatan & pembaruan
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};

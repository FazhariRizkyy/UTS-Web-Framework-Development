<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('riwayat', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_paket_wisata');
            $table->dateTime('tanggal_transaksi');
            $table->integer('jumlah_tiket');
            $table->decimal('total_harga', 10, 2); 
            $table->enum('metode_pembayaran', ['Kartu Kredit', 'Transfer Bank', 'E-Wallet', 'Cash']);
            $table->enum('status_transaksi', ['Pending', 'Sukses', 'Gagal', 'Dibatalkan']); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat');
    }
};
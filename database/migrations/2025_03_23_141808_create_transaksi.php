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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relasi ke users
            $table->foreignId('booking_id')->constrained('booking')->onDelete('cascade'); // Relasi ke booking
            $table->string('kode_transaksi')->unique(); // Kode transaksi unik
            $table->decimal('jumlah', 10, 2); // Total pembayaran
            $table->enum('metode_pembayaran', ['transfer', 'e-wallet', 'cash'])->default('transfer'); // Metode pembayaran
            $table->enum('status_pembayaran', ['pending', 'paid', 'failed'])->default('pending'); // Status pembayaran
            $table->dateTime('tanggal_pembayaran')->nullable(); // Waktu pembayaran
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};

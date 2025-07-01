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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();

            // Relasi ke anggota dan buku
            $table->foreignId('member_id')->constrained('members')->onDelete('cascade');
            $table->foreignId('book_id')->constrained('books')->onDelete('cascade');

            // Relasi ke admin, nullable
            $table->unsignedBigInteger('admin_id')->nullable();

            // Tanggal dan status
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->enum('status', ['pending', 'dipinjam', 'dikembalikan', 'terlambat'])->default('pending');

            $table->timestamps();

            // Tambahkan constraint foreign key admin_id di akhir
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};

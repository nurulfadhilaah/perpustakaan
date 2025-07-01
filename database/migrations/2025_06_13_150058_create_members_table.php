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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('nama_anggota');
            $table->string('nik')->unique();
            $table->string('no_anggota')->nullable(); // telah diubah jadi nullable
            $table->text('alamat');
            $table->string('no_hp')->nullable();
            $table->string('email')->unique();
            $table->date('tgl_lahir')->nullable();
            $table->string('password');
            $table->string('foto')->nullable(); // pastikan nullable
            $table->string('ktp')->nullable();   // kolom tambahan baru
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};

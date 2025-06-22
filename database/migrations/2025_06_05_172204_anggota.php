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
         Schema::create('anggotas', function (Blueprint $table) {
        $table->id();                     // id otomatis primary key (bigint auto-increment)
        $table->string('nik')->unique(); // nik unik, tapi bukan primary key
        $table->string('nama');
        $table->string('email')->unique();
        $table->string('no_hp');
        $table->text('alamat');
        $table->date('tanggal_lahir');
        $table->string('no_anggota');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::dropIfExists('anggota');
    }
};

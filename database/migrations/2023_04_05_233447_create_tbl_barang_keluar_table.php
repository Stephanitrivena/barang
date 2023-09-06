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
        Schema::create('tbl_barang_keluar', function (Blueprint $table) {
            $table->id();
            // $table->integer('id_barang_keluar');
            $table->string('kode_barang_keluar');
            $table->string('nama_barang_keluar');
            $table->string('jumlah');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_barang_keluar');
    }
};

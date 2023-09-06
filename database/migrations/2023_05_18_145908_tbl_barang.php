<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tbl_barang', function (Blueprint $table) {
            $table->id();
            $table->string('kd_barang');
            $table->string('nm_barang');
            $table->integer('stok');
            $table->integer('harga');
            $table->text('ket');
            $table->text('gambar');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_barang');
   }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_layanan');
            $table->integer('id_paket');
            $table->integer('id_galeri');
            $table->string('pemesan');
            $table->string('nomor_hp');
            $table->string('slug');
            $table->string('acara1')->nullable();
            $table->string('acara2')->nullable();
            $table->string('nama1')->nullable();
            $table->string('nama2')->nullable();
            $table->string('nama_lengkap1')->nullable();
            $table->string('nama_lengkap2')->nullable();
            $table->string('ortu1')->nullable();
            $table->string('ortu2')->nullable();
            $table->text('quotes')->nullable();
            $table->date('tanggal1')->nullable();
            $table->time('waktu1')->nullable();
            $table->date('tanggal2')->nullable();
            $table->time('waktu2')->nullable();
            $table->text('lokasi1')->nullable();
            $table->text('lokasi2')->nullable();
            $table->text('lokasi_googlemaps')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('backsound')->nullable();
            $table->string('kepada')->nullable();
            $table->string('status');
            $table->integer('bayar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanans');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // protected $fillable = ['id_layanan', 'nama_paket', 'keterangan', 'harga', 'diskon'];
        Schema::create('pakets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_layanan');
            $table->string('nama_paket')->nullable();
            $table->text('keterangan')->nullable();
            $table->integer('harga');
            $table->integer('diskon')->nullable();
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
        Schema::dropIfExists('pakets');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonfigurasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konfigurasis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('author');
            $table->string('namaweb');
            $table->text('lokasi_googlemaps')->nullable();
            $table->text('alamat')->nullable();
            $table->text('desc1')->nullable();
            $table->text('desc2')->nullable();
            $table->string('keywords')->nullable();
            $table->string('email')->nullable();
            $table->string('nomor_hp')->nullable();
            $table->string('instagram')->nullable();
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
        Schema::dropIfExists('konfigurasis');
    }
}

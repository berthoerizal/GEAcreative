<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLayanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // $fillable = ['nama_layanan', 'slug', 'keterangan', 'gambar', 'status_layanan'];
        Schema::create('layanans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_layanan');
            $table->string('slug');
            $table->text('keterangan')->nullable();
            $table->string('gambar')->nullable();
            $table->string('status_layanan')->nullable();
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
        Schema::dropIfExists('layanans');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalerisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // protected $fillable = ['id_layanan', 'id_user', 'judul', 'slug', 'gambar'];
        Schema::create('galeris', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jenis');
            $table->integer('id_user');
            $table->string('judul');
            $table->string('slug');
            $table->string('gambar')->nullable();
            $table->string('link_video')->nullable();
            $table->integer('kode')->unique();
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
        Schema::dropIfExists('galeris');
    }
}

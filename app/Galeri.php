<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $fillable = ['id_user', 'judul', 'slug', 'gambar', 'jenis', 'kode', 'link_video'];
}

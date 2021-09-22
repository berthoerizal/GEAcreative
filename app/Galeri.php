<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $fillable = ['id_user', 'judul', 'slug', 'gambar', 'id_layanan', 'kode', 'link_video'];
}

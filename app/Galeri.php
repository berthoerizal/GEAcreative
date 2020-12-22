<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $fillable = ['id_layanan', 'id_user', 'judul', 'slug', 'gambar'];
}

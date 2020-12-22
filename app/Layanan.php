<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $fillable = ['nama_layanan', 'slug', 'keterangan', 'gambar', 'status_layanan'];
}

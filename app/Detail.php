<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $fillable = ['id_layanan', 'keterangan', 'gambar'];
}

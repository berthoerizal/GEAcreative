<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $fillable = ['id_layanan', 'nama_paket', 'keterangan', 'harga', 'diskon'];
}
